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
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // user values
    $item->name = $data->name;
    $item->lastname = $data->lastname;
    $item->email = $data->email;
    $item->password = $data->password;
    
    if($item->updateUser()){
        echo json_encode("User data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>