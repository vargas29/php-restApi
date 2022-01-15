<?php
    class UserController{
        include_once '../../dominio/userClass.php';

        $user = new User();
      
    
        // Connection
        private $conn;

        // Table
        private $dbTable = "users";

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getUsers(){
            $sqlQuery = "SELECT id, name, lastname, email, password  FROM " . $this->dbTable . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createUser(){
            $sqlQuery = "INSERT INTO
                        ". $this->dbTable ."
                    SET
                        name = :name,
                        lastname = :lastname, 
                        email = :email, 
                        password = :password";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->user->name=htmlspecialchars(strip_tags($this->user->name));
            $this->user->lastName=htmlspecialchars(strip_tags($this->user->lastName));
            $$this->user->email=htmlspecialchars(strip_tags($this->user->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
          
        
            // bind data
            $stmt->bindParam(":name", $this->user->name);
            $stmt->bindParam(":lastname", $this->user->lastName);
            $stmt->bindParam(":email", $this->user->email);
            $stmt->bindParam(":password", $this->user->password);
            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleUser(){
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        lastname, 
                        email, 
                        password
                      FROM
                        ". $this->dbTable ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->user->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->user->name = $dataRow['name'];
            $this->user->lastName = $dataRow['lastname'];
            $this->user->email = $dataRow['email'];
            $this->user->password = $dataRow['password'];
            
        }        

        // UPDATE
        public function updateUser(){
            $sqlQuery = "UPDATE
                        ". $this->dbTable ."
                    SET
                        name = :name,
                        lastname = :lastname, 
                        email = :email, 
                        password = :password
                        
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
             // sanitize
             $this->user->name=htmlspecialchars(strip_tags($this->user->name));
             $this->user->lastName=htmlspecialchars(strip_tags($this->user->lastName));
             $this->user->email=htmlspecialchars(strip_tags($this->user->email));
             $this->password=htmlspecialchars(strip_tags($this->password));
             $this->user->id=htmlspecialchars(strip_tags($this->user->id));
         
             // bind data
             $stmt->bindParam(":name", $this->user->name);
             $stmt->bindParam(":lastName", $this->user->lastName);
             $stmt->bindParam(":email", $this->user->email);
             $stmt->bindParam(":password", $this->user->password);
            $stmt->bindParam(":id", $this->user->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }


        // DELETE
        function deleteUser(){
            $sqlQuery = "DELETE FROM " . $this->dbTable . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->user->id=htmlspecialchars(strip_tags($this->user->id));
        
            $stmt->bindParam(1,$this->user->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>