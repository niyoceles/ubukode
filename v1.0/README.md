Apart from the `middleware` and `controller` folders, the v1.0 will contain two files

    - .htaccess. this is a file for putting rules on own the Api work. for example to avoid CORS errors.
            
            CORS --> Cross Origin Resource Sharing. this is an error that occurs when a domain want to access server located in another domain or another port number. 
            
            -example: if the ionic project is running in http://localhost:3000 and the backend PHP is running in
                        http://192.168.1.15. This will cause CORS error. to avoid this is by creating this .htaccess 


    - index.php which is the main entry of the urukode REST-API.  

