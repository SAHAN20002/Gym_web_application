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
        .loader {
	       width: 40px;
	       height: 40px;
	       position: absolute;
	       top: 50%;
	       left: 50%;
	       margin-top: -13px;
	       margin-left: -13px;
	       border-radius: 60px;
	       animation: loader 0.8s linear infinite;
	      -webkit-animation: loader 0.8s linear infinite;
        }

       @keyframes loader {
	        0% {
		      -webkit-transform: rotate(0deg);
		       transform: rotate(0deg);
		       border: 4px solid #f3d700;
		       border-left-color: transparent;
	        }
	        50% {
		     -webkit-transform: rotate(180deg);
		      transform: rotate(180deg);
		      border: 4px solid #673ab7;
		      border-left-color: transparent;
	       }
	       100% {
		     -webkit-transform: rotate(360deg);
		      transform: rotate(360deg);
		      border: 4px solid #f3d700;
		      border-left-color: transparent;
	         }
         }

       @-webkit-keyframes loader {
	        0% {
		        -webkit-transform: rotate(0deg);
		        border: 4px solid #f3d700;
		        border-left-color: transparent;
	        }
	       50% {
		       -webkit-transform: rotate(180deg);
		        border: 4px solid #673ab7;
		        border-left-color: transparent;
        	}
	      100% {
		      -webkit-transform: rotate(360deg);
		      border: 4px solid #f3d700;
		      border-left-color: transparent;
          	}
        }
    </style>
</head>
<body>
     <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="big-word">Dashboard</div>
    
    <!-- Logout button triggers a form submission -->
    <form method="POST">
        <input type="submit" value="Logout" name="logout" id="logoutButton">
    </form>
     <input type="button" value="Home page" name = "Home_Page" id = "Home_page">
    <script>

        window.addEventListener('load', function () {
            document.querySelector(".loader").style.display = "none";
            document.querySelector("#preloder").style.animation = "fadeOut 0.2s";
            setTimeout(function() {
                document.querySelector("#preloder").style.display = "none";
            }, 300);
        });

        document.getElementById('logoutButton').addEventListener('click', function() {
           
            localStorage.clear();
        });

        document.getElementById('Home_page').addEventListener('click', function() {
            window.location.href = "../index.html";
        });
        
    </script>
</body>
</html>
