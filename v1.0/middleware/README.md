In this folder we will put middlewares for users and control access to route.

    - Celestin. just take middlewares as control points. they are fucntions that will be called in the route instance before the user to access the route.

    Example of route http://localhost/ubukode/v1.0/postHouse

    ///////////////////////////////////////////////////////////


    example of middlewares

    $app.post('http://localhost/ubukode/v1.0/postHouse', $postHouseController)->add($requiredParams);

where `POST` is the http method, `$postHouseController` is the function containing postHouse logic and `$requiredParams` is middlware if the user didnt miss some parameters. the middleware will year verify all params before the backend to receive request.  