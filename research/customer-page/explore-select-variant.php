<?php

    include("connection.php");

    if(!isset($_SESSION['valid'])){
        header("Location:../login.php");
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = mysqli_query($conn, "SELECT * FROM adminproducts WHERE id = $id");

        $row = mysqli_fetch_assoc($query);
    }

    if(isset($_POST['proceed-checkout'])){
        header("Location: orders.html");
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
    <div class="explore-select-variant">
        <div class="explore-select-variant-header">
            <h1><a href="userpage.php">Home</a> <span>></span> <?= $row['product_name'] ?></h1>
        </div>

        <div class="explore-select-variant-content">
            <div class="explore-select-variant-content-left">
                <ul class="content-image-list">

                </ul>
                <div class="content-image">
                    <img src="<?= $row['product_image'] ?>" id="change" alt="">
                </div>
            </div>
            <div class="explore-select-variant-content-right">
                <div class="content-header-name">
                    <h1><?= $row['product_name'] ?></h1>
                </div>
                <form action="" method="post">
                    <div class="color">
                        <label for="select-color">Color</label>
                        <select  name="select-color" id="select-color">
                            <option value="white">White</option>
                            <option value="Red">Red</option>
                            <option value="black">black</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="size-quantity-text">
                        <div class="text">
                            <h1>Size/Quantity</h1>
                        </div>
                        <div class="size-quantity">
                            <div class="quantity-number">
                                <label for="small">S</label>
                                <input type="text" name="small" id="small" placeholder="0" maxlength="2">
                            </div>
                            <div class="quantity-number">
                                <label for="medium">Medium</label>
                                <input type="text" name="medium" id="medium" placeholder="0" maxlength="2">
                            </div>
                            <div class="quantity-number">
                                <label for="large">Large</label>
                                <input type="text" name="large" id="large" placeholder="0" maxlength="2">
                            </div>
                            <div class="quantity-number">
                                <label for="x-large">XL</label>
                                <input type="text" name="x-large" id="x-large" placeholder="0" maxlength="2">
                            </div>
                        </div>
                    </div>
                    <div class="proceed-checkout">
                        <button name="proceed-checkout">Proceed to check out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include("website-footer.php"); ?>

    <script>
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
<style>
    .explore-select-variant{
        width: 100%;
        height: calc(100vh - 65px);
    }
    .explore-select-variant .explore-select-variant-header{
        width: 100%;
        display: flex;
        align-items: center;
        height: 60px;
    }
    .explore-select-variant .explore-select-variant-header h1{
        margin-left: 30px;
        font-size: 25px;
        display: flex;
        align-items: center;
    }
    .explore-select-variant .explore-select-variant-header h1 a{
        color: #E16C69;
        text-decoration: none;
    }
    .explore-select-variant .explore-select-variant-header h1 span{
        font-size: 40px;
        font-weight: 400;
        margin: 0 10px;
    }
    .explore-select-variant .explore-select-variant-content{
        width: 100%;
        display: flex;
    }
    .explore-select-variant .explore-select-variant-content .explore-select-variant-content-left{
        width: 40%;
        display: flex;
    }
    .explore-select-variant .explore-select-variant-content .explore-select-variant-content-left .content-image-list{
        display: flex;
        list-style: none;
        flex-direction: column;
        width: 30%;
        align-items: center;
        gap: 10px;
    }
    .explore-select-variant .explore-select-variant-content .explore-select-variant-content-left .content-image-list li img{
       width: 60px;
    }
    .explore-select-variant .explore-select-variant-content .explore-select-variant-content-left .content-image{
        width: 70%;
        display: flex;
        justify-content: center;
    }
    .explore-select-variant .explore-select-variant-content .explore-select-variant-content-left .content-image img{
        width: 320px;
        height: 450px;
    }
    .explore-select-variant .explore-select-variant-content .explore-select-variant-content-right{
        width: 60%;
        height: 450px;
        position: relative;
    }
    .explore-select-variant .explore-select-variant-content .explore-select-variant-content-right .content-header-name{
        width: 100%;
        display: flex;
        align-items: center;
        height: 40px;
        font-size: 25px;
    }
    form{
        height: calc(100% - 60px);
    }
    form .color{
        width: 100%;
        display: flex;
        align-items: center;
        height: 70px;
        margin-top: 20px;
    }
    form .color label{
        font-size: 30px;
        width: 30%;
    }
    form .color select{
        width: 70%;
        padding: 5px;
        border-radius: 50px;
        border: 2px solid black;
        font-size: 20px;
        margin-right: 30px;
    }
    form .size-quantity-text{
        display: flex;
        width: 100%;
        height: 70px;
        display: flex;
        align-items: center;
    }
    form .size-quantity-text .text{
        width: 30%;
    }
    form .size-quantity-text .text h1{
        font-size: 30px;
        font-weight: 400;
    }
    form .size-quantity-text .size-quantity{
        width: 70%;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    form .size-quantity-text .size-quantity .quantity-number{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    form .size-quantity-text .size-quantity .quantity-number input{
        width: 35px;
        height: 23px;
        outline: none;
        text-align: center;
    }
    form .proceed-checkout{
        position: absolute;
        bottom: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
    form .proceed-checkout button{
        border:  none;
        padding: 7px;
        font-size: 23px;
        letter-spacing: 1px;
        border-radius: 50px;
        cursor: pointer;
        transition: all .3s;
        background: #e16c69;
        color: white;
        margin-right: 30px;
    }
    form .proceed-checkout button:hover{
       background: #ec7d79;
    }
</style>
</html>