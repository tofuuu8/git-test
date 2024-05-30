<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Document</title>
</head>
<body>
<header>
        <div class="background">
            <img src="images/printmyshirts.png" alt="">
        </div>
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <ul class="header-nav">
            <li><a href="customer-page/homepage.php">Home</a></li>
            <li><a href="customer-page/homepage.php#about">About us</a></li>
            <li><a href="customer-page/homepage.php#products">Products</a></li>
            <li><a href="customer-page/homepage.php#service">Services</a></li>
            <li><a href="customer-page/homepage.php#contact">Contact us</a></li>
        </ul>
</header>
</body>
<style>
    *{
        padding: 0;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1px;
    }
    .background{
        position: absolute;
        width: 100%;
        height: 100vh;
        top:0;
        z-index: -1;
        filter: blur(1px) brightness(.85);
    }
    .background img{
        width: 100%;
        height: 100vh;
        position: absolute;
        top: 0;
    }
    header{
        display: flex;
        justify-content: space-between;
        height: 65px;
        background: #c84542;
        align-items: center;
    }
    .logo{
        width: 10%;
        text-align:center;
    }
    .logo img{
        width: 50px;
    }
    .header-nav{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px;
        list-style: none;
        width: 90%;
    }
    .header-nav li a{
        color: white;
        text-decoration: none;
        letter-spacing: 1px;
        font-size: 19px;
        transition: .5s;
    }
    .header-nav li a:hover{
        color: black;
    }
</style>
</html>