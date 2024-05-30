<?php
    include("../connection.php");
 
    if(isset($_GET['customer_id'])){
        $id = $_GET['customer_id'];

        $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$id'");

        while($row = mysqli_fetch_assoc($query)){
            $username = $row['username'];
            $email = $row['email'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $phone_number = $row['phone_number'];
            $password = $row['password'];
        }
        $msg = "";
        if(isset($_POST['change1'])){
            $newusername = $_POST['newusername'];
            $confirmpassword = $_POST['confirmpassword'];

            $verify_password = mysqli_query($conn, "SELECT * FROM customer WHERE password = '$confirmpassword'");

            if(mysqli_num_rows($verify_password) > 0){
                
                $verify_username = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$newusername'");

                if(mysqli_num_rows($verify_username)){
                    header("location: userSettingsAccInfo.php?Username is taken, please try another");
                }else{
                    mysqli_query($conn, "UPDATE customer SET username = '$newusername' WHERE customer_id = $id");
                    header("location: userSettingsAccInfo.php?Successfully change");
                }
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }

        if(isset($_POST['change2'])){
            $newfname = $_POST['newfname'];
            $newlname = $_POST['newlname'];
            $confirmpassword = $_POST['confirmpassword'];

            $verify_username = mysqli_query($conn, "SELECT * FROM customer WHERE password = '$confirmpassword'");

            if(mysqli_num_rows($verify_username) > 0){
                mysqli_query($conn, "UPDATE customer SET first_name = '$newfname', last_name = '$newlname' WHERE customer_id = $id");
                header("location: userSettingsAccInfo.php?Successfully change");
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }

        if(isset($_POST['change3'])){
            $newemail = $_POST['newemail'];
            $confirmpassword = $_POST['confirmpassword'];

            $verify_username = mysqli_query($conn, "SELECT * FROM customer WHERE password = '$confirmpassword'");

            if(mysqli_num_rows($verify_username) > 0){
                mysqli_query($conn, "UPDATE customer SET email = '$newemail' WHERE customer_id = $id");
                header("location: userSettingsAccInfo.php?Successfully change");
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }
        if(isset($_POST['change4'])){
            $newnumber = $_POST['newnumber'];
            $confirmpassword = $_POST['confirmpassword'];

            $verify_username = mysqli_query($conn, "SELECT * FROM customer WHERE password = '$confirmpassword' ");

            if(mysqli_num_rows($verify_username) > 0){
                mysqli_query($conn, "UPDATE customer SET phone_number = '$newnumber' WHERE customer_id = $id");
                header("location: userSettingsAccInfo.php?Successfully change");
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }
        if(isset($_POST['change5'])){
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];
            $confirmpassword = $_POST['confirmpassword'];

            $verify_username = mysqli_query($conn, "SELECT * FROM customer WHERE password = '$oldpassword'");

            if(mysqli_num_rows($verify_username) > 0){
                if($newpassword !== $confirmpassword){
                    header("Location:userSettingsAccInfo.php?Password did not match");
                }else{
                    mysqli_query($conn, "UPDATE customer SET password = '$newpassword' WHERE customer_id = $id");
                    header("location: userSettingsAccInfo.php?Successfully change");
                }
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/logo.png">
    <title>Document</title>
    <link rel="stylesheet" href="userSettingsAccInfos.css">
</head>
<style>
    .all-edits .hidebg{
        background: none;
        border: none;
    }
</style>
<body>
<header id="header">
        <div class="logo">
            <a href="adminDashboard.php"><img src="images/logo.png" alt=""></a>
        </div>
</header>
<div class="body">
    <div class="settings">
        <h1>Settings</h1>
        <div class="settingsContent">
            <p id="active">Account Information</p>
            <p><a href="userSettingsAddress.php?customer_id=<?= $id ?>">Address</a></p>
        </div>
    </div>

    <div class="account-information">
        <div class="account-information-header">
            <h1>Account Information</h1>
        </div>
        <div class="account-information-label1">
            <div class="username-edit all-edits">
                <div class="username">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username" class="hidebg" disabled value="<?= $username; ?>">
                </div>
            </div>
        </div>

        <div class="account-information-label2">
            <div class="name-edit all-edits">
                <div class="name">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" class="hidebg" placeholder="" disabled value="<?= $first_name;?> <?= $last_name; ?>">
                </div>
            </div>
        </div>

        <div class="account-information-label3">
            <div class="email-edit all-edits">
                <div class="email">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" class="hidebg" placeholder="" disabled value="<?= $email; ?>">
                </div>
            </div>
        </div>

        <div class="account-information-label4">
            <div class="phone-edit all-edits">
                <div class="phone-number">
                    <label for="phone-number">Phone number: </label>
                    <input type="text" name="phone-number" id="name" class="hidebg" placeholder="" disabled value="<?= $phone_number; ?>">
                </div>
            </div>
        </div>

        <div class="account-information-label5">
            <div class="password-edit all-edits">
                <div class="password">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" class="hidebg"  disabled value="<?= $password; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1px;
    }
    html{
        scroll-behavior: smooth;
    }
    header{
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #c84542;
        width: 100%;
        height: 65px;
        z-index: 1000;
    }
    header .logo{
        padding-left: 3%;
    }
    header .logo img{
        width: 50px;
    }
</style>
</body>
</html>