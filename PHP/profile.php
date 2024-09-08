<?php
 include 'phpcon.php';
 include 'mailsend.php';
 

 session_start();
 unset($_SESSION['verificationVariable']);

 

 if (!isset($_SESSION['email'])) {
      //   echo'Notloggedin';
       echo '<script>localStorage.clear();</script>';
       echo '<script>window.location.href = "../index.html";</script>';
    echo '<script>alert(" Not Loggedin");</script>';
     exit;
 }else{
     echo '<script>alert("Loggedin");</script>';
    
 }
$email = $_SESSION['email'];

echo '<script>alert("'.$email.'");</script>';

// Find the email in the database and return its values
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    // Access the values from the row
    $name = isset($row['user_name']) ? $row['user_name'] : '';
    $gender = isset($row['gender']) ? $row['gender'] : '';
    $nic = isset($row['NIC']) ? $row['NIC'] : '';
    $mobile = isset($row['p_number']) ? $row['p_number'] : '';
    $user_id = isset($row['user_id']) ? $row['user_id'] : '';
    $age = isset($row['age']) ? $row['age'] : '';
    $profile_pic = isset($row['profile_photo']) ? $row['profile_photo'] : '';

    // Update the corresponding HTML elements with the values
   
} else {
    // Handle the case when the email is not found in the database
    echo 'Email not found in the database';
}
  
