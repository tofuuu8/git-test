<?php
    include("connection.php");
    $query = mysqli_query($conn, "SELECT * FROM adminproducts");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/homepage.css">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Print My Shirt</title>
</head>
<style>

</style>
<body>
                                                                        <!-- HEADER  -->
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
         <input type="checkbox" name="check" id="check">
         
        
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
            <div class="login-register">
                <a href="../login.php" id="login">Login</a>
                <span></span>
                <a href="../register.php" id="register">Register</a>
            </div>
        </div>
    </header>

                                                                    <!-- HOME  -->

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
    
                                                                    <!-- PRODUCTS  -->


    <div class="products" id="products">

        <div class="product-h1">
            <i class="fa-solid fa-brush"></i>
            <h1>Make your own</h1>
            <p>Customize your own products</p>
        </div>
        <div class="items">
            <div class="item one">
                <img src="images/tshirt.jpg" alt="" id="t-shirt">
                <p>T-Shirt</p>
            </div>
    
            <div class="item two">
                <img src="images/mugs.jpg" alt="" id="mugs">
                <p>Mugs</p>
            </div>
    
            <div class="item three">
                <img src="images/keyholder.jpg" alt="" id="keyholder">
                <p>Keyholder</p>
            </div>
    
            <div class="item four">
                <img src="images/totebag.jpg" alt="" id="totebag">
                <p>Totebags</p>
            </div>
    
            <div class="item five">
                <img src="images/coinpurse.jpg " alt="" id="coinpurse">
                <p>Coinpurse</p>
            </div>
    
            <div class="item six">
                <img src="images/decalsticker.jpg" alt="" id="decalsticker">
                <p>Decal Sticker</p>
            </div>
    
            <div class="item seven">
                <img src="images/tumbler.jpg" alt="" id="tumbler">
                <p>Tumbler</p>
            </div>  
            
            <div class="item eight">
                <img src="images/fridgemagnet.jpg" alt="" id="fridgemagnet">
                <p>Fridge Magnet</p>
            </div>  
        </div>

    </div>

    <div class="background-item" id="itemOne">
     <a href="#itemOne" id="exitOne">
      <p><i class="fa-solid fa-xmark"></i></p>
     </a>
     <div class="all-items">
        <img src="images/tshirt.jpg" alt="">
        <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        
     </div>
    </div>  

    <div class="background-item" id="itemTwo">
        <div id="exitTwo">
         <p><i class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="all-items">
          
           <img src="images/mugs.jpg" alt="">
           <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        </div>
       </div>  

       <div class="background-item" id="itemThree">
        <div id="exitThree">
         <p><i class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="all-items">
          
           <img src="images/keyholder.jpg" alt="">
           <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        </div>
       </div>  

       <div class="background-item" id="itemFour">
        <div id="exitFour">
         <p><i class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="all-items">
          
           <img src="images/totebag.jpg" alt="">
           <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        </div>
       </div>  

       <div class="background-item" id="itemFive">
        <div id="exitFive">
         <p><i class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="all-items">
          
           <img src="images/coinpurse.jpg" alt="">
           <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        </div>
       </div>  

       <div class="background-item" id="itemSix">
        <div id="exitSix">
         <p><i class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="all-items">
          
           <img src="images/decalsticker.jpg" alt="">
           <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        </div>
       </div>  

       <div class="background-item" id="itemSeven">
        <div id="exitSeven">
         <p><i class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="all-items">
          
           <img src="images/tumbler.jpg" alt="">
           <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        </div>
       </div>  

       <div class="background-item" id="itemEight">
        <div id="exitEight">
         <p><i class="fa-solid fa-xmark"></i></p>
        </div>
        <div class="all-items">
          
           <img src="images/fridgemagnet.jpg" alt="">
           <div class="all-items-text">
            <p>Log in or Register to customize for your own design</p>
            <div class="all-items-link">
            <a href="../login.php">Log In</a>
            <p>or</p>
            <a href="../register.php">Sign Up</a>
            </div>
            
        </div>
        </div>
       </div>  


                                                                    <!-- SERVICES  -->

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


                                                                    <!-- CONTACT -->

          <?php include("website-footer.php"); ?>

       <!-- <a href="" class="chat-support">
        <i class="fa-solid fa-headset"></i>
        <h1>Chat</h1>
       </a> -->
       <div class="chat">
       <a href="https://www.facebook.com/PrintmySHIRT11"> <i class="fa-brands fa-facebook-messenger"></i></a>
    </div>
       
   
   <script src="JS/scripts.js"></script>
   <script src="JS/homepages.js"></script>

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
</body>
<style>
    .chat-support{
        position: fixed;
        right: 2%;
        bottom: 3%;
        display: flex;
        align-items: center;
        text-decoration: none;
        color: white;
        font-size: 12px;
        background: black;
        padding: 10px 20px;
        border-radius: 50px;
    }
    .chat-support i{
        font-size: 30px;
        color: #D15856;
        margin-right: 5px;
    }
    .chat a{
        position: fixed;
        bottom: 2%;
        right: 2%;
        color: blue;
        font-size: 45px;
        text-decoration: none;
    }
</style>
</html>