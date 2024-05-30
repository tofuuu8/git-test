
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
        padding: 0;
        margin: 0;
        font-family: sans-serif;
        text-decoration: none;
        letter-spacing: 1px;
        color: black;
    }
    header{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 65px;
        background: #c84542;
        position: fixed;
        top: 0;
        left: 0;
    }
    .header-left{
        display: flex;
        align-items: center;
        width: 30%;
        padding-left: 40px;
    }
    header .header-left .logo img{
        width: 40px;
    }
    .header-left .back-to-home a{
        margin: 0 20px;
        font-size: 45px;
        display: flex;
    }
    .header-center{
        width: 40%;
    }
    .header-center input{
        width: 100%;
        font-size: 17px;
        padding: 7px;
        border: none;
        border-radius: 50px;
        outline: none;
    }
    .header-right{
        display: flex;
        align-items: center;
        width: 30%;
        padding-right: 40px;
        gap: 15px;
        justify-content: flex-end;
    }
    .header-right a, i{
        font-size: 32px;
        display: flex;
        cursor: pointer;
    }
    .header-right .notification{
        position: relative;
    }
    .header-right .notification .notifs{
        position: absolute;
        width: 330px;
        background: #ff807d;
        height: 330px;
        left: -320px;
        top: 35px;
        box-shadow: 0 0 10px black;
        border-radius: 10px;
        display: none;
        z-index: 99999999;
    }
    .header-right .notification .notifs.active{
        display: block;
    }
    .header-right .shopping-cart i{
        color: black;
    }
    .header-right .user{
        position: relative;
    }
    .header-right .settings-helpSupport-logout{
        position: absolute;
        width: 200px;
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
    .header-right .settings-helpSupport-logout.active{
        display: flex;
    }
    .header-right .settings-helpSupport-logout a{
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
    .header-right .settings-helpSupport-logout a:nth-child(2){
        border-bottom: 1.9px solid #943331;
        border-top: 1.9px solid #943331;
    }
    .header-right .settings-helpSupport-logout a:hover{
        background: #e16c69;
    }
</style>
<body>
    <header>
        <div class="header-left">
            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>
            <div class="back-to-home">
                <a href="../customer-page/userpage.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="text">
                <h1>My Orders</h1>
            </div>
        </div>
        <div class="header-center">
            <form action="" method="get">
                <input type="text" id="search" name="search" placeholder="Search product name">
                <button name="submit" style="display: none;">Search</button>
            </form>
        </div>
        <div class="header-right">
            <div class="notification">
                <label for="fa-notif-check" title="notification"><i class="fa-solid fa-bell" id="bell"></i></label>

               
                <div class="notifs" id="notifs">

                </div>
               
            </div>

            <!-- <div class="shopping-cart">
                <a href="../cart/shopping-cart.php" title="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div> -->

            <div class="orders">
               <i class="fa-solid fa-box"></i>
            </div>

            <div class="user">
                <label for="fa-user-check"><i class="fa-solid fa-user" id="usericon"></i></label>

                <div class="settings-helpSupport-logout" id="settings-helpSupport-logout">
                    <a href='../customer-page/userSettingsAccInfo.php'>Account Settings</a>
                    
                    <a href="../customer-page/logout.php">Logout</a>
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