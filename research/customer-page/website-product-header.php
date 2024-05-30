<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/logo.png">
    <title>Document</title>
</head>
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
    .header-nav{
        display: flex;
        justify-content: center;
        gap: 40px;
        list-style: none;
        width: 50%;
        align-items: center;
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
    .header-right{
        display: flex;
        padding-right: 3%;
        align-items: center;
        gap: 40px;
    }
    .header-right .icons{
        display: flex;
        gap: 20px;
    }
    .header-right .icons i{
        font-size: 30px;
        cursor: pointer;
    }
    .header-right .icons .notification{
        position: relative;
    }
    .header-right .icons .notification .notifs{
        position: absolute;
        width: 330px;
        background: #ff807d;
        height: 330px;
        left: -320px;
        top: 35px;
        box-shadow: 0 0 10px black;
        border-radius: 10px;
        display: none;
        z-index: 1;
    }
    .header-right .icons .notification .notifs.active{
        display: block;
    }
    .header-right .icons .shopping-cart i{
        color: black;
    }
    .header-right .icons .user{
        position: relative;
    }
    .header-right .icons .settings-helpSupport-logout{
        position: absolute;
        width: 00px;
        background: #ff807d;
        height: 150px;
        left: -210px;
        top: 35px;
        box-shadow: 0 0 10px black;
        border-radius: 10px;
        display: none;
        flex-direction: column;
        padding: 10px;
        z-index: 1;
    }
    .header-right .icons .settings-helpSupport-logout.active{
        display: flex;
    }
    .header-right .icons .settings-helpSupport-logout a{
        width: 100%;
        height: 100%;
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        letter-spacing: 1px;
        font-size: 22px;
        transition: all .2s;
        justify-content: center;
    }
    .header-right .icons .settings-helpSupport-logout a:nth-child(2){
        border-bottom: 1.9px solid #943331;
        border-top: 1.9px solid #943331;
    }
    .header-right .icons .settings-helpSupport-logout a:hover{
        background: #e16c69;
    }
</style>
<body>
    <header id="header">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <ul class="header-nav">
            <li><a href="../userpage.php">Home</a></li>
            <li><a href="../userpage.php#about">About us</a></li>
            <li><a href="../userpage.php#products">Products</a></li>
            <li><a href="../userpage.php#services">Services</a></li>
            <li><a href="../userpage.php#contact">Contact us</a></li>
        </ul>

        <div class="header-right">

            <div class="icons">
                <div class="notification">
                    <label for="fa-notif-check"><i class="fa-solid fa-bell" id="bell"></i></label>

                   
                    <div class="notifs" id="notifs">

                    </div>
                   
                </div>

                <!-- <div class="shopping-cart">
                    <a href="/research/cart/shopping-cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </div> -->

                <div class="orders">
                    <a href="../orders/orders-pay.php" style="color: black;" title="orders"><i class="fa-solid fa-box"></i></a>
                </div>

                <div class="user">
                    <label for="fa-user-check"><i class="fa-solid fa-user" id="usericon"></i></label>

                    <div class="settings-helpSupport-logout" id="settings-helpSupport-logout">
                        <a href="../userSettingsAccInfo.php">Account Settings</a>
                        <a href="../logout.php">Logout</a>
                    </div>
                </div>
            </div>

        </div>
</header> 

<script>
    
    
    let usericon= document.getElementById("usericon");
    let settings_helpSupport_logout = document.getElementById("settings-helpSupport-logout");

    let bell = document.getElementById("bell");
    let notifs = document.getElementById("notifs");

    bell.onclick = function(){
        notifs.classList.toggle("active");
    }
    usericon.onclick = function(){
        settings_helpSupport_logout.classList.toggle("active");
    }
    

    document.onclick = function(e){
        if(e.target.id !== 'notifs' && e.target.id !== 'bell'){
            notifs.classList.remove('active');
        }
        
        if(e.target.id !== 'settings_helpSupport_logout' && e.target.id !== 'usericon' ){
            settings_helpSupport_logout.classList.remove('active');
        }
    }
</script>
</body>
</html>