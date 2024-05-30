<?php
    include("connection.php");
    $session_timeout = 10000;
    if(isset($_SESSION['valid'])){
        if(isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $session_timeout){
            
            $customer_id = $_SESSION['customer_id'];
            $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$customer_id'");
            $row = mysqli_fetch_assoc($query);
            $_SESSION['usernames'] = $row['username'];
            $usernames = $_SESSION['usernames'];
            $email = $row['email'];

            mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Logged out');");
            
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
    if(isset($_POST['logout'])){
        header("Location: ../login.php");
    }
 


$query = mysqli_query($conn, "SELECT * FROM adminproducts");

    if(isset($_POST['add-to-cart'])){
        
            $customer_id = $_SESSION['customer_id'];
            $hidden_image = $_POST['hidden_image'];
            $hidden_name = $_POST['hidden_name'];
            $hidden_color = $_POST['hidden_color'];
            $hidden_description = $_POST['hidden_description'];
            $hidden_price = $_POST['hidden_price'];
            $quantity = $_POST['quantity'];

            mysqli_query($conn, "INSERT INTO explore_add_to_cart(customer_id,product_image,product_name,product_color,product_description,product_price,product_quantity) VALUES('$customer_id','$hidden_image','$hidden_name','$hidden_color','$hidden_description','$hidden_price','$quantity') ");
            echo "<script> alert('Add to cart successfully'); </script>";
    }

    $query1 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 1");
    $row1 = mysqli_fetch_assoc($query1);
    $query2 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 2");
    $row2 = mysqli_fetch_assoc($query2);
    $query3 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 3");
    $row3 = mysqli_fetch_assoc($query3);
    $query4 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 4");
    $row4 = mysqli_fetch_assoc($query4);
    $query5 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 5");
    $row5 = mysqli_fetch_assoc($query5);
    $query6 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 6");
    $row6 = mysqli_fetch_assoc($query6);
    $query7 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 7");
    $row7 = mysqli_fetch_assoc($query7);
    $query8 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = 8");
    $row8 = mysqli_fetch_assoc($query8);
    $customer_id = $_SESSION['customer_id'];
    $notif = mysqli_query($conn, "SELECT * FROM customer_notification WHERE customer_id = '$customer_id'");

    if(isset($_POST['view'])){

        // $huhu = mysqli_query($conn, "SELECT * FROM `customer_notification` WHERE customer_id = '$customer_id'");
        // $direction = mysqli_fetch_assoc($huhu);
        mysqli_query($conn, "DELETE FROM `customer_notification` WHERE customer_id = '$customer_id'");

        // switch ($direction) {
        //     case 'processing':
                    header("Location: ../orders/orders-pay.php");
        //         break;
            
        //     case 'shipping':
        //             header("Location: ../orders/orders-ship.php");
        //         break;
        // }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/userpage.css">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Home | Print My Shirt</title>
</head>
<style>
    .header-right .icons .notification .notifs{
        justify-content: center;
    
    }
    .header-right .icons .notification .notifs .notificationss{
        width: 100%;
        margin: 10px 0;
    }
    .header-right .icons .notification .notifs .notificationss p{
        text-align:center;
    }
    .badge {
        position: absolute;
        top: -12px;
        left: -6px;
        background-color: red;
        color: white;
        border-radius: 50px;
        padding: 5px;
        font-size: 12px;
        width: 12px;
        height: 12px;
        display: flex;
        justify-content: center;
    }
</style>
<body>
                                                                <!-- HEADER -->

    <header id="header">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <ul class="header-nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact us</a></li>
        </ul>

        <div class="header-right">
            <div class="search-bar">
                <input type="text" id="searching" placeholder="Search products">
                <i class="fa-solid fa-magnifying-glass"></i>
              
              <div class="search">
               <!-- <a href="#"> 
                    <img src="images/tshirt.jpg" alt="">
                    <div class="contents">
                        <h4>T-shirt</h4>
                    </div>
                </a>
            -->
              </div>   
            </div>

            <div class="icons">
           
                <div class="notification">
                    <span class="badge"><?php echo mysqli_num_rows($notif); ?></span>
                        <label for="fa-notif-check" title="notification"><i class="fa-solid fa-bell" id="bell"></i></label>

                    
                                            <!-- Assuming you have an icon for notifications -->
                        <div class="notifs" id="notifs">
                            <div class="notificationss">
                                
                                <?php while($notif_row = mysqli_fetch_assoc($notif)){ ?>
                                    <form action="" method="post">
                                        <p><button name="view"><?= $notif_row['notifications'] ?></button></p>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                </div>

                <!-- <div class="shopping-cart">
                    <a href="../cart/shopping-cart.php" title="cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div> -->

                <div class="orders">
                    <a href="../orders/orders-pay.php" style="color: black;" title="orders"><i class="fa-solid fa-box"></i></a>
                </div>

                <div class="user">
                    <label for="fa-user-check"><i class="fa-solid fa-user" id="usericon"></i></label>

                    <div class="settings-helpSupport-logout" id="settings-helpSupport-logout">
                        <?php echo "<a href='userSettingsAccInfo.php'>Account Settings</a>" ?>
                        
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>

        </div>
    </header>

                                                                <!-- HOME -->

    <div class="banner" id="home">
        <div class="slide-container">
                <div class="slides">
                <img src="images/Welcome.png" alt="" class="active img"> 
                <img src="images/Customize.png" alt="" class="img">
                <img src="images/Advertise.png" alt="" class="img">
            </div>
            <div class="buttons">
                <span class="prev">&#10094;</span>
                <span class="next">&#10095;</span>
            </div>
            </div>
        </div>

        <div class="about" id="about">
            <div class="about-img">
                <img src="images/logo.png" alt="">
            </div>
            <div class="about-text">
                <h1>About us</h1>
                <p>Print My Shirt is a printing shop from the Philippines that prints customized souvenirs or items with your own design. We customize items like t-shirts, coffee mugs, keychains, and more. We provide good service and quality items to be used by our dear customers. </p>
            </div>
    </div>

                                                                <!-- PRODUCTS -->

    <div class="products" id="products">
        <div class="product-header">
            <i class="fa-solid fa-brush"></i>
            <h1>Make your own</h1>
            <p>Customize your own products</p>
        </div>

        <div class="product-items">
            <div class="item one">
                <a href="products.php?catalog_id=<?= $row1['catalog_id']; ?>&product=<?= $row1['catalog_name'] ?>"><img src="<?= $row1['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>T-Shirt</p>
            </div>
    
            <div class="item two">
                <a href="products.php?catalog_id2=<?= $row2['catalog_id']; ?>&product=<?= $row2['catalog_name'] ?>"><img src="<?= $row2['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>Mugs</p>
            </div>
    
            <div class="item three">
                <a href="products.php?catalog_id3=<?= $row3['catalog_id']; ?>&product=<?= $row3['catalog_name'] ?>"><img src="<?= $row3['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>Keyholder</p>
            </div>
    
            <div class="item four">
                <a href="products.php?catalog_id4=<?= $row4['catalog_id']; ?>&product=<?= $row4['catalog_name'] ?>"><img src="<?= $row4['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>Totebags</p>
            </div>
            <div class="item five">
                <a href="products.php?catalog_id5=<?= $row5['catalog_id']; ?>&product=<?= $row5['catalog_name'] ?>"><img src="<?= $row5['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>Coinpurse</p>
            </div>
    
            <div class="item six">
                <a href="products.php?catalog_id6=<?= $row6['catalog_id']; ?>&product=<?= $row6['catalog_name'] ?>"><img src="<?= $row6['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>Decal Sticker</p>
            </div>
    
            <div class="item seven">
                <a href="products.php?catalog_id7=<?= $row7['catalog_id']; ?>&product=<?= $row7['catalog_name'] ?>"><img src="<?= $row7['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>Tumbler</p>
            </div>
    
            <div class="item eight">
                <a href="products.php?catalog_id8=<?= $row8['catalog_id']; ?>&product=<?= $row8['catalog_name'] ?>"><img src="<?= $row8['catalog_image']; ?>" alt="" id="t-shirt"></a>
                <p>Fridge Magnet</p>
            </div>
        </div>
    </div>


                                                                <!-- SERVICES -->

          <div class="services" id="services">
            <div class="services-h1">
                <i class="fa-solid fa-question"></i>
                <h1>How our services works</h1>
            </div>
            <div class="services-steps">

                <div class="steps">
                    <img src="images/service-step1.png" alt="">
                    <div class="steps-content">
                        <h1>1</h1>
                        <h3>Choose a product</h3>
                        <p>Select our variety <br>of products</p>
                    </div>
                </div>

                <div class="steps">
                    <img src="images/service-step2.png" alt="">
                    <div class="steps-content">
                        <h1 class="line">2</h1>
                        <h3>Edit your design</h3>
                        <p>Create or upload design <br>
                            on your own</p>
                    </div>
                </div>

                <div class="steps">
                    <img src="images/service-step3.png" alt="">
                    <div class="steps-content">
                        <h1>3</h1>
                        <h3>Place your order</h3>
                        <p>We print and deliver <br>
                            your product</p>
                    </div>
                </div>

            </div>
       </div>

    <div class="chat">
        <a href="https://www.facebook.com/PrintmySHIRT11" id="messengerLink">
            <i class="fab fa-facebook-messenger"></i>
            <!-- <?php 
            
                // echo '<span class="badge2"></span>'; // Display badge if there's a new message
            
            ?> -->
        </a>
    </div>

    <style>
        .explore-product .card{
            transition: ease-in-out .4s;
            padding: 5px;
            background: white;
        }
        .explore-product .card:hover{
            transform: scale(1.05);
            box-shadow: 0 0 10px white;
        }
        .chat{
            position: relative;
        }
        .chat a{
            position: fixed;
            bottom: 2%;
            right: 2%;
            color: blue;
            font-size: 45px;
            text-decoration: none;
        }
        /* .badge2 {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50px;
            padding: 6px;
        } */
    </style>

                                                                <!-- CONTACT -->

      <?php include("website-footer.php"); ?>

    <script src="JS/userpagesss.js">   
    </script>
    <script src="JS/script.js"></script>

    <script>    
        let slideimages = document.querySelectorAll('.img');
        
        let prev = document.querySelector('.prev');
        let next = document.querySelector('.next');

        let dots = document.querySelectorAll('.dot');

        let counter = 0;

        next.addEventListener('click', slideNext);
            function slideNext(){
                slideimages[counter].style.animation = 'next1 0.5s ease-in-out forwards';
                if(counter >= slideimages.length-1){
                    counter = 0;
                }else{
                    counter++;
                }
                slideimages[counter].style.animation = 'next2 0.5s ease-in-out forwards';
                indicator()
            }

        prev.addEventListener('click', slidePrev);
            function slidePrev(){
                slideimages[counter].style.animation = 'prev1 0.5s ease-in-out forwards';
                if(counter == 0){
                    counter = slideimages.length-1;
                }else{
                    counter--;
                }
                slideimages[counter].style.animation = 'prev2 0.5s ease-in-out forwards';
                indicator()
            }
        

        function autoSlide(){
            deletInterval = setInterval(timer, 3000);
            function timer(){
                slideNext();
                indicator();
            }
        }
        autoSlide();

        const slide_container = document.querySelector(".slide-container");

        slide_container.addEventListener("mouseover", function(){
            clearInterval(deletInterval);
        });

        slide_container.addEventListener("mouseout", autoSlide);

        function indicator(){
            for(i = 0; i< dots.length; i++){
                dots[i].className = dots[i].className.replace(' active', '');
            }
            dots[counter].className += ' active';
        }

        function switchimage(currentimage){
            currentimage.classList.add('active');
            let imageid = currentimage.getAttribute('attr');
            if(imageid > counter){
                slideimages[counter].style.animation = 'next1 0.5s ease-in-out forwards';
                counter = imageid;
                slideimages[counter].style.animation = 'next2 0.5s ease-in-out forwards';
            }
            else if(imageid == counter){
                return;
            }else{
                slideimages[counter].style.animation = 'prev1 0.5s ease-in-out forwards';
                counter = imageid;
                slideimages[counter].style.animation = 'prev2 0.5s ease-in-out forwards';
            }
            indicator();
        }
    </script>
    <script>
            //  function preventBack(){
            //         window.history.forward();
        
            //     }
            //     setTimeout("preventBack()", 0);
        
            //     window.onunload = function () { null };
        
    </script>  
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
     
</style>
</html>