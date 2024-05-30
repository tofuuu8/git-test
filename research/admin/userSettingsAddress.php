<?php
    include("../connection.php");

    $id = $_GET['customer_id'];
    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];

        $query = mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = '$id'");

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
    <link rel="stylesheet" href="userSettingsAddresss.css">
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
            <p><a href="userSettingsAccInfo.php?customer_id=<?= $id ?>">Account Information</a></p>
            <p id="active">Address</p>
        </div>
    </div>

    <div class="account-information">
        <div class="account-information-header">
            <h1>Address</h1>
        </div>

        <div class="addresses">
            <?php while($row = mysqli_fetch_assoc($query)){ ?>
                <div class="address">
                    <h1><?= $row['names']; ?></h1>
                    <h2><?= $row['phone_number']; ?></h2>
                    <h3><?= $row['address']; ?>, <?= $row['city']; ?>, <?= $row['zipcode']; ?>, <?= $row['country']; ?></h3>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

</body>
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
    .account-information{
        overflow: auto;
        padding-bottom: 20px;
    }
    .account-information .add-address{
        display: flex;
        justify-content: center;
        margin-top: 10px;;
    }
    .account-information .add-address a{
        color: #bfbfbf;
        text-decoration: none;
    }
    .addresses{
        width: 100%;
        height: auto;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .addresses .address{
        width: 100%;
        height: 120px;
        border-radius: 10px;
        background: #E16C69;
        display: flex;
        justify-content: center;
        flex-direction: column;
        color: white;
        padding-left: 12px;
        margin: 10px;
        position: relative;
    }
    .addresses .address a{
        position: absolute;
        right: 8%;
    } 
    .addresses .address a button{
        padding: 5px 30px;
        font-size: 18px;
        border: none;
        border-radius: 50px;
        cursor: pointer;
    }
</style>
</html>