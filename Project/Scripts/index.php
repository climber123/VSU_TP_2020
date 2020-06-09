<?php

    header("Content-Type: application/json");    

    require_once('../Classes/SystemController.php');
    require_once("query.php");
    require_once("config.php");
    require_once("functions_to_help.php");
    require_once('../vendor/autoload.php');
    use \Firebase\JWT\JWT;


    $token_from_header = getallheaders()['Authorization'];
    $method = $_SERVER['REQUEST_METHOD'];
    $q = $_GET['q'];
    $params = explode('/', $q);
    $type = $params[0];

    if($token_from_header){
        try{
            $token = JWT::decode($token_from_header, $secretKey, array('HS512'));
        }
        catch(Exception $ex){
            $err_msg = $ex->getMessage();
            http_response_code(403);
            echo json_encode(["status" => false, "message" => $err_msg]);
            die();
        }
    
        $array_token = arrayCastRecursive($token);

        $user_id = $array_token["data"]["userId"];
        $user_name = $array_token["data"]["userName"];


        $user = does_user_with_token_exists_in_db($user_id, $user_name);
        
        if (count($user) > 0){
            $system_controller = new SystemController();
            switch ($method){
                case "GET":
                    switch ($type){
                        case "categories":
                            $category_id = $params[1];
                            if (isset($category_id)){
                                if ((count($params) == 3) && ($params[2] == "operations")){
                                    echo $system_controller->GetOperationsByCategory($category_id);
                                }
                            }
                            /*else{
                                echo $system_controller->GetCategories($user_id);
                            }*/
                        break;
                        case "operations":
                                echo $system_controller->GetAllOperations($user_id);
                        break;
                    }
                break;
                case "POST":
                    switch ($type){
                        case "categories":
                            if (count($params) == 1)
                            {
                                $input_data_json = file_get_contents('php://input');
                                $input_data = json_decode($input_data_json, true);
                                echo $system_controller->AddCategory($user_id, $input_data["category_name"]);
                            }
                            else if ((count($params) == 4) && ($params[2] == "operations") && ($params[3] == "date_time_interval"))
                            {
                                $category_id = $params[1];
                                $input_data_json = file_get_contents('php://input');
                                $input_data = json_decode($input_data_json, true);
                                echo $system_controller->GetOperationsFromDatetimeIntervalByCategory($category_id, $input_data["startDateTime"], $input_data["endDatetime"]);
                            }
                            else if ((count($params) == 2) && ($params[1] == "date_time_interval"))
                            {
                                $input_data_json = file_get_contents('php://input');
                                $input_data = json_decode($input_data_json, true);
                                //$startDateTime = (date('Y-m-d H:i:s',strtotime($input_data["startDateTime"])));
                                //$endDateTime = (date('Y-m-d H:i:s',strtotime($input_data["startDateTime"])));
                                //die(var_dump($startDateTime));
                                echo $system_controller->GetCategories($user_id, $input_data["startDateTime"], $input_data["endDatetime"]);
                            }
                        break;
                        case "operations":
                            if (count($params) == 1)
                            {
                                $input_data_json = file_get_contents('php://input');
                                $input_data = json_decode($input_data_json, true);
                                echo $system_controller->AddExpense($input_data['value'], $input_data['categoryID'], $input_data['date_time']);
                            }
                            else if (count($params) == 2)
                            {
                                if ($params[1] == "date_time_interval")
                                {
                                    $input_data_json = file_get_contents('php://input');
                                    $input_data = json_decode($input_data_json, true);
                                    echo $system_controller->GetOperationsFromDateTimeInterval($user_id,$input_data["startDateTime"], $input_data["endDatetime"]);
                                }
                                else
                                {
                                    $input_data_json = file_get_contents('php://input');
                                    $input_data = json_decode($input_data_json, true);
                                    switch ($params[1]){
                                        case "sum":
                                            echo $system_controller->GetAmountExpenses($user_id,$input_data["startDateTime"], $input_data["endDatetime"]);
                                        break;
                                        case "sum_avg":
                                            echo $system_controller->GetAverageExpense($user_id,$input_data["startDateTime"], $input_data["endDatetime"]);
                                        break;
                                    }
                                }
                            }
                        break;
                    }
                break;

                case "PUT":
                case "PATCH":
                    $input_data_json = file_get_contents('php://input');
                    $id = $params[1];
                    switch ($type){
                        case "categories":
                            if (isset($id)){
                                $input_data = json_decode($input_data_json, true);
                                echo $system_controller->ChangeCategory($id, $input_data["category_name"]);
                            }
                        break;
                        case "operations":
                            if (isset($id)){
                                $input_data = json_decode($input_data_json, true);
                                echo $system_controller->ChangeOperation($id, $input_data["new_value"]);
                            }
                        break;
                    }
                break;

                case "DELETE":
                    //$input_data_json = file_get_contents('php://input');
                    $id = $params[1];
                    switch ($type){
                        case "categories":
                            echo $system_controller->RemoveCategory($id);
                        break;
                        case "operations":
                            echo $system_controller->DeleteOperation($id);
                        break;
                    }
                break;
            }
        }
        else{
            $output = array("status" => false, "message" => "access denied");
            http_response_code(403);
            echo json_encode($output);
        }
    }
    else if ($method == "POST")
    {
        if ((count($params) == 1))
        {
            switch ($params[0])
            {
                case 'login':
                        $input_data_json = file_get_contents('php://input');
                        $input_data = json_decode($input_data_json, true);
                        $user = login($input_data['user_login'], $input_data['user_password']);
                        if (count($user) == 0)
                        {
                            $logon_message = json_encode(["status" => false, "message" => "wrong login or password"]);
                            http_response_code(400);
                            echo $logon_message;
                        }
                        else
                        {
                            $user = $user[0];
                            $data = [
                                        'iat'  => time(),         // Issued at: time when the token was generated
                                        'jti'  => base64_encode(time()),          // Json Token Id: an unique identifier for the token
                                        'iss'  => 'smartexpenses',       // Issuer
                                        'data' => [                  // Data related to the signer user
                                        'userId'   => $user['user_id'], // userid from the users table
                                        'userName' => $user['user_name'], // User name
                                        ]
                                    ];
        
                            $jwt = JWT::encode(
                                                $data,      //Data to be encoded in the JWT
                                                $secretKey, // The signing key
                                                'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
                                            );
                                            
                            echo json_encode(['jwt' => $jwt]);
                        }
                break;
                case 'signup':
                        $input_data_json = file_get_contents('php://input');
                        $input_data = json_decode($input_data_json, true);
                        $inserted_user_id = signup($input_data['user_login'], $input_data["user_name"], $input_data['user_password']);
                        if ($inserted_user_id == -1){
                            echo json_encode(["status" => false, "message" => "User with this login already exists"]);
                        }
                        else{
                            $system_controller = new SystemController();
                            echo $system_controller->AddStandartCategories($inserted_user_id);
                        }
                break;
            }
        }
    }
    else{
        $output = array("status" => false, "message" => "you are not logged in");
        http_response_code(401);
        echo json_encode($output);
    }
?>