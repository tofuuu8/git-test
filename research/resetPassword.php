<?php

include("connection.php");
$msg = "";
    if(!isset($_GET['email'])){
        header("Location: login.php");
    }
if(isset($_POST['confirm'])){
    $email = $_GET['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $change = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");

    if(mysqli_num_rows($change) > 0){
        if(strlen($password) < 8){
            $msg = "Password atleast 8 characters";
        }else{
            if($password !== $cpassword){
                $msg = "Password did not match";
            }else{
                $hash = password_hash($password, PASSWORD_BCRYPT);
                mysqli_query($conn, "UPDATE customer SET password = '$hash' WHERE email = '$email'");

                if(isset($_GET['email'])){
                    $email = $_GET['email'];
                    $query = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
                    while($row = mysqli_fetch_assoc($query)){
                        $customer_id = $row['customer_id'];
                        $username = $row['username'];
                    }
                    mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$username','Changed Password')");
                }
                header("Location: resetPassword.php?email=$email&success=Successfully reset your password");
                }
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Forgot Password | Print My Shirt</title>
</head>
<body>
  <?php include("website-login-register-nav.php"); ?>

   <div class="center">
        <div class="box form-box">

                <?php if(!empty($_GET['success']) == "Successfully reset your password"){ ?>
                    <div class="popup">
                        <div class="box">
                            <h1>Successfully reset your password</h1>
                            <div class="log">
                                <a href="login.php" id="login">Login now</a>
                            </div>             
                        </div>
                    </div>
                <?php }?>
     
                <h1>Enter New Password</h1>
                <?= $msg; ?>
                <form action="" method="post">
                        <div class="inputs">
                            <label for="password"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Enter new password" autocomplete="off">
                        </div>
                        <div class="inputs">
                            <label for="cpassword"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" autocomplete="off">
                        </div>
                        <div class="btn">
                            <button name="confirm" aria-label="confirm" title="">Confirm</button>
                        </div>
                </form>
        </div>
    </div>
   <?php include("customer-page/website-footer.php"); ?>
    
    
    <script>
        let showpass = document.querySelector("#showpass");
        let password = document.getElementById("password");

        showpass.addEventListener("click", () => {
            if(password.type === "password"){
                password.type = "text";
                showpass.classList.replace("fa-eye", "fa-eye-slash");
            }else{
                password.type = "password";
                showpass.classList.replace("fa-eye-slash", "fa-eye");
            }
        });
        
    </script>

</body>
<style>
    <?php if(!empty($_GET['success']) == "Successfully"){?>
        .popup{
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,.4);
            display: flex;
            justify-content: center;
            align-items: center;
            left: 0;
            top: 0;
            z-index: 9999;
        }
        .popup a{
            background: white;
            color: black;
            text-decoration: none;
            padding: 6px 30px;
            border-radius: 50px;
        }
        .popup .log{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    <?php }?>
    .center{
        width: 100%;
        height: calc(100vh - 65px);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .box{
        background: rgb(225, 108, 105);
        padding: 20px;
        border-radius: 10px;
        width: 400px;
    }
    .form-box h1{
        text-align: center;
        color: white;
        margin-bottom: 15px;
        font-size: 30px;
    }
    .form-box .message p{
        text-align:center;
        margin: 10px 0;
        color: red;
    }
    .form-box #text{
        color: white;
        text-align: center;
        margin-bottom: 10px;
    }
    .form-box .inputs{
        display: flex;
        align-items: center;
        margin: 10px 0;
        position: relative;
    }
    .form-box .inputs label{
        padding: 9px 0 9px 15px;
        background: white;
        height: 100%;
        cursor: pointer;
        border-radius: 50px 0 0 50px;
    }
    .form-box .inputs input{
        border: none;
        outline: none;
        padding: 8px 8px 8px 8px;
        font-size: 17px;
        width: 100%;
        border-radius: 0 50px 50px 0;
    }
    .form-box .btn{
        display: flex;
        flex-direction: column;
    }
    .form-box .btn button{
        padding: 5px;
        border-radius: 50px;
        border: none;
        font-size: 20px;
        margin-top: 10px;
        cursor: pointer;
    }
  
</style>
</html>