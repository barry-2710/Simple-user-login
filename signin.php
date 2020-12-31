<?php
session_start();
include "db.php";

if(isset($_POST['email']) && ($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $db->prepare("SELECT * from users WHERE email = ?");
    $query->execute([$email]);
    if($query->rowCount() > 0){
        $row = $query->fetch(PDO::FETCH_OBJ);
        $db_passord = $row->password;
        $user_name = $row->name;
        $user_id = $row->id;
        if(password_verify($password,$db_passord)){
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_name"] = $user_name;
            echo json_encode(['status' => 'success']);
        } else{
            echo json_encode(['status' => 'passwordError', 'message' => 'Invalid Password']);
        }
    }
    else{
        echo json_encode(['status' => 'emailError', 'message' => 'Email not registered']);
    }  
}

?>