<?php
session_start();


unset($_SESSION['verificationVariable']);


if (!isset($_SESSION['email'])) {
    header("Location: ../index.html");
    exit;
}


if (isset($_POST['logout'])) {
    
    $_SESSION = array();

   
    session_destroy();

    
    header("Location: ../index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .big-word {
            font-size: 48px;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="big-word">Dashboard</div>
    
    <!-- Logout button triggers a form submission -->
    <form method="POST">
        <input type="submit" value="Logout" name="logout" id="logoutButton">
    </form>
     <input type="button" value="Home page" name = "Home_Page" id = "Home_page">
    <script>
        document.getElementById('logoutButton').addEventListener('click', function() {
           
            localStorage.clear();
        });

        document.getElementById('Home_page').addEventListener('click', function() {
            window.location.href = "../index.html";
        });
        
    </script>
</body>
</html>
