<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../configuration/configuration.php';
    include_once '../../dominio/userClass.php';

    $database = new Configuration();
    $db = $database->getConnection();

    $item = new User($db);

    $stmt = $items->getUsers();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $userArr = array();
        $userArr["body"] = array();
        $userArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "lastname" => $lastname
                "email" => $email,
                "password" => $password
            );

            array_push($userArr["body"], $e);
        }
        echo json_encode($userArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>