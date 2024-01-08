<?php 

class User{
   private $table_name;
   private $conn;

   private $user_id;
   private $user_full_name;
   private $user_email;
   private $user_name;

   function __construct($db_conn){
     $this->conn = $db_conn;
     $this->table_name = "user";
   }
   function init($user_id){
       try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE user_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$user_id]);
          if($stmt->rowCount() == 1) 
            {
                $user = $stmt->fetch();
                $this->user_name =  $user['user_name'];
                $this->user_id =  $user['user_id'];
                $this->user_email =  $user['user_email'];
                $this->user_full_name =  $user['user_full_name'];
                return 1;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function insert($data){
       try {
          $sql = 'INSERT INTO '. $this->table_name.'(user_name, user_password, user_full_name, user_email) VALUES(?,?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          return $res;
       }catch(PDOException $e){
       	  return 0;
       }
   }
   function is_username_unique($user_name){
       try {
          $sql = 'SELECT user_name FROM '. $this->table_name.' WHERE user_name=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$user_name]);
          if($stmt->rowCount() > 0) 
          	return 0;
          else return 1;
       }catch(PDOException $e){
       	  return 0;
       }
   }

   function auth($user_name, $password){
       try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE user_name=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$user_name]);
          if($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $db_user_name = $user["user_name"];
            $db_password = $user["user_password"];
            $db_user_id = $user["user_id"];
            $db_user_email = $user["user_email"];
            $db_user_full_name = $user["user_email"];
            if($db_user_name === $user_name ){
               if (password_verify($password, $db_password)) {
                  $this->user_name =  $db_user_name;
                  $this->user_id =  $db_user_id;
                  $this->user_email =  $db_user_email;
                  $this->user_full_name =  $db_user_full_name;
                  return 1;
               }else return 0;
            }else return 0;
          }else return 0;
       }catch(PDOException $e){
           return 0;
       }
   }

   function getUser(){
      $data = array('user_id' => $this->user_id,
                    'user_name' => $this->user_name,
                    'full_name' => $this->user_full_name,
                    'user_email' => $this->user_email);
      return $data;
   }

}