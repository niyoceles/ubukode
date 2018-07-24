<?php
/**
    * @copyright 2018 urukode platform 
    * @version   1.0 v1.0
    * @author    Mutombo Riy Jean-Vincent & Niyonsaba Celestin 
    * @link      sigmacool@gmail.com, niyoceles3@gmail.com
    ***********************************************************
    ***********************************************************

    * This handles the configuration of the REST API
    * It contains all constants that will be used soon  
**/

header("Content-Type: text/html; charset=utf-8");

//Database connexion
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ubukode_platform');

//Users roles and status
define('CLIENT', 'client');
define('HOUSE_OWNER', 'house_owner');
define('ADMIN', 'admin');

//Authentication or Authorization status (1-20)
define('WRONG_PASSWORD', 1);
define('USER_CREATED_SUCCESSFULLY', 2);
define('PHONE_ALREADY_EXISTED', 3);
define('INVALID_APIKEY', 4);
define('SERIAL_ARLEADY_USED', 5);
define('ADMIN_ACCOUNT_EXIST', 6);

//Sql error ans status(21-30)
define('STMT_NOT_EXECUTED', 11);

//Encryption & decryption (so so so so important and must be secret)
define('AUTH_ENCRYPTION_KEY', "oH+ZkLZhYt5/Zl1s+Q==oH+ZkLZhYt5/ZlI6+A==oH+ZkLZhYt5/ZlI7+Q==oH+ZkLZhYt5/ZlI8+g==oH+ZkLZhYt5/ZlI9+A==5af28c920c8835af28c920c8887e9c19ce10a708672b10d9e706d98d7f");
define('IV', substr("��F(����F�9�5", 15));
//got it from openssl_encrypt(uniqid(), $cipher, $key, $options=0, $iv, $tag).openssl_encrypt(uniqid(), $cipher, $key, $options=0, $iv, $tag).openssl_encrypt(uniqid(), $cipher, $key, $options=0, $iv, $tag).openssl_encrypt(uniqid(), $cipher, $key, $options=0, $iv, $tag).openssl_encrypt(uniqid(), $cipher, $key, $options=0, $iv, $tag).uniqid().uniqid().md5(uniqid(rand(), true));