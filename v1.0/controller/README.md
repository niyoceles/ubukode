Here we will put all controllers. Most of time controllers will contain a lot of if...else statement.

here is an example of a controller
//////////////////////////////////

<?php
//The script for handling login of the client

use \Slim\Http\Request;  //calling the request namespace
use \Slim\Http\Response; //callling the response namespace

$loginClient = function (Request $request, Response $response){

    /**
     * Store all request params 
     * @var array
    */
    $requestParams = $request->getParams();

    /**
     * Store API response
     * @var array
    */
    $myResponse = array();

    /**
     * Params that suppose to exist in the request
     * 
     * variables in left, text-message in right
     * @var array
    */
    $requiredParams = array(
        'zipCode'        => 'postal code',
        'rawPhoneNumber' => 'phone number',
        'password'       => 'password'
    );

    //check if all supposed params exist in the request 
    $paramsExist = paramsExist($requestParams, $requiredParams);

    if($paramsExist !== NULL){

        $myResponse['error'] = true;
        $myResponse['requiredParams'] = $paramsExist;

    }else{
        //get login parameters
        $zipCode        = htmlentities(trim($request->getParam('zipCode')));
        $rawPhoneNumber = htmlentities(trim($request->getParam('rawPhoneNumber')));
        $password       = htmlentities(trim($request->getParam('password')));

        $client = new Client();
        $common = new Common();

        $login = $client->checkClientLogin($zipCode, $rawPhoneNumber, $password);

        if(!$login){
            
            //on incorrect phoneNumber
            $myResponse['error']            = true;
            $myResponse["wrongPhoneNumber"] = true;
             
        }else if($login === WRONG_PASSWORD){
            
            //on incorrect password
            $myResponse['error']         = true;
            $myResponse["wrongPassword"] = true;
            
        }else if($login === STMT_NOT_EXECUTED){
            
            //on BD stmt execution fail
            $myResponse['error']         = true;
            $myResponse["errorDatabase"] = true;
        
        }else{
            //on login success
            //get client personal info
            $myResponse['error']      = false;
            $myResponse['clientInfo'] = $client->getClientByPhoneNumber($zipCode, $rawPhoneNumber);

            //get the client apiKey
            $apiKey  = $myResponse['clientInfo']['apiKey'];
            
            //generate the authKey
            $authKey = $common->generateAuthKey($apiKey, CLIENT);
            
            //encrypt the authKey
            $encryptedAuthKey = $common->encryptAuthKey($authKey);
            
            //insert the authKey in the DB
            $common->setAuthKey($apiKey, $encryptedAuthKey, CLIENT);

            //get the client otp
            $myResponse['otpCode'] = $common->getOtpCode($apiKey, CLIENT);
            
            //get the client authKey
            $myResponse['authKey'] = $common->getAuthKey($apiKey, CLIENT);
        }
    }
    
    return $response->withJson($myResponse);
}
?>