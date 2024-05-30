<?php 
include('connection.php');
if(!isset($_SESSION['valid'])){
    header("Location:../login.php");
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
</head>

<body>
    <?php include("website-header.php"); ?> 

    <div class="content">
        <div class="settings">
            <h1>Settings</h1>
            <div class="settingsContent">
                <p><a href="userSettingsAccInfo.php">Account Information</a></p>
                <p><a href="userSettingsAddress.php">Address</a></p>
                <p id="active"><a href="userSettingsPaymentInfo.html">Payment Information</a></p>
            </div>
            <div class="helpSupport">
                <a href="">Help & Support</a>
            </div>
        </div>
        <div class="accountInfo" id="accountInfo">
            <div class="h1">
                <h1 id="h1">Payment Information</h1>
            </div>
            <form action="">
                <div class="payment1">
                    <label for="payment1">Payment1:</label>
                    <input type="text" id="payment1" name="payment1" placeholder="*Payment1*">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
                <div class="payment2">
                    <label for="payment">Payment2:</label>
                    <input type="text" id="payment2" name="payment2" placeholder="*Payment2*">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>

                <div class="paymentMethod">
                    <a href=""><i class="fa-light fa-plus"></i>Click to add another payment method</a>
                </div>
            </form>
        </div>
    </div>
    <?php include("website-footer.php"); ?>
    <script>
        document.onclick = function(e){
             if(e.target.id !== 'notifs' && e.target.id !== 'bell'){
                 notifs.classList.remove('active');
             }
             
             if(e.target.id !== 'settings_helpSupport_logout' && e.target.id !== 'usericon' ){
                 settings_helpSupport_logout.classList.remove('active');
             }
         }
 
 
        
         
 
         let bell = document.getElementById('bell');
         let notifs = document.getElementById('notifs');
 
         bell.onclick = function(){
             notifs.classList.toggle('active');
         }
 
 
 
         let settings_helpSupport_logout = document.getElementById('settings-helpSupport-logout');
         let usericon = document.getElementById('usericon');
 
         usericon.onclick = function(){
             settings_helpSupport_logout.classList.toggle('active');
         }
 
     </script>
</body>
<style>
    .content{
        display: flex;
    }
    .content .settings{
        background: #E16C69;
        width: 20%;
        height: calc(100vh - 65px);
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .content .settings h1{
        color: white;
        font-weight: 400;
        font-size: 40px;
        margin: 15px 0;
        letter-spacing: 1px;
    }
    .content .settings .settingsContent{
        width: 100%;
        line-height: 50px;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .content .settings .settingsContent p{
        width: 100%;
        text-align: center;
        cursor: pointer;
        transition: .3s;
        color: white;
        font-size: 20px;
        letter-spacing: 1px;
    }
    .content .settings .settingsContent p a:hover{
        color: black;
    }
    .content .settings .settingsContent #active{
        color: black;
        background: #FF807D;
    }
    .content .settings .settingsContent p a{
        color: white;
        text-decoration: none;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .3s;
    }
    .content .helpSupport{
        position: absolute;
        bottom: 10%;
        left: 2%;
    }
    .content .helpSupport a{
        color: white;
        text-decoration: none;
        letter-spacing: 1px;
        font-size: 19px;
    }
    .content .accountInfo{
        display: flex;
        flex-direction: column;
        width: 100%;    
    }
    .content .accountInfo .h1{
        width: 100%;
        height: 120px;
        display: flex;
        align-items: center;
    }
    .content .accountInfo .h1 h1{
        background: #EEECEB;
        padding: 10px 20px;
        border-radius: 50px;
        letter-spacing: 1px;
        margin-left: 10px;
    }
    .content .accountInfo form{
        width: 100%;
        height: 100%;
    }
    .content .accountInfo form .payment1{
        display: flex;
        align-items: center;
        width: 100%;
        height:130px;
    }
    .content .accountInfo form .payment1 label{
        font-size: 22px;
        letter-spacing: 1px;
        margin-left: 100px;
    }
    .content .accountInfo form .payment1 input{
        width: 70%;
        margin-left: 8px;
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 50px;
        background: #EEECEB;
    }
    .content .accountInfo form .payment2{
        display: flex;
        align-items: center;
        width: 100%;
        height:60px;
    }
    .content .accountInfo form .payment2 label{
        font-size: 22px;
        letter-spacing: 1px;
        margin-left: 100px;
    }
    .content .accountInfo form .payment2 input{
        width: 70%;
        margin-left: 8px;
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 50px;
        background: #EEECEB;
    }
    .content .accountInfo form .payment1 i, .payment2 i{
        margin-left: 10px;
        color: #BFBFBF;
        font-size: 35px;
        cursor: pointer;
    }
    .content .accountInfo form .paymentMethod{
        width: 100%;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .content .accountInfo form a{
        color: #BFBFBF;
        text-decoration: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .content .accountInfo form a i{
        font-size: 40px;
        font-weight: 300;
        margin-right: 10px;
    }
    ::-webkit-input-placeholder{
        font-size: 15px;
        color: black;
        letter-spacing: 1px;
        text-align: center;
    }
</style>
</html>