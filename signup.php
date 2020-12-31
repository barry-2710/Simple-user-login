<?php 
session_start();
include "db.php";

if(isset($_POST['name']) && ($_POST['email']) && ($_POST['password']) && ($_POST['phone'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_email = $db->prepare("SELECT email from users WHERE email = ?");
    $check_email->execute([$email]);
    if($check_email->rowCount() > 0){
        echo json_encode(['status' => 'error', 'message'=>"This email is already taken"]);
    } else{
        $query = $db->prepare("INSERT into users (name, email, phone, password) VALUES (?,?,?,?)");
        $query->execute([$name,$email,$phone,$password]);
        if($query){
            $user_query = $db->prepare("SELECT * FROM users WHERE email = ?");
            $user_query->execute([$email]);
            if($user_query->rowCount() > 0){
                $row = $user_query->fetch(PDO::FETCH_OBJ);
                $user_name = $row->name;
                $user_id = $row->id;
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $user_id;
                $_SESSION["user_name"] = $user_name;
                echo json_encode(['status' => 'success']);
            }
        }
    }
}
?>