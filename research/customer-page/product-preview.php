<?php
    include("connection.php");
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Preview | Print My Shirt</title>
</head>
<body>
    <?php include("website-header.php"); ?>
    <?php if(isset($_GET['catalog_id']) == 1){ ?>
        <?php 
            if(isset($_GET['catalog_id'])){
                $catalog_id = $_GET['catalog_id'];
                if(!empty($_GET['front-area'])){
                    $front_area = $_GET['front-area'];
                }
                if(!empty($_GET['back-area'])){
                    $back_area = $_GET['back-area'];
                    $color = $_GET['color'];
                    switch($back_area){
                        case 'Full Back':
                            switch($color){
                                case 'Black':
                                    $behindImageback = "images/back-black.png";
                                break;
                                case 'White':
                                    $behindImageback = "images/back-white.png";
                                break;
                                case 'Blue':
                                    $behindImageback = "images/back-blue.png";
                                break;
                                case 'Red':
                                    $behindImageback = "images/back-red.png";
                                break;
                            }
                        break;
                        case 'Medium Back':
                            switch($color){
                                case 'Black':
                                    $behindImageback = "images/back-black.png";
                                break;
                                case 'White':
                                    $behindImageback = "images/back-white.png";
                                break;
                                case 'Blue':
                                    $behindImageback = "images/back-blue.png";
                                break;
                                case 'Red':
                                    $behindImageback = "images/back-red.png";
                                break;
                            }
                        break;
                        case 'Across Back':
                            switch($color){
                                case 'Black':
                                    $behindImageback = "images/back-black.png";
                                break;
                                case 'White':
                                    $behindImageback = "images/back-white.png";
                                break;
                                case 'Blue':
                                    $behindImageback = "images/back-blue.png";
                                break;
                                case 'Red':
                                    $behindImageback = "images/back-red.png";
                                break;
                            }
                        break;
                        case 'Back Patch':
                            switch($color){
                                case 'Black':
                                    $behindImageback = "images/back-black.png";
                                break;
                                case 'White':
                                    $behindImageback = "images/back-white.png";
                                break;
                                case 'Blue':
                                    $behindImageback = "images/back-blue.png";
                                break;
                                case 'Red':
                                    $behindImageback = "images/back-red.png";
                                break;
                            }
                        break;
                    }
                }

                if(!empty($_GET['customer-image'])){
                    $customer_image = $_GET['customer-image'];
                }
                if(!empty($_GET['customer-images'])){
                    $customer_images = $_GET['customer-images'];
                }
                $product1 = mysqli_query($conn, "SELECT * FROM product1 WHERE catalog_id = '$catalog_id'");
                while($row1 = mysqli_fetch_assoc($product1)){
                    $image = $row1['catalog_image'];
                    $name = $row1['catalog_name'];
                    $color = $row1['product_color'];
                    $type = $row1['product_type'];
                    $collar = $row1['product_collar'];
                    $color = $_GET['color'];
                    switch($collar){
                        case 'Crew-neck':
                            switch($color){
                                case 'Black':
                                    $behindImagefront = "images/tshirt-front-crewneckblack.png";
                                break;
                                case 'White':
                                    $behindImagefront = "images/tshirt-front-crewneckwhite.png";
                                break;
                                case 'Blue':
                                    $behindImagefront = "images/tshirt-front-crewneckblue.png";
                                break;
                                case 'Red':
                                    $behindImagefront = "images/tshirt-front-crewneckred.png";
                                break;
                            }
                        break;
                        case 'V-neck':
                            switch($color){
                                case 'Black':
                                    $behindImagefront = "images/tshirt-front-vneckblack.png";
                                break;
                                case 'White':
                                    $behindImagefront = "images/tshirt-front-vneckwhite.png";
                                break;
                                case 'Blue':
                                    $behindImagefront = "images/tshirt-front-vneckblue.png";
                                break;
                                case 'Red':
                                    $behindImagefront = "images/tshirt-front-vneckred.png";
                                break;
                            }
                        break;
                    }
                    $collar = $_GET['collar'];
                    $front_area = $row1['product_print_area_front'];
                    $back_area = $row1['product_print_area_back'];
                    $small = $row1['small'];
                    $medium = $row1['medium'];
                    $large = $row1['large'];
                    $xlarge = $row1['xlarge'];
                    $row_image = $row1['customer_image'];
                    $customer_image = basename($row_image);
                }
                if(isset($_POST['proceed'])){
                    
                    if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){
                        header("Location: checkout.php?catalog_id=$catalog_id&color=$color&collar=$collar&front-area=$front_area&$back_area&customer-image=$customer_image&customer-images=$customer_images");
                    }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){
                        header("Location: checkout.php?catalog_id=$catalog_id&color=$color&collar=$collar&front-area=$front_area&customer-image=$customer_image");
                    }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){
                        header("Location: checkout.php?catalog_id=$catalog_id&color=$color&collar=$collar&back-area=$back_area&customer-images=$customer_images");
                    }
                }

            }    
        ?>
        <form action="" method="post">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                    <?php if(!empty($_GET['front-area'])){?>
                            <?php if($collar == "Crew-neck"){ ?>
                                <div class="front-card">
                                    <img src="<?= $behindImagefront ?>" alt="">
                                        <?php 
                                            echo '<img src="../customer-image/'.$customer_image.'" id="layerImage" style="';
                                                switch ($front_area) {
                                                    case 'Full Front':
                                                            echo "width: 165px; height: 165px; top: 47%; left: 50%; transform: translate(-50%,-53%);";
                                                        break;
                                                    case 'Medium Front':
                                                            echo "width: 130px; height: 130px; top: 43%; left: 50%; transform: translate(-50%,-57%);";
                                                        break;
                                                    case 'Center Chest':
                                                            echo "width: 50px; height: 60px; top: 33%; left: 50%; transform: translate(-50%,-67%);";
                                                        break;                
                                                    case 'Across Chest':
                                                            echo "width: 165px; height: 40px; top: 32%; left: 50%; transform: translate(-50%,-68%);";
                                                        break;
                                                    case 'Right Chest':
                                                            echo "width: 50px; height: 50px; top: 35%; left: 38%; transform: translate(-62%,-65%);";    
                                                        break;
                                                    case 'Left Chest':
                                                            echo "width: 50px; height: 50px; top: 35%; left: 62%; transform: translate(-38%,-65%);";   
                                                        break;
                                                    case 'Right Vertical':
                                                            echo "width: 40px; height: 220px; top: 50%; left: 34%; transform: translate(-66%,-50%);";
                                                        break;                
                                                    case 'Left Vertical':
                                                            echo "width: 40px; height: 220px; top: 50%; left: 66%; transform: translate(-34%,-50%);";   
                                                        break;
                                                    case 'Left Bottom':
                                                            echo "width: 70px; height: 50px; top: 68%; left: 62%; transform: translate(-38%,-32%);";  
                                                        break;                
                                                    case 'Right Bottom':
                                                            echo "width: 70px; height: 50px; top: 68%; left: 38%; transform: translate(-62%,-32%);";      
                                                        break;    
                                                }
                                            echo'">';
                                       ?>
                                    <div class="front-card-text">
                                        <h1><?= $front_area ?></h1>
                                    </div>
                                </div>
                            <?php }else if($collar == "V-neck"){ ?>
                                <div class="front-card">
                                    <img src="<?= $behindImagefront ?>" alt="">
                                        <?php 
                                            echo '<img src="../customer-image/'.$customer_image.'" id="layerImage" style="';
                                                switch ($front_area) {
                                                    case 'Full Front':
                                                            echo "width: 165px; height: 165px; top: 49%; left: 50%; transform: translate(-50%,-51%);";
                                                        break;
                                                    case 'Medium Front':
                                                            echo "width: 130px; height: 130px; top: 48%; left: 50%; transform: translate(-50%,-52%);";
                                                        break;
                                                    case 'Center Chest':
                                                            echo "width: 50px; height: 60px; top: 37%; left: 50%; transform: translate(-50%,-63%);";
                                                        break;                
                                                    case 'Across Chest':
                                                            echo "width: 165px; height: 40px; top: 36%; left: 50%; transform: translate(-50%,-64%);";
                                                        break;
                                                    case 'Right Chest':
                                                            echo "width: 50px; height: 50px; top: 37%; left: 38%; transform: translate(-62%,-63%);";    
                                                        break;
                                                    case 'Left Chest':
                                                            echo "width: 50px; height: 50px; top: 37%; left: 62%; transform: translate(-38%,-63%);";   
                                                        break;
                                                    case 'Right Vertical':
                                                            echo "width: 40px; height: 205px; top: 52%; left: 34%; transform: translate(-66%,-48%);";
                                                        break;                
                                                    case 'Left Vertical':
                                                            echo "width: 40px; height: 205px; top: 52%; left: 66%; transform: translate(-34%,-48%);";   
                                                        break;
                                                    case 'Left Bottom':
                                                            echo "width: 70px; height: 50px; top: 68%; left: 62%; transform: translate(-38%,-32%);";  
                                                        break;                
                                                    case 'Right Bottom':
                                                            echo "width: 70px; height: 50px; top: 68%; left: 38%; transform: translate(-62%,-32%);";      
                                                        break;    
                                                }
                                            echo'">';
                                       ?>
                                    <div class="front-card-text">
                                        <h1><?= $front_area ?></h1>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                        <?php if(!empty($_GET['back-area'])){?>
                            <div class="front-card">
                                <img src="<?= $behindImageback ?>" alt="">
                                <?php  
                                    echo '<img src="../customer-image/'.$customer_images.'" id="layerImage" style="';
                                        switch ($_GET['back-area']) {
                                            case 'Full Back':
                                                echo "width: 170px; height: 170px; top: 44%; left: 50%; transform: translate(-50%,-56%);";
                                            break;
                                            case 'Medium Back':
                                                echo "width: 130px; height: 130px; top: 36%; left: 50%; transform: translate(-50%,-64%);";
                                            break;
                                            case 'Across Back':
                                                echo "width: 165px; height: 40px; top: 25%; left: 50%; transform: translate(-50%,-75%);";
                                            break;
                                            case 'Back Patch':
                                                echo "width: 50px; height: 60px; top: 26%; left: 50%; transform: translate(-50%,-74%);";
                                            break; 
                                        }
                                    echo '">';
                                ?>
                                <div class="front-card-text">
                                    <h1><?= $_GET['back-area'] ?></h1>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Color - <span><?= $color ?></span></p>
                                <p>Type - <span><?= $type ?></span></p>
                                <p>Collar - <span><?= $collar ?></span></p>
                                <?php if(!empty($_GET['front-area'])){ ?>
                                    <p>Print Area - <span><?= $front_area ?></span></p>
                                <?php } ?>   
                                <?php if(!empty($_GET['back-area'])){ ?>
                                    <p>Print Area - <span><?= $_GET['back-area'] ?></span></p>
                                <?php } ?>    
                                <?php if(!empty($_GET['customer-image'])){?>
                                    <p>Upload image front - <span><?= $customer_image ?></span></p>
                                <?php } ?>
                                <?php if(!empty($_GET['customer-images'])){?>
                                    <p>Upload image back - <span><?= $customer_images ?></span></p>
                                <?php } ?>
                            </div>
                            <div class="product-details-right">
                                <table width="100%" height="100%">
                                    <tr>
                                        <th colspan="100%"><h1>Quantity</h1></th>
                                    </tr>
                                    <tr>
                                        <?php if(!empty($small)){echo "<th>Small</th>";}?>
                                        <?php if(!empty($medium)){echo "<th>Medium</th>";}?>
                                        <?php if(!empty($large)){echo "<th>Large</th>";}?>
                                        <?php if(!empty($xlarge)){echo "<th>Extra Large</th>";}?>
                                    </tr>
                                    <tr>
                                        <?php if(!empty($small)){echo "<th>". $small ."</th>";}?>
                                        <?php if(!empty($medium)){echo "<th>". $medium ."</th>";}?>
                                        <?php if(!empty($large)){echo "<th>". $large ."</th>";}?>
                                        <?php if(!empty($xlarge)){echo "<th>". $xlarge ."</th>";}?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }elseif(isset($_GET['catalog_id2']) == 2){?>
        <?php 
            if(isset($_GET['catalog_id2'])){
                $catalog_id2 = $_GET['catalog_id2'];
                $print_area2 = $_GET['print_area2'];
                $customer_image2 = $_GET['customer-image2'];
                $product2 = mysqli_query($conn, "SELECT * FROM product2 WHERE catalog_id = '$catalog_id2'");
                while($row2 = mysqli_fetch_assoc($product2)){
                    $image2 = $row2['catalog_image'];
                    $name2 = $row2['catalog_name'];
                    $type2 = $row2['product_type'];
                    $type2 = $_GET['type2'];
                    switch ($type2) {
                        case 'Classic-mug':
                                $behindImage2 = "images/classic-mug-1.png";
                            break;
                        case 'Magic-mug':
                                $behindImage2 = "images/magic-mug-1.png";
                            break;
                    }
                    $print_area2 = $row2['product_print_area'];
                    $row_image2 = $row2['product_upload_image'];
                    $product_quantity2 = $row2['product_quantity'];
                    $customer_image2 = basename($row_image2);

                    if(isset($_POST['proceed2'])){
                        header("Location: checkout.php?&catalog_id2=$catalog_id2&print_area2=$print_area2&type2=$type2&customer_image2=$customer_image2");
                    }
                }
            }    
        ?>
        <form action="" method="post">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name2 ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                        <div class="front-card">
                            <?php if($print_area2 == "Single"){?>
                                <img src="<?= $behindImage2 ?>" alt="">
                                <?php 
                                    echo '<img src="../customer-image/'.$customer_image2.'" alt="" id="layerImage2" style="'; 
                                    if($type2 == "Classic-mug"){
                                        switch ($print_area2) {
                                            case 'Single':
                                                    echo "width: 190px; height: 220px; top: 46%; left: 42%; transform: translate(-58%,-54%);";
                                                break;
                                        }
                                    }else if($type2 == "Magic-mug"){
                                        switch ($print_area2) {
                                            case 'Single':
                                                    echo "width: 190px; height: 220px; top: 49%; left: 42%; transform: translate(-58%,-51%);";
                                                break;
                                        }
                                    }
                                echo'">';
                                ?>
                            <?php }else if($print_area2 == "Wrapped"){?>
                                <img src="../customer-image/<?= $customer_image2 ?>" alt="">
                            <?php }?>
                            <div class="front-card-text">
                                <h1><?= $print_area2 ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name2?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Type - <span><?= $type2 ?></span></p>
                                <p>Print Area - <span><?= $print_area2 ?></span></p>
                                <p>Upload image - <span><?= $customer_image2 ?></span></p>
                                <p>Quantity - <span><?= $product_quantity2 ?></span></p>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed2">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }elseif(isset($_GET['catalog_id3']) == 3){?>
        <?php 
            if(isset($_GET['catalog_id3'])){
                $catalog_id3 = $_GET['catalog_id3'];
                $customer_image3 = $_GET['customer-image3'];
                $product3 = mysqli_query($conn, "SELECT * FROM product3 WHERE catalog_id = '$catalog_id3'");
                while($row3 = mysqli_fetch_assoc($product3)){
                    $image3 = $row3['catalog_image'];
                    $name3 = $row3['catalog_name'];
                    $row_image3 = $row3['product_upload_image'];
                    $product_quantity3 = $row3['product_quantity'];
                    $customer_image3 = basename($row_image3);
                }

                if(isset($_POST['proceed3'])){
                    header("Location: checkout.php?catalog_id3=$catalog_id3&customer_image3=$customer_image3");
                }
            }    
        ?>
        <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="hidden_customer_id3" value="<?= $row3['customer_id'] ?>">
                <input type="hidden" name="hidden_catalog_id3" value="<?= $row3['catalog_id'] ?>">
                <input type="hidden" name="hidden_catalog_name3" value="<?= $row3['catalog_name'] ?>">
                <input type="hidden" name="hidden_catalog_image3" value="<?= $row3['catalog_image'] ?>">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name3 ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                        <div class="front-card">
                            <img src="../customer-image/<?= $customer_image3 ?>" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name3?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Upload image - <span><?= $customer_image3 ?></span></p>
                                <p>Quantity - <span><?= $product_quantity3 ?></span></p>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed3">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }elseif(isset($_GET['catalog_id4']) == 4){?>
        <?php 
            if(isset($_GET['catalog_id4'])){
                $customer_id4 = $_GET['customer_id4'];
                $catalog_id4 = $_GET['catalog_id4'];
                $print_area4 = $_GET['print-area4'];
                $customer_image4 = $_GET['customer-image4'];
                $product4 = mysqli_query($conn, "SELECT * FROM product4 WHERE catalog_id = '$catalog_id4'");
                while($row4 = mysqli_fetch_assoc($product4)){
                    $image4 = $row4['catalog_image'];
                    $name4 = $row4['catalog_name'];
                    $product_quantity4 = $row4['product_quantity'];
                    $print_area4 = $row4['product_print_area'];
                    $row_image4 = $row4['product_upload_image'];
                    $customer_image4 = basename($row_image4);  
                }
                if(isset($_POST['proceed4'])){
                    header("Location: checkout.php?customer_id4=$customer_id4&catalog_id4=$catalog_id4&print-area4=$print_area4&customer_image4=$customer_image4");
                }
            }    
        ?>
        <form action="" method="post">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name4 ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                        <div class="front-card">
                            <img src="images/totebag.png" alt="">
                            <?php
                                echo '<img src="../customer-image/'.$customer_image4.'" alt="" id="layerImage4" style="'; 
                                    switch ($print_area4) {
                                        case 'Full':
                                                echo "width: 190px; height: 200px; top: 55%; left: 50.9%; transform: translate(-49.1%,-45%);";
                                            break;
                                        case 'Banner':
                                                echo "width: 190px; height: 140px; top: 55%; left: 50.9%; transform: translate(-49.1%,-45%);";
                                            break;
                                        case 'Portrait':
                                                echo "width: 140px; height: 190px; top: 55%; left: 50.9%; transform: translate(-49.1%,-45%);";
                                            break;                
                                        case 'Medium':
                                                echo "width: 130px; height: 130px; top: 55%; left: 50.9%; transform: translate(-49.1%,-45%);";    
                                            break;
                                    }
                                echo'">';
                            ?>
                                <div class="front-card-text">
                                <h1><?= $name4 ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name4?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Print Area - <span><?= $print_area4 ?></span></p>
                                <p>Upload image - <span><?= $customer_image4 ?></span></p>
                                <p>Quantity - <span><?= $product_quantity4 ?></span></p>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed4">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }elseif(isset($_GET['catalog_id5']) == 5){?>
        <?php 
            if(isset($_GET['catalog_id5'])){
                $catalog_id5 = $_GET['catalog_id5'];
                $customer_image5 = $_GET['customer-image5'];
                $product5 = mysqli_query($conn, "SELECT * FROM product5 WHERE catalog_id = '$catalog_id5'");
                while($row5 = mysqli_fetch_assoc($product5)){
                    $image5 = $row5['catalog_image'];
                    $name5 = $row5['catalog_name'];
                    $row_image5 = $row5['product_upload_image'];
                    $product_quantity5 = $row5['product_quantity'];
                    $customer_image5 = basename($row_image5);
                }
                if(isset($_POST['proceed5'])){
                    header("Location: checkout.php?catalog_id5=$catalog_id5&customer_image5=$customer_image5");
                }
            }    
        ?>
         <form action="" method="post">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name5 ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                        <div class="front-card">
                            <img src="images/coinpurse.png" alt="">
                            <img src="../customer-image/<?= $customer_image5 ?>" alt="" id="layerImage5">
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name5?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Upload image - <span><?= $customer_image5 ?></span></p>
                                <p>Quantity - <span><?= $product_quantity5 ?></span></p>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed5">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }elseif(isset($_GET['catalog_id6']) == 6){?>
        <?php 
            if(isset($_GET['catalog_id6'])){
                $catalog_id6 = $_GET['catalog_id6'];
                $customer_image6 = $_GET['customer-image6'];
                $product6 = mysqli_query($conn, "SELECT * FROM product6 WHERE catalog_id = '$catalog_id6'");
                while($row6 = mysqli_fetch_assoc($product6)){
                    $image6 = $row6['catalog_image'];
                    $name6 = $row6['catalog_name'];
                    $row_image6 = $row6['product_upload_image'];
                    $product_quantity6 = $row6['product_quantity'];
                    $customer_image6 = basename($row_image6);
                }
                if(isset($_POST['proceed6'])){
                    header("Location: checkout.php?catalog_id6=$catalog_id6&customer_image6=$customer_image6");
                }
            }    
        ?>
         <form action="" method="post">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name6 ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                        <div class="front-card">
                            <img src="../customer-image/<?= $customer_image6 ?>" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name6?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Upload image - <span><?= $customer_image6 ?></span></p>
                                <p>Quantity - <span><?= $product_quantity6 ?></span></p>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed6">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }elseif(isset($_GET['catalog_id7']) == 7){?>
        <?php 
            if(isset($_GET['catalog_id7'])){
                $catalog_id7 = $_GET['catalog_id7'];
                $print_area7 = $_GET['print-area7'];
                $customer_image7 = $_GET['customer-image7'];
                $product7 = mysqli_query($conn, "SELECT * FROM product7 WHERE catalog_id = '$catalog_id7'");
                while($row7 = mysqli_fetch_assoc($product7)){
                    $image7 = $row7['catalog_image'];
                    $name7 = $row7['catalog_name'];
                    $color7 = $row7['product_color'];
                    $color7 = $_GET['color'];
                    switch ($color7) {
                        case 'Black':
                            $behindImage = "images/tumbler-black.png";
                            break;
                        case 'Red':
                            $behindImage = "images/tumbler-red.png";
                            break;
                        case 'Blue':
                            $behindImage = "images/tumbler-blue.png";
                            break;            
                        case 'White':
                            $behindImage = "images/tumbler-white.png";
                            break;
                    }
                    $product_quantity7 = $row7['product_quantity'];
                    $print_area7 = $row7['product_print_area'];
                    $row_image7 = $row7['product_upload_image'];
                    $customer_image7 = basename($row_image7);
                }
                if(isset($_POST['proceed7'])){
                    header("Location: checkout.php?catalog_id7=$catalog_id7&color=$color7&print-area7=$print_area7&customer-image7=$customer_image7");
                }
            }    
        ?>
        <form action="" method="post">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name7 ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                        <div class="front-card">
                            <img src="<?= $behindImage ?>" alt="">
                            <?php 
                                echo '<img src="../customer-image/'.$customer_image7.'" alt="" id="layerImage7" style="'; 
                                    switch ($print_area7) {
                                        case 'Full':
                                                echo "width: 80px; height: 240px; top: 50%; left: 50%; transform: translate(-50%,-50%);";
                                            break;
                                        case 'Medium':
                                                echo "width: 52px; height: 170px; top: 52%; left: 50%; transform: translate(-50%,-48%);";
                                            break;
                                        case 'Icon':
                                                echo "width: 50px; height: 60px; top: 38%; left: 50%; transform: translate(-50%,-62%);";
                                            break;                
                                        case 'Bottom':
                                                echo "width: 85px; height: 50px; top: 68%; left: 50%; transform: translate(-50%,-32%);";
                                            break;
                                    }
                                echo'">';
                            ?>    
                            
                            <div class="front-card-text">
                                <h1><?= $print_area7 ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name7?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Color - <span><?= $color7 ?></span></p>
                                <p>Print Area - <span><?= $print_area7 ?></span></p>
                                <p>Upload image - <span><?= $customer_image7 ?></span></p>
                                <p>Quantity - <span><?= $product_quantity7 ?></span></p>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed7">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }elseif(isset($_GET['catalog_id8']) == 8){?>
        <?php 
            if(isset($_GET['catalog_id8'])){
                $catalog_id8 = $_GET['catalog_id8'];
                $customer_image8 = $_GET['customer-image8'];
                $product8 = mysqli_query($conn, "SELECT * FROM product8 WHERE catalog_id = '$catalog_id8'");
                while($row8 = mysqli_fetch_assoc($product8)){
                    $image8 = $row8['catalog_image'];
                    $name8 = $row8['catalog_name'];
                    $row_image8 = $row8['product_upload_image'];
                    $product_quantity8 = $row8['product_quantity'];
                    $customer_image8 = basename($row_image8);
                }
                if(isset($_POST['proceed8'])){
                    header("Location: checkout.php?catalog_id8=$catalog_id8&customer_image8=$customer_image8");
                }
            }    
        ?>
         <form action="" method="post">
            <section>
                <div class="content-header">
                    <h1><a href="userpage.php">Home</a> <span>></span> <a href="javascript:self.history.back()"><?= $name8 ?></a> <span>></span> Preview</h1>
                </div>
                <div class="content">
                    <div class="left">
                        <div class="front-card">
                            <img src="../customer-image/<?= $customer_image8 ?>" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="right-header">
                            <h1>Preview of Customized <?= $name8?></h1>
                        </div>
                        <div class="product-details">
                            <div class="product-details-left">
                                <h1>Product Details</h1>
                                <p>Upload image - <span><?= $customer_image8 ?></span></p>
                                <p>Quantity - <span><?= $product_quantity8 ?></span></p>
                            </div>
                        </div>
                        <div class="confirmation">
                            <h1>Confirmation of Order</h1>
                            <div class="confirmation-of-order">
                                <div class="confirmation-of-order-left">
                                    <input type="checkbox" name="check" id="check" onclick="enable()">
                                </div>
                                <div class="confirmation-of-order-right">
                                    <p>I confirmed that the spelling and content are correct. I am satisfied with the file layout and accept full responsibility for typographical errors. I'm also aware that once my order has been accepted, I cannot change or edit my files. I also understand that after my order is printed, I cannot make any changes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn">
                            <button disabled="true" id="proceed" name="proceed8">Proceed to checkout</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <?php }?>
    <script>
        function enable() {
            let check = document.getElementById("check");
            let proceed = document.getElementById("proceed");

            if(check.checked){
                proceed.removeAttribute("disabled");
            }else{
                proceed.disabled = "true";
            }
        }
    </script>
</body>
<style>
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1px;
    }
    .content-header{
        width: 100%;
        padding-left: 3%;
        height: 60px;
        display: flex;
    }
    .content-header h1{
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .content-header h1 a{
        text-decoration: none;
        color: #E16C69;
    }
    .content-header h1 span{
        font-size: 35px;
        font-weight: 400;
    }
    .content{
        width: 100%;
        height: 100%;
        display: flex;
    }
    .content .left{
        height: 100%;
        width: 30%;
        padding: 0 10px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .content .left .front-card{
        width: 100%;
        height: auto;
        background: #C84542;
        padding: 10px;
        position: relative;
    }
    .content .left .front-card #layerImage{
        position: absolute;
    }
    .content .left .front-card #layerImage2{
        position: absolute;
    }
    .content .left .front-card #layerImage4{
        position: absolute;
        /* left: 50.9%;
        top: 55%;
        transform: translate(-49.1%,-45%);
        width: 190px;
        height: 200px; */
    }
    .content .left .front-card #layerImage5{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        width: 220px;
        height: 140px;
    }
    .content .left .front-card #layerImage7{
        position: absolute;
    }
    .content .left .front-card img{
        width: 100%;
    }
    .content .left .front-card .front-card-text h1{
        text-align: center;
        font-size: 35px;
        color: white;
    }
    .content .right{
        height: 100%;
        width: 70%;
        padding: 0 2%;
    }
    .content .right .right-header{
        width: 100%;
        font-size: 25px;
        display: flex;
        align-items: center;
        height: 45px;
    }
    .content .right .product-details{
        width: 100%;
        height: auto;
        background: #D0D2D3;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        margin-bottom:15px;
    }
    .content .right .product-details .product-details-left{
        width: 40%;
    }
    .content .right .product-details .product-details-left h1{
        font-size: 27px;
        margin-bottom: 5px;
    }
    .content .right .product-details .product-details-left p{
        font-size: 20px;
        margin: 2px 0;
    }
    .content .right .product-details .product-details-right{
        width: 60%;
    }
    .content .right .product-details .product-details-right table,tr,th{
        border: 1px solid black;
    } 
    .content .right .product-details .product-details-right th{
        font-size: 20px;
    }   
    .content .right .confirmation{
        width: 100%;
        height: auto;
        background: #D0D2D3;
        border-radius: 10px;
        padding: 15px 20px 20px 20px;
    }
    .content .right .confirmation h1{
        font-size: 27px;
    }
    .content .right .confirmation-of-order{
        width: 100%;
        height: 100%;
        display: flex;
    }
    .content .right .confirmation-of-order .confirmation-of-order-left{
        width: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .content .right .confirmation-of-order .confirmation-of-order-left input{
        width: 30px;
        height: 30px;
        cursor: pointer;
    }
    #check:checked{
        accent-color: green; 
        box-shadow: 0 0 4px green, 0 0 8px green, 0 0 12px green;
    } 
    .content .right .confirmation-of-order .confirmation-of-order-right{
        width: 80%;
    }
    .content .right .confirmation-of-order .confirmation-of-order-right p{
        font-size: 20px;
        line-height: 25px;
        text-align: justify;
    }
    .content .right .btn{
        display: flex;
        flex-direction: column;
        margin-top: 14px;
    }
    .content .right .btn button{
        padding: 8px;
        font-size: 20px;
        border-radius: 50px;
        border: none;
        background: #C84542;
        color: white;
        cursor: pointer;
    }
    .content .right .btn button:disabled{
        background: grey;
        cursor: default;
        opacity: .5;
    }
</style>
</html>

<?php ob_end_flush(); ?>