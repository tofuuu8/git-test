<?php
    include("connection.php");
    $session_timeout = 100000;
    if(isset($_SESSION['valid'])){
        if(isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $session_timeout){
            session_unset();
            session_destroy();
            header("Location: ../customer-page/user-timeout.php");
            exit();
        }else{
            $_SESSION['last_activity'] = time();
        }
    }else{
        header("Location: ../login.php");
        exit();
    }
    $customer_id = $_SESSION['customer_id'];
    $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$customer_id'");
    $rows = mysqli_fetch_assoc($query);
    $email = $rows['email'];
    $usernames = $rows['username'];

    $msg = "";
    if(isset($_POST['confirm'])){
        $customer_id = $_SESSION['customer_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $country = $_POST['country'];

        if(empty($name) OR empty($phone) OR empty($address) OR empty($city) OR empty($zipcode) OR empty($country)){
            echo "<script> alert('All fields are requird'); </script>";
        }else if(strlen($phone) > 11 OR strlen($phone) < 11){
            echo "<script> alert('Invalid phone number'); </script>";
        }else if(strlen($zipcode) > 4 OR strlen($zipcode) < 4){
            echo "<script> alert('Invalid Zipcode'); </script>";
        }else{
            mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Added address')");
            mysqli_query($conn, "INSERT INTO customer_address(customer_id,names,phone_number,address,city,zipcode,country) VALUES('$customer_id','$name','$phone','$address','$city','$zipcode','$country')");
            header("Location: userSettingsAddress.php");    
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
    <title>Account Settings | Print My Shirt</title>
    <link rel="stylesheet" href="">
</head>
<style>
    .all-edits .hidebg{
        background: none;
        border: none;
    }
</style>
<body>
  <?php include("website-header.php"); ?>

<div class="body">
    <div class="settings" id="settings">
        <h1>Settings</h1>
        <div class="settingsContent">
            <p><a href="userSettingsAccInfo.php">Account Information</a></p>
            <p id="active"><a href="">Address</a></p>
            <!-- <p><a href="userSettingsPaymentInfo.php">Payment Information</a></p> -->
        </div>
    </div>

    <div class="account-information" id="account-information">
        <div class="account-information-header">
            <h1>Add new Address</h1>
        </div>

        <div class="back">
                <h2><a href="userSettingsAddress.php">Back</a></h2>
        </div>

        <form action="" method="post">
            
            <div class="inputs">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Name" autocomplete="off">
            </div>
            <div class="inputs">
                <label for="phone">Phone:</label>
                <input type="number" name="phone" id="phone" placeholder="Phone number" autocomplete="off" >
            </div>
            <div class="inputs">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" placeholder="Address" autocomplete="off">
            </div>
            <div class="inputs">
                <div class="city-zipcode">
                    <div class="city">
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" placeholder="City" autocomplete="off">
                    </div>
                    <div class="zipcode">
                        <label for="zipcode">Zipcode:</label>
                        <input type="number" name="zipcode" id="zipcode" placeholder="Zipcode" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="inputs">
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" placeholder="Country" autocomplete="off">
            </div>

            <div class="confirm">
                <button name="confirm">Confirm</button>
            </div>
        </form>

    </div>
</div>

    <?php include("website-footer.php"); ?>


    <script>
        let nav = document.getElementById("nav");
        let settings = document.getElementById("settings");
        let account_information = document.getElementById("account-information");

        nav.onclick = function(){
            settings.classList.toggle("haha");
            account_information.classList.toggle("haha2");
        }
    </script>
</body>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1px;
        box-sizing: border-box;
    }
    .body{
        width: 100%;
        height: calc(100vh - 65px);
        display: flex;
    }
    .body .settings{
        background: #E16C69;
        width: 20%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .body .settings h1{
        color: white;
        font-weight: 400;
        font-size: 40px;
        margin: 15px 0;
        letter-spacing: 1px;
    }
    .body .settings .settingsContent{
        width: 100%;
        line-height: 50px;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .body .settings .settingsContent p{
        width: 100%;
        text-align: center;
        cursor: pointer;
        transition: .3s;
        color: white;
        font-size: 20px;
        letter-spacing: 1px;
    }
    .body .settings .settingsContent p a:hover{
        color: black;
    }
    .body .settings .settingsContent #active{
        color: black;
        background: #FF807D;
    }
    .body .settings .settingsContent p a{
        color: white;
        text-decoration: none;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .3s;
    }
    .body .helpSupport{
        position: absolute;
        bottom: 10%;
        left: 2%;
    }
    .body .helpSupport a{
        color: white;
        text-decoration: none;
        letter-spacing: 1px;
        font-size: 19px;
    }

    .body .account-information{
        width: 80%;
        height: 100%;
        position: relative;
    }
    .body .account-information .account-information-header{
        display: flex;
        align-items: center;
        height: 16%;
        justify-content: center;
    }
    .body .account-information .account-information-header h1{
        background: #eeeceb;
        font-size: 45px;
        padding: 8px 0;
        border-radius: 50px;
        width: 80%;
        text-align: center;
    }
    .account-information .back h2{
        position: absolute;
        top: 5%;
        left: 2%;
        font-size: 30px ;
    }
    .account-information .back h2 a{
        text-decoration: none;
        color: black;
    }
    .account-information form{
        height: 84%;
    }
   .account-information form .inputs{
        display: flex;
        gap: 10px;
        align-items: center;
        padding: 0 10%;
    }
   .account-information form .inputs label{
       font-size: 24px;
    }
   .account-information form .inputs input{
       width: 100%;
       border: none;
       border-radius: 50px;
       padding: 10px 20px; 
       font-size: 17px;
       outline: none;
       background: #eeeceb;
       margin: 20px 0;
    }
   .account-information form .inputs .city-zipcode{
        display: flex;   
        width: 100%;
        gap: 10px;
    }
   .account-information form .inputs .city{
        display: flex;
        align-items: center;
        width: 50%;
    }
   .account-information form .inputs .zipcode{
        display: flex;
        align-items: center;
        width: 50%;
    }
   .account-information form .confirm{
        display: flex;
        align-items: center;
        justify-content: flex-end;
        height: 80px;
        background: #eeeceb;
        margin-top: 4px;
    }
   .account-information form .confirm button{
        padding: 10px 40px;
        font-size: 17px;
        border-radius: 50px;
        border: none;
        background: #E16C69;
        color: white;
        cursor: pointer;
        margin-right: 10%;
    }
</style>
</html>