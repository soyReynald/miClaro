<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
include_once "config.php";

session_start();
if(isset($_POST['Evento']) && $_POST['Evento'] == "getUserChatDetails"){
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $fullName = $row['fname']. " " . $row['lname'];
        $imageProfile = $row['img'];
        $status = $row['status'];
        $uniqueID = $row['unique_id'];
        $response = array("fullName" => $fullName, "imageProfile" => $imageProfile, "status" => $status, "uniqueid" => $uniqueID);

        echo json_encode($response);
    }
}
?>