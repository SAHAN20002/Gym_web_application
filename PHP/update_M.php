<?php
include 'phpcon.php';

$cookie_lifetime = 7 * 24 * 60 * 60; // 1 week
session_start();
$user_id = null;

if(isset($_SESSION['userId'])!= null){

    $user_id = $_SESSION['userId'];
   
    $plan_id = isset($_POST['plane_Id']) ? $_POST['plane_Id'] : null;
    
    $plane_Name = isset($_POST['plane_Name']) ? $_POST['plane_Name'] : null;
    
    $price = isset($_POST['plane_Price']) ? $_POST['plane_Price'] : null;
    $date = isset($_POST['date']) ? $_POST['date'] : null;
    $expiry_date = isset($_POST['expireddate']) ? $_POST['expireddate'] : null;

    $query = "SELECT * FROM membership_user WHERE user_id = ? AND membership_id = ?";
    $stmt_check = $conn->prepare($query);
    $stmt_check->bind_param("ss", $user_id, $plan_id);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo "User already has this membership.";
        exit();
    }
    
    $stmt = $conn->prepare("INSERT INTO membership_user (user_id, membership_id, start_date, end_date, cost, membership_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $user_id, $plan_id, $date, $expiry_date , $price,$plane_Name);
 
    if ($stmt->execute()) {
        echo "New record created successfully";
        exit();
    } else {
       echo "Error: " . $stmt->error;
        exit();
    }
 
 }else{
     echo "Please login to continue";
    
     exit();
 }



?>