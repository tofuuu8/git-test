<?php

include("connection.php");
include('phpmailer/src/PHPMailer.php');
include('phpmailer/src/SMTP.php');
include('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(!isset($_GET['email'])){
    header("Location: login.php");
}

if(isset($_POST['resend'])){
    $email = $_GET['email'];
    $mail = new PHPMailer(true);
    $verificationCode = rand(111111,999999);

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            
        $mail->Host = 'smtp.gmail.com';                    
        $mail->SMTPAuth = true;                                  
        $mail->Username = 'print.my.shirts.help@gmail.com';               
        $mail->Password = 'leqamrikuzrdceen';                               
        $mail->SMTPSecure = 'ssl';         
        $mail->Port = 465;                                    

        $mail->setFrom('print.my.shirts.help@gmail.com');
        $mail->addAddress($email);     

        $mail->isHTML(true);                                 
        $mail->Subject = 'Email Verification';
        $mail->Body    = '<p> Your Verification code is: '.$verificationCode.' </p>';
        
        $verify_email = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");

            if(mysqli_num_rows($verify_email) > 0){
                mysqli_query($conn, "UPDATE customer SET code = '$verificationCode' WHERE email = '$email' ");
                header("Location:verificationCode.php?email=$email");
            }

        $mail->send();
    } catch (Exception $e) {

    }
}

$msg = "";
if(isset($_POST['confirm'])){
    $email = $_GET['email'];
    $code = $_POST['code'];

    $verify_code = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email' AND code = '$code'");

    if(mysqli_num_rows($verify_code) > 0){
       header("Location: resetPassword.php?email=$email");
    }else{
        $msg = "Incorrect code";
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
     
                <h1>A code has been sent to your email</h1>
                <?= $msg; ?>
                <form action="" method="post">
                        <div class="inputs">
                            <label for="code"><i class="fa-solid fa-envelope"></i></i></label>
                            <input type="number" name="code" id="code" placeholder="Enter your code" autocomplete="off">
                        </div>
                        <div class="btn">
                            <button name="confirm" aria-label="confirm" title="">Confirm</button>
                        </div>
                        <button name="resend">resend</button>
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
        width: 550px;
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