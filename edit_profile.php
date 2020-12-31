<?php
session_start();
include "db.php";
if(isset($_POST['dob']) && ($_POST['profession']) && ($_POST['name']) && ($_POST['email']) && ($_POST['phone'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $profession = $_POST['profession'];
    $user_id = $_POST['user_id'];
    $query = $db->prepare("UPDATE users SET name = :name, email = :email, phone = :phone, dob = :dob, profession = :profession WHERE id = :id ");
    $result = $query->execute(
        array( 
         ':name' => $name,
         ':email' => $email,
         ':phone' => $phone,
         ':dob' => $dob,
         ':profession' => $profession,
         ':id'   => $user_id
        )
       );
    if(!empty($result)){
        echo json_encode(['status' => 'success']);
        $_SESSION['user_name']=$name;
    }
    else{
        echo json_encode(['status' => 'error', 'message' => 'Some error occured! Try after some time']);
    }  
}

?>