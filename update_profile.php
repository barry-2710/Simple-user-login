<?php
session_start();
include "db.php";
if(isset($_POST['dob']) && ($_POST['profession'])){
    $dob = $_POST['dob'];
    $profession = $_POST['profession'];
    $user_id = $_POST['user_id'];
    $query = $db->prepare("UPDATE users SET dob = :dob, profession = :profession WHERE id = :id ");
    $result = $query->execute(
        array(
         ':dob' => $dob,
         ':profession' => $profession,
         ':id'   => $user_id
        )
       );
    if(!empty($result)){
        echo json_encode(['status' => 'success']);
    }
    else{
        echo json_encode(['status' => 'error', 'message' => 'Some error occured! Try after some time']);
    }  
}

?>