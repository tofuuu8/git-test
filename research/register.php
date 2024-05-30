<?php
    include("connection.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Register | Print My Shirt</title>
</head>
<body>
    <?php include("website-login-register-nav.php"); ?>
    
    <div class="center">
        <div class="box form-box">
            <?php
                $msg = "";
                if(isset($_POST['register'])){
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $phonenumber = $_POST['phonenumber'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    
                    $verify_query = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username' OR email = '$email'");

                    if(empty($fname) OR empty($lname) OR empty($email) OR empty($username) OR empty($phonenumber) OR empty($password) OR empty($cpassword)){
                        $msg = "All fields are required";
                    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $msg = "Invalid email Address";
                    }else if(strlen($phonenumber) > 11 OR strlen($phonenumber) < 11){
                        $msg = "Invalid Phone number";
                    }else{
                    
                        if(mysqli_num_rows($verify_query) > 0){
                            $msg = "Username or email is already taken, try another";
                        }else{

                                if(strlen($password) < 8){
                                    $msg = "Password atleast 8 characters";
                                }else{
                                
                                if($password !== $cpassword){
                                    $msg = "Passwords do not match";
                                }else{
                                    $hash = password_hash($password, PASSWORD_BCRYPT);
                                    
                                    mysqli_query($conn, "INSERT INTO customer(username,email,first_name,last_name,phone_number,password) VALUES('$username','$email','$fname','$lname','$phonenumber','$hash')");

                                    $query = mysqli_query($conn, "SELECT * FROM customer");
                                        while($row = mysqli_fetch_assoc($query)){
                                            $customer_id = $row['customer_id'];
                                        }
                                    mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$customer_id','New user','New user','Created an account')");
                                    
                                    header("Location: register.php?success=Successfully Registered");
                                }
                            }
                        }
                    }
                }
            ?> 
                <?php if(!empty($_GET['success']) == "Successfully Registered"){ ?>
                    <div class="popup">
                        <div class="box">
                            <h1>Successfully Register</h1>
                            <div class="log">
                                <a href="login.php" id="login">Login now</a>
                            </div>             
                        </div>
                    </div>
                <?php }?>

                <h1>Sign Up</h1>
                <form action="" name="form" method="post">
                    <div class="left-right">
                        <div class="left">
                            <div class="left-inputs-flname">
                                <div class="fname">
                                    <input type="text" name="fname" id="fname" placeholder="First name" autocomplete="off">
                                </div>
                                <div class="lname">
                                    <input type="text" name="lname" id="lname" placeholder="Last name" autocomplete="off">
                                </div>
                            </div>
                            <div class="left-inputs">
                                <input type="email" name="email" id="email" placeholder="Email" autocomplete="off">
                            </div>
                            <div class="left-inputs">
                                <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
                            </div>
                        </div>
                        <div class="right">
                            <div class="right-inputs">
                                <input type="number" name="phonenumber" id="phonenumber" placeholder="Phone number" autocomplete="off">
                            </div>
                            <div class="right-inputs">
                                <input type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="right-inputs">
                                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>

                    <div class="message"><p><?= $msg; ?></p></div>

                    <div class="register">
                        <button id="register" name="register">Register</button>
                    </div>

                    <div class="have-account">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>

                    <div class="terms-condition">
                        <!-- <input type="checkbox" name="" id="checkbox"> -->
                        <p><input type="checkbox" required> <a href="condition-privacy.html" target="_blank">Terms and Conditions</a> and <a href="condition-privacy.html#privacy-policy"  target="_blank">Privacy Policy </a></p>
                    </div>
                </form>
               
        </div>

    </div>  
    <!-- <div class="privacy-policy" id="privacy-policy">
        <div class="policy-box">
            <h1>Privacy Policy</h1>
                <div class="privacy-policy-content">
                    <div class="privacy-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem officiis blanditiis inventore ipsum eius, repudiandae, impedit debitis deleniti nihil delectus quam voluptatibus quod, iste eos? Debitis repellendus architecto obcaecati quos sed voluptatem recusandae repudiandae consectetur, cupiditate voluptatibus autem hic? Totam deleniti eius perferendis omnis blanditiis aspernatur, beatae, debitis facilis veritatis maiores quibusdam, exercitationem vitae. Odit at fugit quisquam, dignissimos dolores cum molestias necessitatibus eveniet, officia quae veniam amet accusamus, aperiam earum. Voluptas aliquid magnam minus fugiat harum ipsum similique laborum quis dolore? Laboriosam accusantium alias, aliquid autem suscipit blanditiis possimus tempora, sed veritatis animi omnis neque nemo minus minima? Mollitia reiciendis deleniti, iure quod illo officia aliquid fuga quasi excepturi doloremque maiores. Nemo distinctio ipsa omnis assumenda. Suscipit placeat officiis sed consequuntur voluptate quae deleniti corrupti, doloribus accusamus voluptatibus quos recusandae laudantium, blanditiis architecto libero non, nihil cupiditate aliquam possimus tempora! Sunt nobis distinctio, tempora at nisi alias maiores obcaecati officia delectus veniam, ad deserunt odio. Ad illum error neque corporis autem sed, voluptas quas odio veniam iste dicta, minima accusamus recusandae totam et harum animi aliquid praesentium, ipsam quisquam. Animi maiores impedit nesciunt quasi voluptatem quam voluptatibus natus excepturi praesentium ratione. Laborum modi deserunt facere, magnam a praesentium quibusdam blanditiis, mollitia commodi quo ad id qui, nihil eaque nemo libero soluta sequi nobis voluptate sit iste cumque voluptatum laudantium nam! Nihil deleniti unde ipsam sunt culpa atque optio deserunt laborum, dolore corrupti sed sapiente dolorum, in impedit explicabo alias natus ad esse nobis doloremque laudantium assumenda tempore non? In inventore, reiciendis id nemo quidem culpa possimus veniam repellendus itaque illum corrupti! Assumenda, porro quaerat quam incidunt similique nisi dolore dolores magnam repellat iusto voluptas unde odio voluptates hic culpa fugit sunt dicta pariatur obcaecati rem inventore! Accusamus dolorem, doloremque quo reprehenderit magni possimus! Dolor beatae fuga, eius ea ratione pariatur esse magnam dicta ipsa architecto nobis mollitia a explicabo cumque doloribus sapiente ducimus consectetur consequatur deleniti quis magni, provident dolore sint! Beatae repellendus ullam, modi temporibus iusto provident omnis sint. Consequuntur alias quae reiciendis, placeat et nesciunt mollitia laudantium expedita quo pariatur minima repellendus voluptatum incidunt tempora reprehenderit provident soluta autem nam, nostrum facere? Perspiciatis neque ipsum veritatis, ipsam illum ea suscipit maxime accusamus quibusdam illo vero dolor quasi hic, sapiente iusto, laborum ducimus fuga similique harum aut magnam odit! Sit soluta esse cum voluptate impedit, ducimus consequatur eligendi repudiandae illo, vel non eos labore. Ea asperiores numquam iste eos veritatis debitis aliquam officiis molestias, ratione deleniti rem, eum saepe et magnam commodi laudantium excepturi aut consequuntur? Est vero deserunt praesentium, nesciunt sapiente numquam illo qui harum obcaecati amet officia corporis possimus porro dolorem recusandae dolores! Ut, ipsa aliquid. Consequatur, magni? Nostrum cupiditate delectus voluptate eum quam quae quisquam harum explicabo nobis quasi, obcaecati, voluptatibus nisi dolores asperiores in nulla distinctio suscipit, magni amet laboriosam ut deleniti iste illum molestias! Natus harum beatae, totam est ab nostrum, asperiores debitis impedit officia provident dignissimos quasi. Quas non accusamus facilis numquam similique cum, quod temporibus esse iste sapiente vel atque saepe.</p>
                    </div>
                    <div class="confirm-text">
                        <div class="text">
                            <input type="checkbox" name="termsCheck" id="termsCheck" onclick="termsBtn()">
                            <label for="termsCheck">Agree and accept Privacy Policy</label>
                        </div>
                        <div class="confirm">
                            <button disabled="true" id="confirm-btn" onclick="confirmBtn()">Confirm</button>
                        </div>
                    </div>
                </div>
        </div> -->
    </div>
     <?php include("customer-page/website-footer.php"); ?> 
      
    <script>

        function termsBtn(){
            let termsCheck = document.getElementById("termsCheck");
            let confirm_btn = document.getElementById("confirm-btn");

                if(termsCheck.checked){
                    confirm_btn.removeAttribute("disabled");
                }else{
                    confirm_btn.disabled = "true";
                }
        }
        function confirmBtn(){
            let privacy_policy = document.getElementById("privacy-policy");

            privacy_policy.classList.toggle("hidden");
        }
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
        display: flex;
        height: calc(100vh - 65px);
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .box{
        background: rgb(225, 108, 105);
        padding: 20px;
        border-radius: 10px;
        width: auto;
    }
    .form-box h1{
        text-align: center;
        color: white;
        margin-bottom: 20px;
        font-size: 50px;
    }
    .form-box .left-right{
        display: flex;
        width: 100%;
        gap: 30px;
    }
    .form-box .left-right .left{
        width: 65%;
    }
    .form-box .left-right .right{
        width: 35%;
    }
    .form-box .left-right .left .left-inputs-flname{
        display: flex;
        gap: 30px;
    }
    .form-box .left-right .left .left-inputs-flname .fname #fname, .lname #lname{
        display: flex;
        width: 100%;
        flex-direction: column;
        margin-bottom: 5px;
    }
    .form-box .left-right .left .left-inputs #email, #username{
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-bottom: 5px; 
    }
    .form-box .left-right .right .right-inputs{
        display: flex;
        flex-direction: column;
        margin-bottom: 5px;
    }
    .form-box input{
        border: none;
        padding: 8px 12px 8px 12px;
        border-radius: 50px;
        font-size: 16px;
        outline: none;
    }
    .form-box .register{
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        height: 50px;
    }
    .form-box .register button{
        padding: 7px 40px;
        font-size: 16px;
        background: white;
        border-radius: 50px;
        border: none;
        cursor: pointer;
    }
    .form-box .have-account p, a{
        text-align: center;
        color: white;
        transition: all .2s;
    }
    .form-box .have-account a:hover{
        color: black;
    }
    .form-box .terms-condition{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        height: 25px;
    }
    .form-box .terms-condition input#checkbox{
        height: 19px;
        width: 19px;
    }
    .form-box .terms-condition p, a{
        color: white;
        transition: all .2s;
    }
    .form-box .terms-condition a:hover{
        color: black;
    }
    .form-box .message p{
        text-align:center;
        margin: 5px 0;
        color: red;
    }
    /* .form-box .message1 h2{
        color: white;
        border: 2px solid red;
        padding: 5px;
        margin-bottom: 30px;
    }
    .form-box #message1-btn{
        text-decoration: none;
        padding: 6px 12px;
        background: white;
        color: black;
        border-radius: 5px;
        font-size: 19px;
    }
    .form-box .message2 h2{
        color: white;
        border: 2px solid green;
        padding: 5px;
        font-size: 30px;
    }
    .form-box .message2-btn{
        margin-top: 20px;
        padding: 6px 12px;
        background: white;
        color: black;
        border-radius: 5px;
        font-size: 19px;
        cursor: pointer;
        border: none;
        outline: none;
    } */
    .privacy-policy{
        position: fixed;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }
    .privacy-policy.hidden{
        display: none;
    }
    .privacy-policy .policy-box{
        width: 500px;
        height: 600px;
        background: beige;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        background: rgb(225, 108, 105);
        padding: 10px 20px 20px 20px;
    }
    .privacy-policy .policy-box h1{
        text-align: center;
        font-size: 50px;
        margin-bottom: 10px;
        color: white;
    }
    .privacy-policy .privacy-policy-content{
        width: 100%;
        height: 100%;
        background: #C84542;
        border-radius: 10px;
        overflow: auto;
        color: white;
    }
    .privacy-policy .privacy-policy-content .privacy-text{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .privacy-policy .privacy-policy-content .privacy-text p{
        line-height: 20px;
        text-align: justify;
        padding: 10px 0 10px 10px;
    }
    .privacy-policy .policy-box .privacy-policy-content::-webkit-scrollbar{
        width: 12px;
        border-radius: 50%;
    }
    .privacy-policy .policy-box .privacy-policy-content::-webkit-scrollbar-thumb{
        background: white;
        border-radius: 20px;
    }
    .privacy-policy .privacy-policy-content .confirm-text{
        width: 100%;
        height: 80px;
        box-shadow: 0 0 5px black;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .privacy-policy .privacy-policy-content .confirm-text .text{
        display: flex;
        height: 50%;
        align-items: center;
        gap: 10px;
    }
    .privacy-policy .privacy-policy-content .confirm-text .text #termsCheck{
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .privacy-policy .privacy-policy-content .confirm-text .confirm{
        height: 45%;
    }
    .privacy-policy .privacy-policy-content .confirm-text .confirm button{
        padding: 5px 40px;
        font-size: 17px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
    }
</style>
</body>
</html>