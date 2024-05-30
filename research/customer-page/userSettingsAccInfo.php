<?php
    include("connection.php");

    $session_timeout = 700;
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
 
    if(isset($_SESSION['customer_id'])){
        $id = $_SESSION['customer_id'];

        $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $id");

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

            $user = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $id");
            $user_row = mysqli_fetch_assoc($user);

            if($user_row && password_verify($confirmpassword, $user_row['password'])){
                
                $verify_username = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$newusername'");

                if(mysqli_num_rows($verify_username)){
                    header("location: userSettingsAccInfo.php?Username is taken, please try another");
                }else{
                    mysqli_query($conn, "UPDATE customer SET username = '$newusername' WHERE customer_id = $id");
                    header("location: userSettingsAccInfo.php?Successfully change");
                    mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$id','$email','$username','Changed Username to $newusername');");
                }
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }

        if(isset($_POST['change2'])){
            $newfname = $_POST['newfname'];
            $newlname = $_POST['newlname'];
            $confirmpassword = $_POST['confirmpassword'];

            $names = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $id");
            $names_row = mysqli_fetch_assoc($names);

            if($names_row && password_verify($confirmpassword, $names_row['password'])){
                mysqli_query($conn, "UPDATE customer SET first_name = '$newfname', last_name = '$newlname' WHERE customer_id = $id");
                mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$id','$email','$username','Changed Name');");
                header("location: userSettingsAccInfo.php?Successfully change");
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }

        if(isset($_POST['change3'])){
            $newemail = $_POST['newemail'];
            $confirmpassword = $_POST['confirmpassword'];

            $verify_email = mysqli_query($conn, "SELECT * FROM customer WHERE password = '$confirmpassword'");

            if(mysqli_num_rows($verify_email) > 0){
                mysqli_query($conn, "UPDATE customer SET email = '$newemail' WHERE customer_id = $id");
                header("location: userSettingsAccInfo.php?Successfully change");
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }
        if(isset($_POST['change4'])){
            $newnumber = $_POST['newnumber'];
            $confirmpassword = $_POST['confirmpassword'];

            $phones = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $id");
            $phones_row = mysqli_fetch_assoc($phones);

            if($phones_row && password_verify($confirmpassword, $phones_row['password'])){
                mysqli_query($conn, "UPDATE customer SET phone_number = '$newnumber' WHERE customer_id = $id");
                mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$id','$email','$username','Changed Phone number');");
                header("location: userSettingsAccInfo.php?Successfully change");
            }else{
                header("location: userSettingsAccInfo.php?Incorrect password");
            }
        }
        if(isset($_POST['change5'])){
            $oldpassword = $_POST['oldpassword'];
            $newpassword = $_POST['newpassword'];
            $confirmpassword = $_POST['confirmpassword'];

            $passwords = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $id");
            $passwords_row = mysqli_fetch_assoc($passwords);

                if($passwords_row && password_verify($oldpassword, $passwords_row['password'])){
                    if($newpassword !== $confirmpassword){
                        header("Location:userSettingsAccInfo.php?Password did not match");
                    }else{
                        $hash = password_hash($newpassword, PASSWORD_BCRYPT);
                        mysqli_query($conn, "UPDATE customer SET password = '$hash' WHERE customer_id = $id");
                        mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$id','$email','$username','Changed Password');");
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
    <title>Account Settings | Print My Shirt</title>
    <link rel="stylesheet" href="userSettingsAccInfos.css">
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
    <div class="settings">
        <h1>Settings</h1>
        <div class="settingsContent">
            <p id="active">Account Information</p>
            <p><a href="userSettingsAddress.php">Address</a></p>
            <!-- <p><a href="userSettingsPaymentInfo.php">Payment Information</a></p> -->
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
                <div class="edit">
                    <button name="edit" id="edit" onclick="edit1()">Edit</button>
                </div>
            </div>

            <div class="username-center" id="username-center">
                <span onclick="remove_edit1()">X</span>
                <div class="username-box">
                    <h1>Edit Username</h1>
                    <form action="" method="post">
                        <div class="current-username">
                            <label for="current-username">Current Username: </label>
                            <input type="text" id="current-username" value="<?= $username ?>" disabled>
                        </div>
                        <div class="inputs">
                            <label for="newusername">Enter new Username: </label>
                            <input type="text" name="newusername" id="newusername"  required> 
                        </div>
                        <div class="inputs">
                            <label for="confirmpassword">Confirm Password: </label>
                            <input type="password" name="confirmpassword" id="confirmpassword" required>
                        </div>
                        <div class="btn">
                            <button name="change1"> Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="account-information-label2">
            <div class="name-edit all-edits">
                <div class="name">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" class="hidebg" placeholder="" disabled value="<?= $first_name;?> <?= $last_name; ?>">
                </div>
                <div class="edit">
                    <button name="edit" id="edit" onclick="edit2()">Edit</button>
                </div>
            </div>

            <div class="name-center" id="name-center">
                <span onclick="remove_edit2()">X</span>
                <div class="name-box">
                    <h1>Edit Name</h1>
                    <form action="" method="post">
                        <div class="current-name">
                            <label for="current-name">Current Name: </label>
                            <input type="text" id="current-name" value="<?= $first_name; ?> <?= $last_name; ?>" disabled>
                        </div>
                        <div class="inputs">
                            <label for="newfname">Enter First Name: </label>
                            <input type="text" name="newfname" id="newfname" required>
                        </div>
                        <div class="inputs">
                            <label for="newlname">Enter Last Name: </label>
                            <input type="text" name="newlname" id="newlname" required>
                        </div>
                        <div class="inputs">
                            <label for="confirmpassword">Confirm Password: </label>
                            <input type="password" name="confirmpassword" id="confirmpassword" required>
                        </div>
                        <div class="btn">
                            <button name="change2"> Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="account-information-label3">
            <div class="email-edit all-edits">
                <div class="email">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" class="hidebg" placeholder="" disabled value="<?= $email; ?>">
                </div>
                <!-- <div class="edit">
                    <button name="edit" id="edit" onclick="edit3()">Edit</button>
                </div> -->
            </div>

            <!-- <div class="email-center" id="email-center">
                <span onclick="remove_edit3()">X</span>
                <div class="email-box">
                    <h1>Edit Email</h1>
                    <form action="" method="post">
                        <div class="current-email">
                            <label for="current-email">Current Email: </label>
                            <input type="text" id="current-email" disabled value="<?= $email; ?>">
                        </div>
                        <div class="inputs">
                            <label for="newemail">Enter new Email: </label>
                            <input type="text" name="newemail" id="newemail">
                        </div>
                        <div class="inputs">
                            <label for="confirmpassword">Confirm Password: </label>
                            <input type="password" name="confirmpassword" id="confirmpassword">
                        </div>
                        <div class="btn">
                            <button name="change3"> Confirm</button>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>

        <div class="account-information-label4">
            <div class="phone-edit all-edits">
                <div class="phone-number">
                    <label for="phone-number">Phone number: </label>
                    <input type="text" name="phone-number" id="name" class="hidebg" placeholder="" disabled value="<?= $phone_number; ?>">
                </div>
                <div class="edit">
                    <button name="edit" id="edit" onclick="edit4()">Edit</button>
                </div>
            </div>

            <div class="phone-center" id="phone-center">
                <span onclick="remove_edit4()">X</span>
                <div class="phone-box">
                    <h1>Edit Phone Number</h1>
                    <form action="" method="post">
                        <div class="current-number">
                            <label for="current-number">Current Phone number: </label>
                            <input type="text" id="current-number" disabled value="<?= $phone_number; ?>">
                        </div>
                        <div class="inputs">
                            <label for="newnumber">Enter new Phone number: </label>
                            <input type="text" name="newnumber" id="newnumber">
                        </div>
                        <div class="inputs">
                            <label for="confirmpassword">Confirm Password: </label>
                            <input type="password" name="confirmpassword" id="confirmpassword">
                        </div>
                        <div class="btn">
                            <button name="change4">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="account-information-label5">
            <div class="password-edit all-edits">
                <div class="password">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" class="hidebg"  disabled value="<?= $password; ?>">
                </div>
                <div class="edit">
                    <button name="edit" id="edit" onclick="edit5()">Edit</button>
                </div>
            </div>

            <div class="password-center" id="password-center">
                <span onclick="remove_edit5()">X</span>
                <div class="password-box">
                    <h1>Edit Password</h1>
                    <form action="" method="post">
                        <div class="current-password">
                            <label for="current-password">Current Password: </label>
                            <input type="password" id="current-passsword" disabled value="<?= $password; ?>">
                        </div>
                        <div class="inputs">
                            <label for="oldpassword">Enter old Password: </label>
                            <input type="password" name="oldpassword" id="oldpassword">
                        </div>
                        <div class="inputs">
                            <label for="newpassword">Enter new Password: </label>
                            <input type="password" name="newpassword" id="newpassword" minleng="8">
                        </div>
                        <div class="inputs">
                            <label for="confirmpassword">Confirm Password: </label>
                            <input type="password" name="confirmpassword" id="confirmpassword" minlength="8">
                        </div>
                        <div class="btn">
                            <button name="change5"> Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php include("website-footer.php"); ?>

<script>
    let username_center = document.getElementById("username-center");
    let name_center = document.getElementById("name-center");
    let email_center = document.getElementById("email-center");
    let phone_center = document.getElementById("phone-center");
    let password_center = document.getElementById("password-center");

    function edit1(){
        username_center.classList.add("show-username-center");
    }
    function remove_edit1(){
        username_center.classList.remove("show-username-center");
    }

    function edit2(){
        name_center.classList.add("show-name-center");
    }
    function remove_edit2(){
        name_center.classList.remove("show-name-center");
    }

    function edit3(){
        email_center.classList.add("show-email-center");
    }
    function remove_edit3(){
        email_center.classList.remove("show-email-center");
    }

    function edit4(){
        phone_center.classList.add("show-phone-center");
    }
    function remove_edit4(){
        phone_center.classList.remove("show-phone-center");
    }

    function edit5(){
        password_center.classList.add("show-password-center");
    }
    function remove_edit5(){
        password_center.classList.remove("show-password-center");
    }
</script>
</body>
</html>