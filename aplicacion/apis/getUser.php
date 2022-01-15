<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../configuration/configuration.php';
    include_once '../../dominio/userClass.php';

    $database = new Configuration();
    $db = $database->getConnection();

    $item = new User($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleUser();

    if($item->name != null){
        // create array
        $user_arr = array(
            "id" =>  $item->id,
            "name" => $item->name,
            "lastname" => $item->lastname,
            "email" => $item->email,
            "password" => $item->password
        );
      
        http_response_code(200);
        echo json_encode($user_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("User not found.");
    }
?>