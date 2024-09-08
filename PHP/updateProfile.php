<?php
session_start();

include 'phpcon.php';
include 'mailsend.php';
$oldEmail = $_SESSION['email'];

if($conn == false){
    echo "Connection Failed!";
    die();  
}else{  
    $userId = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $p_number = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';

    $updateQuery = "UPDATE users SET user_name = '$username', email = '$email', p_number = '$p_number', age = '$age' WHERE user_id = '$userId'";
    
    if(mysqli_query($conn, $updateQuery)){

        $_SESSION['email']=$email;

        if($oldEmail != $email){
            $to = $email;
            $subject = "Email Change";
            $message = "This is to inform you that your email has been updated to: $email";
            $headers = "From:;";
            mailsend($to, $subject, $message, $headers);
        }else{
            echo "success";
        }
       
       
    }else{
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
    }
}

?>