<?php 
 session_start();   
 
 include 'phpcon.php';
 include 'mailsend.php';

    if($conn == false){
        echo "Connection Failed!";
        die();      
    }else{
        
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $_SESSION['email'] = $email;   
        
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) > 0) {
                // Email exists, proceed with sending verification code
                $verificationCode = mt_rand(1000, 9999);
                $_SESSION['verificationCode'] = $verificationCode;

                $to = $email;
                $subject = "Forgot Password";
                $message = "Your verification code is: $verificationCode";
                $headers = "From: your_email@example.com";
                
                if (mailsend($to, $subject, $message, $headers)) {
                    // echo "Verification code sent successfully!";
                    echo "<script>alert('Verification code sent successfully!');</script>";
                } else {
                    // echo "Failed to send verification code!";
                    echo "<script>alert('Failed to send verification code!');</script>";
                }
                
            } else {
                // Email does not exist in the users table, show error message
                echo "<script>alert('Email not found!');</script>";
            }

            
        }

        if(isset($_POST['verificationCode'])){
            $enteredCode = $_POST['verificationCode'];
            $storedCode = $_SESSION['verificationCode'];

            if($enteredCode == $storedCode){
                echo "<script>alert('Verification code is correct!');</script>";
                unset($_SESSION['verificationCode']); 
               
                header("Location: passwordchnage.php");   
            } else {
                echo "<script>alert('Verification code is incorrect!');</script>";
            }
        }
       
    }
?>

<!DOCTYPE html> 
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
  <?php
   if(!isset($_SESSION['verificationCode']) || $_SESSION['verificationCode'] == null){ 
        echo '
        
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="forgottenPassword.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Send Verification Code</button>
            </div>
        </form>
    </div>
    ';
    }
    ?>
</body>
</html>

<?php
    if(isset($_SESSION['verificationCode'])) {
        echo '
        <div class="container">
            <h2>Enter Verification Code</h2>
            <form action="forgottenPassword.php" method="post">
            <div class="form-group">
                <label for="verificationCode">Verification Code:</label>
                <input type="text" id="verificationCode" name="verificationCode" required>
            </div>
            <div class="form-group">
                <button type="submit">Verify Code</button>
            </div>
            </form>
        </div>
        ';
    }
?>