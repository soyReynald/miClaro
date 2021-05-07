<?php
if(isset($_POST['Evento']) && $_POST['Evento'] == "getUserDetails"){
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }

    $fullName = $row['fname']. " " . $row['lname'];
    $imageProfile = $row['img'];
    $status = $row['status'];
    $uniqueID = $row['unique_id'];

    $response = array("fullName" => $fullName, "imageProfile" => $imageProfile, "status" => $status, "uniqueid" => $uniqueID);

    echo json_encode($response);
}

?>