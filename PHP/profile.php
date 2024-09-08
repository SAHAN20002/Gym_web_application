<?php
session_start();
unset($_SESSION['verificationVariable']);

// if (!isset($_SESSION['email'])) {
//      //   echo'Notloggedin';
//     //  echo '<script>localStorage.clear();</script>';
//     //  echo '<script>window.location.href = "../index.html";</script>';
//     echo '<script>alert(" Not Loggedin");</script>';
//      exit;
// }else{
//     echo '<script>alert("Loggedin");</script>';
    
// }
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
            <button class="back-button">Back</button>
            <div class="profile-pic"></div>
            <br>
            <button class="Edit-picture" onClick="show_P_C_2()" >Edit</button>

            <br>
            <p>User : W.P.S Waruna</p>

            <p>Gender : Male</p>

            <p>NIC : xxxxxxxxxxx</p>

            <p>Email : kbdjkdbsbd</p>

            <p>Mobile No : 1111111111</p>


            <button class="edit-button">logout</button>
            <a href="#" class="forget-password">Forget Password?</a>
            <br>
            <button class="edit-button_2" onClick="functionOne()">Delete Account</button>

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
                <img id="profileImage" src="default-profile.png" alt="Profile Picture" class="profile-pic-2">
                <input type="file" id="upload" style="display: none;" accept="image/*">
                <button class="button_In" id="editPhotoBtn" onclick="triggerUpload()">Edit Photo</button>
                <button class="button_In" id="savePhotoBtn" style="display: none;" onclick="savePhoto()">Save
                    Photo</button>
            </div>

            <!-- User Details Section -->
            <div class="user-info">
                <p class="p_I"><strong>User:</strong> <input type="text" id="userName" value="W.P.S Waruna" disabled></p>
                <p class="p_I"><strong>Email:</strong> <input type="email" id="userEmail" value="kbdjkdbsbd" disabled></p>
                <p class="p_I"><strong>Mobile No:</strong> <input type="text" id="userMobile" value="1111111111" disabled></p>
                <p class="p_I"><strong>Age:</strong> <input type="text" id="Age" value="1111111111" disabled></p>
                <button class="button_In" id="editInfoBtn" onclick="editInfo()">Edit Info</button>
                <button class="button_In" id="saveInfoBtn" style="display: none;" onclick="saveInfo()">Save
                    Info</button>
            </div>
        </div>
    </div>

    <script src="../js/profile.js"></script>
</body>

</html>