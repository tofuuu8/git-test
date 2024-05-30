<?php
    include("connection.php");
    if(isset($_SESSION['valid'])){
        header("Location: customer-page/userpage.php");
    }
     if(isset($_SESSION['valid2'])){
        header("Location: admin/adminDashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login | Print My Shirt</title>
</head>
<body>
  <?php include("website-login-register-nav.php"); ?>

   <div class="center">
        <div class="box form-box">
            <?php
                $msg = "";
                $attemps_max = 5;
                $attemps_interval = 30;
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if(!isset($_SESSION['login_attempts'])){
                            $_SESSION['login_attempts'] = 1;
                            $_SESSION['last_attempts'] = time();
                        }else{
                            if(time() - $_SESSION['last_attempts'] > $attemps_interval){
                                $_SESSION['login_attempts'] = 1;
                                $_SESSION['last_attempts'] = time();
                            }
                            $_SESSION['login_attempts']++;
                        }
                        if($_SESSION['login_attempts'] > $attemps_max){
                            $msg = "You have rearched na max number of login, please wait 30 seconds to login again";
                        }else{
                            if(isset($_POST['login'])){
                                $username = $_POST['username'];
                                $password = $_POST['password'];

                                $verify_credentials = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username'");
                                $row = mysqli_fetch_assoc($verify_credentials);

                                $verify_credentials2 = mysqli_query($conn, "SELECT * FROM adminn WHERE username = '$username'");
                                $row2 = mysqli_fetch_assoc($verify_credentials2);

                                if(empty($username) && empty($password)){
                                        $msg = "Please enter your Username and Password";
                                }else if(empty($username)){
                                        $msg = "Enter your Username";
                                }elseif (empty($password)) {
                                        $msg = "Enter your Password";
                                }else{
                                        if($row && password_verify($password, $row['password'])){
                                                
                                                $_SESSION['valid'] = $row['username'];
                                                $_SESSION['valid'] = $row['password'];
                                                $_SESSION['customer_id'] = $row['customer_id'];
                                                $customer_id = $_SESSION['customer_id'];
                                                $email = $row['email'];
                                                $usernames = $row['username'];
                                                
                                                mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Logged in')");

                                                if(isset($_SESSION['valid'])){
                                                    header("Location: customer-page/userpage.php");
                                                }
                                        }else if($row2 && password_verify($password, $row2['password'])){
                                            $_SESSION['valid2'] = $row2['username'];
                                            $_SESSION['valid2'] = $row2['password'];
                                            $customer_id = $_SESSION['customer_id'];
                                            if(isset($_SESSION['valid2'])){
                                                header("Location: admin/adminDashboard.php");
                                            }
                                        }else{
                                            $msg = "Invalid Credentials";
                                        }
                                }   
                            }
                        }
                    }

            ?> 
        
                <h1>Log in</h1>
                <form action="" method="post">
                    
                    <p id="text">Login with Print My Shirt Account</p>
                        <div class="inputs">
                            <label for="username"><i class="fa-solid fa-user"></i></label>
                            <input type="text" name="username" id="username" placeholder="Enter username" autocomplete="">
                        </div>
                        <div class="inputs">
                            <label for="password"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Enter password">
                            <i class="fa-solid fa-eye" id="showpass"></i>
                        </div>
                        <div class="message"><p><?= $msg; ?></p></div>
                        <div class="btn">
                            <button name="login" aria-label="Login" title="Login to proceed the userpage">Login</button>
                        </div>

                        <div class="forgot-password">
                            <p><a href="enterEmail.php">Forgot Password?</a></p>
                        </div>
                        <div class="dont-have-account">
                            <p>Don't have an account? <a href="register.php" title="Register if you don't have account">Register</a></p>
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
        width: 350px;
    }
    .form-box h1{
        text-align: center;
        color: white;
        margin-bottom: 10px;
        font-size: 50px;
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
        border-radius: 50px 0 0 50px ;
    }
    .form-box .inputs input{
        border: none;
        outline: none;
        padding: 8px 43px 8px 8px;
        font-size: 17px;
        width: 100%;
        border-radius: 0 50px 50px 0;
    }
    .form-box .inputs #showpass{
        position: absolute;
        right: 3%;
        font-size: 19px;
        cursor: pointer;  
        width: 30px;
        display: flex;
        justify-content: center;
    }
    .form-box .btn{
        display: flex;
        margin: 15px 0;
        flex-direction: column;
    }
    .form-box .btn button{
        padding: 5px;
        border-radius: 50px;
        border: none;
        font-size: 20px;
        margin-top: px;
        cursor: pointer;
    }
    .form-box .forgot-password{
        text-align: center;
        margin-top: 15px;
    }
    .form-box .forgot-password p, a{
        color: white;
        transition: all .2s;
    }
    .form-box .forgot-password a:hover{
        color: black;
    }
    .form-box .dont-have-account{
        text-align: center;
        margin-top: 5px;
    }
    .form-box .dont-have-account p, a{
        color: white;
        transition: all .2s;
    }
    .form-box .dont-have-account a:hover{
        color: black;
    }
</style>
</html>