if (isset($_POST['logout'])) {
    
    $_SESSION = array();

    session_destroy();
    echo '<script>localStorage.clear();</script>';
    
    header("Location: ../index.html");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #7a6429;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
            
        }

        .profile-container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .sidebar {
            width: 25%;
            background-color: #000000;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            background-color: #7d7d7d;
            border-radius: 50%;
            margin: 0 auto;
            background-image: url('../img/logo/user_icon.png');
            background-size: cover;
        }

        .edit-button,
        .change-button {
            background-color: #cbb600;
            border: none;
            color: #000;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }

        .edit-button_2 {
            background-color: #cb0000;
            border: none;
            color: #000;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }

        .back-button {
            margin-left: -200px;
            background-color: #cbb600;
            border: none;
            color: #000;
            padding: 10px 20px;
            margin-top: 40px;
            cursor: pointer;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #ffcc00;
            /* Slightly brighter shade */
            transform: translateY(-3px);
            /* Creates lift effect */
        }

        .forget-password {
            display: block;
            margin-top: 20px;
            color: #ffeb3b;
            text-decoration: none;
        }

        .main-content {
            width: 75%;
            margin-left: 20px;

        }

        .membership-plan,
        .instructor-details,
        .online-classes {
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .membership-plan h2,
        .instructor-details h2,
        .online-classes h2 {
            color: #ffeb3b;
            margin-left: 20px;
        }

        .plan-expiry {
            color: #ff0303;
        }

        .class-box {
            background-color: #7d7d7d;
            height: 100px;
            width: 30%;
            display: inline-block;
            margin: 10px 1.5%;
            border-radius: 10px;
        }

        .online-classes {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding: 80px 0;
        }

        .class-box {
            flex-shrink: 0;
            width: 200px;
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }


        .class-box img {
            width: 100%;
            height: auto;
            display: block;
        }

        .class-box button {
            background-color: #cbb600;
            border: none;
            padding: 10px;
            color: #000;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            border-radius: 0 0 10px 10px;
            transition: background-color 0.3s ease;
        }

        .class-box button:hover {
            background-color: #ffcc00;
        }

        .class-box:hover {
            box-shadow: 0 8px 16px #00000033;
        }

        .class-caption {
            font-size: 14px;
            color: #ffffff;
            margin: 10px 0;
        }

        .Edit-picture {
            background-color: #cbb600;
            border: none;
            color: #000;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px #00000033;
        }

        /* pesronal infomation div */
        .profile-container_2 {
            background-color: #f7f7f4ad;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px #0000001a;
            max-width: 600px;
            width: 100%;
            margin-top: -850px;
            position: absolute;
            margin-left: 480px;
            z-index: 1;
             display: none; 
            /* border: 1px solid red; */
        }

        .profile-details {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            Z-index: 99;
            /* border: 1px solid red; */
        }

        .profile-pic_1 {
            width: 200px;
            height: 250px;
            object-fit: cover;
            /* border: 3px solid #ccc; */
            display: flex;
            align-items: center;
            flex-direction: column;

        }

        .profile-pic-2 {
            width: 150px;
            height: 150px;
            border-radius: 100%;

            border: 3px solid #000000b6;
        }

        /* copy*/
        .button_In {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #fbff00;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button_In:hover {
            background-color: #0c0c0c;
            color: #fbff00;
        }

        #savePhotoBtn {
            background-color: #28a745;
            margin-left: 10px;
        }

        #savePhotoBtn:hover {
            background-color: #218838;
        }

        input[type="text"],
        input[type="email"] {
            border: none;
            background-color: #f4f4f4;
            padding: 5px;
            border-radius: 5px;
            width: 100%;
        }

        input:disabled {
            background-color: #e0e0e0;
            color: #333;
        }

        #saveInfoBtn {
            background-color: #28a745;
            display: none;
        }

        #saveInfoBtn:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .profile-details {
                flex-direction: column;
                align-items: center;
            }

            .profile-pic img {
                width: 120px;
                height: 120px;
            }
        }



        .back-button_1 {
            padding: 8px 16px;
            background-color: #fbff00;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px;
            margin-left: -10px;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .back-button_1:hover {
            background-color: #030303;
            color:#fbff00 ;
        }
        .p_I{
            color: #000000;
        }
        /* pesronal infomation div */
    </style>

</head>

<body >
    <div class="profile-container" id="Body">
        <div class="sidebar">
            <button class="back-button" id="Home_page">Back</button>
            <div class="profile-pic"></div>
            <br>
            <button class="Edit-picture" onClick="show_P_C_2()" >Edit</button>

            <br>
            <?php
             echo '<p id="UID">User ID : '.$user_id.'</p>';
            echo '<p id="name">User : '.$name.'</p>';
            echo '<p id="Gender">Gender : '.$gender.'</p>';
            echo '<p id="NIC">NIC : '.$nic.'</p>';
            echo '<p id="age">AGE : '.$age.'</p>';
            echo '<p id="Email">Email : '.$email.'</p>';
            echo '<p id="M_number">Mobile No : '.$mobile.'</p>';
            ?>

            
            <form method="POST">
              <input type="submit" class="edit-button" value="Logout" name="logout" id="logoutButton">
            </form>
            <a href="passwordchnage.php" class="forget-password">Forget Password?</a>
            <br>
            <button class="edit-button_2" id="delete_button">Delete Account</button>

        </div>

        <div class="main-content">
            <div class="membership-plan">
                <h2>Membership Plan</h2>
                <p>Issue Date : 2024/08/22</p>
                <p>Expires Date : 2024/09/2</p>
                <p>Type of Plan : monthly basis</p>
                <p>Payment Status : Verify</p>
                <button class="change-button">Change Plan</button>
                <p class="plan-expiry">Plan is expired : within two Weeks</p>
            </div>

            <div class="instructor-details">
                <h2>Instructor Details</h2>
                <p>Instructor Name : </p>
                <p>Instructor ID : </p>
                <p>Payment Status : </p>
                <button class="change-button">Change Instructor</button>
                <p class="plan-expiry">Plan is expired : within two Weeks</p>
            </div>

            <div class="online-classes">
                <h2>Online Classes</h2>
                <div class="class-box">
                    <a href="#" target="_blank">
                        <img src="../gym/profile/sumba.jpg" alt="Class 1">
                        <p class="class-caption">Sumba Class</p> <!-- Caption added here -->
                        <button>Go to Class 1</button>
                    </a>
                </div>
                <div class="class-box">
                    <a href="#" target="_blank">
                        <img src="../gym/profile/online.jpg" alt="Class 2">
                        <p class="class-caption">Online Fitness</p> <!-- Caption added here -->
                        <button>Go to Class 2</button>
                    </a>
                </div>
                <div class="class-box">
                    <a href="#" target="_blank">
                        <img src="../gym/profile/yoga.jpg" alt="Class 3">
                        <p class="class-caption">Yoga Classsadfasfdfadsafedfef</p> <!-- Caption added here -->
                        <button>Go to Class 3</button>
                    </a>
                </div>
            </div>


        </div>
    </div>
    <div class="profile-container_2" id="profile_container_2">
        <button class="back-button_1" onclick="goToProfile()">Back</button>

        <div class="profile-details">
            <!-- Profile Picture Section -->
            <div class="profile-pic_1">
                <img id="profileImage" src="../img/logo/user_icon.png" alt="Profile Picture" class="profile-pic-2">
                <input type="file" id="upload" style="display: none;" accept="image/*">
                <button class="button_In" id="editPhotoBtn" onclick="triggerUpload()">Edit Photo</button>
                <button class="button_In" id="savePhotoBtn" style="display: none;" onclick="savePhoto()">Save
                    Photo</button>
            </div>

            <!-- User Details Section -->
            <div class="user-info">
                <p class="p_I"><strong>User:</strong> <input type="text" id="userName" value="<?php echo $name; ?>" disabled></p>
                <p class="p_I"><strong>Email:</strong> <input type="email" id="userEmail" value="<?php echo $email; ?>" disabled></p>
                <p class="p_I"><strong>Mobile No:</strong> <input type="text" id="userMobile" value="<?php echo $mobile; ?>" disabled></p>
                <p class="p_I"><strong>Age:</strong> <input type="text" id="Age" value="<?php echo $age; ?>" disabled></p>
                
                <button class="button_In" id="editInfoBtn" onclick="editInfo()">Edit Info</button>
                <button class="button_In" id="saveInfoBtn" style="display: none;" onclick="saveInfo()">Save
                    Info</button>
            </div>
        </div>
    </div>

    
    <script>

        var phpname = "<?php echo $name; ?>";
        var phpemail = "<?php echo $email; ?>";
        var phpmobile = "<?php echo $mobile; ?>";
        var phpage = "<?php echo $age; ?>";
        var user_id = "<?php echo $user_id; ?>";

        function show_P_C_2(){
           document.getElementById("profile_container_2").style.display = "block";
           document.getElementById("Body").style.filter = "blur(5px)";
           document.getElementById("profile_container_2").classList.add("animate-show");
         }

        function goToProfile(){
           document.getElementById("profile_container_2").style.display = "none";
           document.getElementById("Body").style.filter = "blur(0px)";
           document.getElementById("profile_container_2").classList.remove("animate-show");
           location.reload();
        }
        document.getElementById('delete_button').addEventListener('click', function() {
            var r = confirm("Are you sure you want to delete your account?");
            if (r == true) {
                window.location.href = "deleteAccount.php";
            }
        });
        document.getElementById('logoutButton').addEventListener('click', function() {
               localStorage.clear();
        });

        document.getElementById('Home_page').addEventListener('click', function() {
            window.location.href = "../index.html";
        });

        function editInfo() {
           document.getElementById('userName').disabled = false;
           document.getElementById('userEmail').disabled = false;
           document.getElementById('userMobile').disabled = false;
           document.getElementById('Age').disabled = false;
           document.getElementById('editInfoBtn').style.display = 'none';
           document.getElementById('saveInfoBtn').style.display = 'inline-block';
        }

        let tempImage = ''; // Store temporary image for profile picture

       // Trigger file upload
       function triggerUpload() {
           document.getElementById('upload').click();
        }

      // Handle image upload and preview
       document.getElementById('upload').addEventListener('change', function() {
          const file = this.files[0];
            if (file) {
               const reader = new FileReader();
               reader.onload = function(e) {
               tempImage = e.target.result;
               document.getElementById('profileImage').src = tempImage;
               document.getElementById('savePhotoBtn').style.display = 'inline-block';
             };
             reader.readAsDataURL(file);
            }
        });

        function saveInfo(){

            let username = document.getElementById('userName').value;
            let email = document.getElementById('userEmail').value;
            let mobile = document.getElementById('userMobile').value;
            let age = document.getElementById('Age').value;

            if (username === '' || email === '' || mobile === '' || age === '') {
                alert('Please fill all the fields');
                return;
            }

            if (email == phpemail && mobile == phpmobile && age == phpage && username == phpname) {
                alert('data is same');  
                return;
            }else{
                var formData = new FormData();
                formData.append('username', username);
                formData.append('email', email);
                formData.append('mobile', mobile);
                formData.append('age', age);
                formData.append('user_id', user_id);
                alert('data is not same');

                fetch('updateProfile.php', {
                method: 'POST',
                body: formData
               }).then(response => response.text())
               .then(data => {
                if (data === 'success') {
                    alert('Profile updated successfully');
                    document.getElementById('userName').disabled = true;
                    document.getElementById('userEmail').disabled = true;
                    document.getElementById('userMobile').disabled = true;
                    document.getElementById('Age').disabled = true;
                    document.getElementById('editInfoBtn').style.display = 'inline-block';
                    document.getElementById('saveInfoBtn').style.display = 'none';
                } else {
                    alert('Failed to update profile'+data);
                }
            });

            }
           
        }   
    </script>
</body>

</html>