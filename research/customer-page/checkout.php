<?php
    include("connection.php");
    if(!isset($_SESSION['valid'])){
        header("Location:../login.php");
    }
    $customer_id = $_SESSION['customer_id'];
    $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$customer_id'");
    $rows = mysqli_fetch_assoc($query);
    $email = $rows['email'];
    $usernames = $rows['username'];

    if(isset($_POST['place-order'])){
        $customer_id = $_SESSION['customer_id'];
        $catalog_id = $_GET['catalog_id'];
        if(!empty($_GET['front-area'])){
            $merge_image = $_POST['mergedImagePath'].$_POST['merge-image'];
        }
        if(!empty($_GET['back-area'])){
            $merge_image_back = $_POST['mergedImagePath'].$_POST['merge-image-back'];
        }
        if(!empty($_GET['customer-image'])){
            $customer_upload_image = "../customer-image/".$_POST['customer-image'];
        }
        if(!empty($_GET['customer-images'])){
            $customer_upload_image_back = "../customer-image/".$_GET['customer-images'];
        }
        $customize_product = $_POST['customize-product'];
        $product_color = $_POST['product-color'];
        $product_type = $_POST['product-type'];
        $product_collar = $_POST['product-collar'];
        $print_area = $_POST['product-print-area'];
        $print_area_back = $_POST['product-print-back'];
        $product_small = $_POST['product-small'];
        $product_medium = $_POST['product-medium'];
        $product_large = $_POST['product-large'];
        $product_xlarge = $_POST['product-xlarge'];
        $receive_type = $_POST['receive-type'];
        $payment_method = $_POST['payment-method'];
        $total_order = $_POST['order-total'];
        $reference_id = rand(11111111,99999999);
        $names = $_POST['names'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $country = $_POST['country'];
        $phone_number = $_POST['phone_number'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        // mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`, `merge_image`, `customer_upload_image`,`customize_product`, `product_color`, `product_type`, `product_collar`, `product_print_area`, `small`, `medium`, `large`, `xlarge`, `receive-type`, `payment-method`, `order_total`,`reference_id`) VALUES ('$customer_id','$catalog_id','$merge_image','$customer_upload_image','$customize_product','$product_color','$product_type','$product_collar','$print_area','$product_small','$product_medium','$product_large','$product_xlarge','$receive_type','$payment_method','$total_order','$reference_id');");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`, `catalog_id`, `merge_image`,`merge_image2`,`customer_upload_image`,`customer_upload_image2`,`customize_product`, `product_color`, `product_type`, `product_collar`, `product_print_area`,`product_print_area2`,`small`, `medium`, `large`, `xlarge`, `receive_type`, `payment_method`, `order_total`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id','$catalog_id','$merge_image','$merge_image_back','$customer_upload_image','$customer_upload_image_back','$customize_product','$product_color','$product_type','$product_collar','$print_area','$print_area_back','$product_small','$product_medium','$product_large','$product_xlarge','$receive_type','$payment_method','$total_order','$reference_id','$names','$phone_number','$address','$city','$zipcode','$country')");
        
        header("Location: ../orders/orders-pay.php");
    }

    if(isset($_POST['place-order2'])){
        $customer_id2 = $_SESSION['customer_id'];
        $catalog_id2 = $_GET['catalog_id2'];
        $type2 = $_GET['type2'];
        if($_GET['print_area2'] == "Single"){
            $merge_image2 = $_POST['mergedImagePath2'].$_POST['merge-image2'];
        }
        $customer_upload_image2 = "../customer-image/".$_POST['customer-image2'];
        $customize_product2 = $_POST['customize-product2'];
        $print_area2 = $_POST['product-print-back'];
        $receive_type2 = $_POST['receive-type2'];
        $payment_method2 = $_POST['payment-method2'];
        $total_order2 = $_POST['order-total2'];
        $quantity2 = $_POST['quantity2'];
        $product_type2 = $_POST['product-type2'];
        $reference_id2 = rand(11111111,99999999);
        $names2 = $_POST['names2'];
        $address2 = $_POST['address2'];
        $city2 = $_POST['city2'];
        $zipcode2 = $_POST['zipcode2'];
        $country2 = $_POST['country2'];
        $phone_number2 = $_POST['phone_number2'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`, `merge_image`, `customer_upload_image`,`customize_product`,`product_type`,`product_print_area`,`receive-type`, `payment-method`,`order_total`,`quantity`,`reference_id`) VALUES ('$customer_id2','$catalog_id2','$merge_image2','$customer_upload_image2','$customize_product2','$product_type2','$print_area2','$receive_type2','$payment_method2','$total_order2','$quantity2','$reference_id2')");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`,`catalog_id`, `merge_image`, `customer_upload_image`,`customize_product`,`product_type`,`product_print_area`,`receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES 
                                                ('$customer_id2','$catalog_id2','$merge_image2','$customer_upload_image2','$customize_product2','$product_type2','$print_area2','$receive_type2','$payment_method2','$total_order2','$quantity2','$reference_id2','$names2','$phone_number2','$address2','$city2','$zipcode2','$country2')");
        
        header("Location: ../orders/orders-pay.php");
    }

    if(isset($_POST['place-order3'])){
        $customer_id3 = $_SESSION['customer_id'];
        $catalog_id3 = $_GET['catalog_id3'];
        $customer_upload_image3 = "../customer-image/".$_POST['customer-image3'];
        $customize_product3 = $_POST['customize-product3'];
        $receive_type3 = $_POST['receive-type3'];
        $payment_method3 = $_POST['payment-method3'];
        $total_order3 = $_POST['order-total3'];
        $quantity3 = $_POST['quantity3'];
        $reference_id3 = rand(11111111,99999999);
        $names3 = $_POST['names3'];
        $address3 = $_POST['address3'];
        $city3 = $_POST['city3'];
        $zipcode3 = $_POST['zipcode3'];
        $country3 = $_POST['country3'];
        $phone_number3 = $_POST['phone_number3'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`,`customer_upload_image`, `customer_name`, `customize_product`,`receive-type`,`payment-method`, `order_total`,`quantity`,`reference_id`) VALUES ('$customer_id3','$catalog_id3','$customer_upload_image3','$customer_name3','$customize_product3','$receive_type3','$payment_method3','$total_order3','$quantity3','$reference_id3');");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`, `catalog_id`,`customer_upload_image`,`customize_product`,`receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id3','$catalog_id3','$customer_upload_image3','$customize_product3','$receive_type3','$payment_method3','$total_order3','$quantity3','$reference_id3','$names3','$phone_number3','$address3','$city3','$zipcode3','$country3');");
        
        header("Location: ../orders/orders-pay.php");
    }

    if(isset($_POST['place-order4'])){
        $customer_id4 = $_SESSION['customer_id'];
        $catalog_id4 = $_GET['catalog_id4'];
        $merge_image4 = $_POST['mergedImagePath4'].$_POST['merge-image4'];
        $customer_upload_image4 = "../customer-image/".$_POST['customer-image4'];
        $customer_name4 = $_POST['customer-name4'];
        $customize_product4 = $_POST['customize-product4'];
        $print_area4 = $_POST['product-print-area4'];
        $receive_type4 = $_POST['receive-type4'];
        $payment_method4 = $_POST['payment-method4'];
        $total_order4 = $_POST['order-total4'];
        $quantity4 = $_POST['quantity4'];
        $reference_id4 = rand(11111111,99999999);
        $names4 = $_POST['names4'];
        $address4 = $_POST['address4'];
        $city4 = $_POST['city4'];
        $zipcode4 = $_POST['zipcode4'];
        $country4 = $_POST['country4'];
        $phone_number4 = $_POST['phone_number4'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`, `merge_image`, `customer_upload_image`, `customer_name`, `customize_product`,`product_print_area`,`receive-type`, `payment-method`,`order_total`,`quantity`,`reference_id`) VALUES ('$customer_id4','$catalog_id4','$merge_image4','$customer_upload_image4','$customer_name4','$customize_product4','$print_area4','$receive_type4','$payment_method4','$total_order4','$quantity4','$reference_id4');");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`,`catalog_id`,`merge_image`,`customer_upload_image`,`customize_product`,`product_print_area`,`receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id4','$catalog_id4','$merge_image4','$customer_upload_image4','$customize_product4','$print_area4','$receive_type4','$payment_method4','$total_order4','$quantity4','$reference_id4','$names4','$phone_number4','$address4','$city4','$zipcode4','$country4');");
        
        header("Location: ../orders/orders-pay.php");
    }

    if(isset($_POST['place-order5'])){
        $customer_id5 = $_SESSION['customer_id'];
        $catalog_id5 = $_GET['catalog_id5'];
        $merge_image5 = $_POST['mergedImagePath5'].$_POST['merge-image5'];
        $customer_upload_image5 = "../customer-image/".$_POST['customer-image5'];
        $customer_name5 = $_POST['customer-name5'];
        $customize_product5 = $_POST['customize-product5'];
        $receive_type5 = $_POST['receive-type5'];
        $payment_method5 = $_POST['payment-method5'];
        $total_order5 = $_POST['order-total5'];
        $quantity5 = $_POST['quantity5'];
        $reference_id5 = rand(11111111,99999999);
        $names5 = $_POST['names5'];
        $address5 = $_POST['address5'];
        $city5 = $_POST['city5'];
        $zipcode5 = $_POST['zipcode5'];
        $country5 = $_POST['country5'];
        $phone_number5 = $_POST['phone_number5'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`,`merge_image`,`customer_upload_image`, `customer_name`, `customize_product`,`receive-type`,`payment-method`, `order_total`,`quantity`,`reference_id`) VALUES ('$customer_id5','$catalog_id5','$merge_image5','$customer_upload_image5','$customer_name5','$customize_product5','$receive_type5','$payment_method5','$total_order5','$quantity5','$reference_id5');");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`, `catalog_id`,`merge_image`,`customer_upload_image`,`customize_product`,`receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id5','$catalog_id5','$merge_image5','$customer_upload_image5','$customize_product5','$receive_type5','$payment_method5','$total_order5','$quantity5','$reference_id5','$names5','$phone_number5','$address5','$city5','$zipcode5','$country5');");
        
        header("Location: ../orders/orders-pay.php");
    }

    if(isset($_POST['place-order6'])){
        $customer_id6 = $_SESSION['customer_id'];
        $catalog_id6 = $_GET['catalog_id6'];
        $customer_upload_image6 = "../customer-image/".$_POST['customer-image6'];
        $customer_name6 = $_POST['customer-name6'];
        $customize_product6 = $_POST['customize-product6'];
        $receive_type6 = $_POST['receive-type6'];
        $payment_method6 = $_POST['payment-method6'];
        $total_order6 = $_POST['order-total6'];
        $quantity6 = $_POST['quantity6'];
        $reference_id6 = rand(11111111,99999999);
        $names6 = $_POST['names6'];
        $address6 = $_POST['address6'];
        $city6 = $_POST['city6'];
        $zipcode6 = $_POST['zipcode6'];
        $country6 = $_POST['country6'];
        $phone_number6 = $_POST['phone_number6'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`,`customer_upload_image`, `customer_name`, `customize_product`,`receive-type`,`payment-method`, `order_total`,`quantity`,`reference_id`) VALUES ('$customer_id6','$catalog_id6','$customer_upload_image6','$customer_name6','$customize_product6','$receive_type6','$payment_method6','$total_order6','$quantity6','$reference_id6');");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`, `catalog_id`,`customer_upload_image`,`customize_product`,`receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id6','$catalog_id6','$customer_upload_image6','$customize_product6','$receive_type6','$payment_method6','$total_order6','$quantity6','$reference_id6','$names6','$phone_number6','$address6','$city6','$zipcode6','$country6');");
        
        header("Location: ../orders/orders-pay.php");
    }

    if(isset($_POST['place-order7'])){
        $customer_id7 = $_SESSION['customer_id'];
        $catalog_id7 = $_GET['catalog_id7'];
        $merge_image7 = $_POST['mergedImagePath7'].$_POST['merge-image7'];
        $customer_upload_image7 = "../customer-image/".$_POST['customer-image7'];
        $print_area7 = $_POST['product-print-area7'];
        $customize_product7 = $_POST['customize-product7'];
        $product_color7 = $_POST['color7'];
        $receive_type7 = $_POST['receive-type7'];
        $payment_method7 = $_POST['payment-method7'];
        $total_order7 = $_POST['order-total7'];
        $quantity7 = $_POST['quantity7'];
        $reference_id7 = rand(11111111,99999999);
        $names7 = $_POST['names7'];
        $address7 = $_POST['address7'];
        $city7 = $_POST['city7'];
        $zipcode7 = $_POST['zipcode7'];
        $country7 = $_POST['country7'];
        $phone_number7 = $_POST['phone_number7'];

        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`,`merge_image`,`customer_upload_image`,`customize_product`,`product_color`,`product_print_area`,`receive-type`,`payment-method`, `order_total`,`quantity`,`reference_id`) VALUES ('$customer_id7','$catalog_id7','$merge_image7','$customer_upload_image7','$customize_product7','$product_color7','$print_area7','$receive_type7','$payment_method7','$total_order7','$quantity7','$reference_id7');");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`, `catalog_id`,`merge_image`,`customer_upload_image`,`customize_product`,`product_color`,`product_print_area`,`receive_type`,`payment_method`,`order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id7','$catalog_id7','$merge_image7','$customer_upload_image7','$customize_product7','$product_color7','$print_area7','$receive_type7','$payment_method7','$total_order7','$quantity7','$reference_id7','$names7','$phone_number7','$address7','$city7','$zipcode7','$country7');");
        
        header("Location: ../orders/orders-pay.php");
    }

    if(isset($_POST['place-order8'])){
        $customer_id8 = $_SESSION['customer_id'];
        $catalog_id8 = $_GET['catalog_id8'];
        $customer_upload_image8 = "../customer-image/".$_POST['customer-image8'];
        $customer_name8 = $_POST['customer-name8'];
        $customize_product8 = $_POST['customize-product8'];
        $receive_type8 = $_POST['receive-type8'];
        $payment_method8 = $_POST['payment-method8'];
        $total_order8 = $_POST['order-total8'];
        $quantity8 = $_POST['quantity8'];
        $reference_id8 = rand(11111111,99999999);
        $names8 = $_POST['names8'];
        $address8 = $_POST['address8'];
        $city8 = $_POST['city8'];
        $zipcode8 = $_POST['zipcode8'];
        $country8 = $_POST['country8'];
        $phone_number8 = $_POST['phone_number8'];
        
        mysqli_query($conn, "INSERT INTO `admin_notification`(customer_id,actions) VALUES('$customer_id','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `audit_rel`(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Ordered a product')");
        mysqli_query($conn, "INSERT INTO `checkout`(`customer_id`, `catalog_id`,`customer_upload_image`, `customer_name`, `customize_product`,`receive-type`,`payment-method`, `order_total`,`quantity`,`reference_id`) VALUES ('$customer_id8','$catalog_id8','$customer_upload_image8','$customer_name8','$customize_product8','$receive_type8','$payment_method8','$total_order8','$quantity8','$reference_id8');");
        mysqli_query($conn, "INSERT INTO `topay`(`customer_id`, `catalog_id`,`customer_upload_image`,`customize_product`,`receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id8','$catalog_id8','$customer_upload_image8','$customize_product8','$receive_type8','$payment_method8','$total_order8','$quantity8','$reference_id8','$names8','$phone_number8','$address8','$city8','$zipcode8','$country8');");
        
        header("Location: ../orders/orders-pay.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Checkout | Print My Shirt</title>
</head>
<body>
<?php include("website-header.php"); ?>
<?php if(isset($_GET['catalog_id']) == 1 && isset($_GET['color'])){
        $catalog_id = $_GET['catalog_id'];
        if(!empty($_GET['front-area'])){
            $front_area = $_GET['front-area'];
        }
        if(!empty($_GET['back-area'])){
            $back_area = $_GET['back-area'];
            $color = $_GET['color'];
                    switch($_GET['back-area']){
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
            $color = $_GET['color'];
            $collar = $_GET['collar']; 
            $type = $row1['product_type'];
            $collar = $row1['product_collar'];
            switch($collar){
                case 'Crew-neck':
                    switch($color){
                        case 'Black':
                            $imageURL = "images/tshirt-front-crewneckblack.png";
                        break;
                        case 'White':
                            $imageURL = "images/tshirt-front-crewneckwhite.png";
                        break;
                        case 'Blue':
                            $imageURL = "images/tshirt-front-crewneckblue.png";
                        break;
                        case 'Red':
                            $imageURL = "images/tshirt-front-crewneckred.png";
                        break;
                    }
                break;
                case 'V-neck':
                    switch($color){
                        case 'Black':
                            $imageURL = "images/tshirt-front-vneckblack.png";
                        break;
                        case 'White':
                            $imageURL = "images/tshirt-front-vneckwhite.png";
                        break;
                        case 'Blue':
                            $imageURL = "images/tshirt-front-vneckblue.png";
                        break;
                        case 'Red':
                            $imageURL = "images/tshirt-front-vneckred.png";
                        break;
                    }
                break;
            }
            $front_area = $row1['product_print_area_front'];
            $back_area = $row1['product_print_area_back'];
            $small = $row1['small'];
            $medium = $row1['medium'];
            $large = $row1['large'];
            $xlarge = $row1['xlarge'];
            $row_image = $row1['customer_image'];
            $customer_image = basename($row_image);
        }
        
        $customer_id = $_SESSION['customer_id'];
        $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
    ?>
    <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id=<?=$catalog_id?>"><?= $name ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>


            <div class="checkout">
                <h1 class="checkout-header">Checkout</h1>
                <div class="checkout-left-right">
                    <div class="checkout-left">
                        <div class="front-area">
                            <?php if(!empty($_GET['front-area'])){?>
                                <?php if($_GET['collar'] == "Crew-neck"){?>
                                    <img src="<?= $imageURL ?>" width="400" height="450" alt="">
                                        <?php
                                            echo'<img src="../customer-image/'. $customer_image .'" class="layer-image" style="';
                                                switch($_GET['front-area']) {
                                                    case 'Full Front':
                                                        echo "width: 165px; height: 165px; top: 47%; left: 50%; transform: translate(-50%,-53%);";
                                                                $print_area_width = 1350;
                                                                $print_area_height = 1350;
                                                                $print_area_position_hori = 873;
                                                                $print_area_position_verti = 1000;
                                                                $price = 120;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $shipping = 40;
                                                        break;
                                                    case 'Medium Front':
                                                        echo "width: 130px; height: 130px; top: 43%; left: 50%; transform: translate(-50%,-57%);";
                                                                $print_area_width = 1000;
                                                                $print_area_height = 1000;
                                                                $print_area_position_hori = 1050;
                                                                $print_area_position_verti = 920;
                                                                $price = 80;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Center Chest':
                                                        echo "width: 50px; height: 60px; top: 34%; left: 50%; transform: translate(-50%,-66%);";
                                                                $print_area_width = 450;
                                                                $print_area_height = 550;
                                                                $print_area_position_hori = 1365;
                                                                $print_area_position_verti = 920;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 50;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Across Chest':
                                                        echo "width: 170px; height: 40px; top: 32%; left: 50%; transform: translate(-50%,-68%);";
                                                                $print_area_width = 1400;
                                                                $print_area_height = 300;
                                                                $print_area_position_hori = 850;
                                                                $print_area_position_verti = 900;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 80;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Right Chest':
                                                        echo "width: 50px; height: 50px; top: 37%; left: 37%; transform: translate(-63%,-63%);";
                                                                $print_area_width = 420;
                                                                $print_area_height = 420;
                                                                $print_area_position_hori = 900;
                                                                $print_area_position_verti = 1060;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 45;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Left Chest':
                                                        echo "width: 50px; height: 50px; top: 37%; left: 63%; transform: translate(-37%,-63%);";
                                                                $print_area_width = 420;
                                                                $print_area_height = 420;
                                                                $print_area_position_hori = 1820;
                                                                $print_area_position_verti = 1060;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 45;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Right Vertical':
                                                        echo "width: 40px; height: 240px; top: 54%; left: 34%; transform: translate(-66%,-46%);";
                                                                $print_area_width = 300;
                                                                $print_area_height = 1870;
                                                                $print_area_position_hori = 800;
                                                                $print_area_position_verti = 1090;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 85;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Left Vertical':
                                                        echo "width: 40px; height: 240px; top: 54%; left: 66%; transform: translate(-34%,-46%);";
                                                                $print_area_width = 300;
                                                                $print_area_height = 1870;
                                                                $print_area_position_hori = 2000;
                                                                $print_area_position_verti = 1090;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 85;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Left Bottom':
                                                        echo "width: 70px; height: 50px; top: 76%; left: 64%; transform: translate(-36%,-24%);";
                                                                $print_area_width = 550;
                                                                $print_area_height = 350;
                                                                $print_area_position_hori = 1790;
                                                                $print_area_position_verti = 2650;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 50;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Right Bottom':
                                                        echo "width: 70px; height: 50px; top: 76%; left: 36%; transform: translate(-64%,-24%);";
                                                                $print_area_width = 550;
                                                                $print_area_height = 350;
                                                                $print_area_position_hori = 770;
                                                                $print_area_position_verti = 2650;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 50;
                                                                $shipping = 25;
                                                        break;
                                                }
                                            echo'">';
                                        ?>
                                    <input type="hidden" name="customer-image" value="<?= $customer_image ?>">
                                    <?php

                                            $customer_image = $_GET['customer-image'];
                                            $front_area = $_GET['front-area'];
                                            // $back_area = $_GET['back-area'];

                                            $imagePath = "images/";

                                            $baseImage = imagecreatefrompng($imageURL);

                                            $overlayImage = imagecreatefrompng("../customer-image/$customer_image");

                                            $overlayWidth = $print_area_width;
                                            $overlayHeight = $print_area_height;

                                            $overlayResized = imagescale($overlayImage, $overlayWidth, $overlayHeight);

                                            imagecopy($baseImage, $overlayResized,  $print_area_position_hori,  $print_area_position_verti, 0, 0, $overlayWidth, $overlayHeight);

                                            $mergedImagePath = "../customer-finish-product/";
                                            
                                            $baseFilename = "merged_image";

                                            $fileExtension = ".png";

                                            $counter = 1;

                                            $filename = $baseFilename . $fileExtension;

                                            while (file_exists($mergedImagePath . $filename)) {
                                                // If the file exists, increment the counter and generate a new filename
                                                $counter++;
                                                $filename = $baseFilename . $counter . $fileExtension;
                                            }

                                            
                                            imagepng($baseImage, $mergedImagePath . $filename);

                                            imagedestroy($baseImage);
                                            imagedestroy($overlayImage);
                                    ?>
                                    <input type="hidden" name="merge-image" value="<?= $filename ?>">
                                    <input type="hidden" name="mergedImagePath" value="<?= $mergedImagePath ?>">
                                <?php }else if($_GET['collar'] == "V-neck"){?>
                                    <img src="<?= $imageURL ?>" width="400" height="450" alt="">
                                        <?php
                                            echo'<img src="../customer-image/'. $customer_image .'" class="layer-image" style="';
                                                switch($_GET['front-area']) {
                                                    case 'Full Front':
                                                        echo "width: 165px; height: 165px; top: 50%; left: 50%; transform: translate(-50%,-50%);";
                                                                $print_area_width = 1350;
                                                                $print_area_height = 1350;
                                                                $print_area_position_hori = 873;
                                                                $print_area_position_verti = 1090;
                                                                $price = 120;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $shipping = 40;
                                                        break;
                                                    case 'Medium Front':
                                                        echo "width: 130px; height: 130px; top: 46%; left: 50%; transform: translate(-50%,-53%);";
                                                                $print_area_width = 1000;
                                                                $print_area_height = 1000;
                                                                $print_area_position_hori = 1050;
                                                                $print_area_position_verti = 1030;
                                                                $price = 80;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Center Chest':
                                                        echo "width: 50px; height: 60px; top: 37%; left: 50%; transform: translate(-50%,-63%);";
                                                                $print_area_width = 450;
                                                                $print_area_height = 550;
                                                                $print_area_position_hori = 1365;
                                                                $print_area_position_verti = 1050;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 50;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Across Chest':
                                                        echo "width: 170px; height: 40px; top: 35%; left: 50%; transform: translate(-50%,-65%);";
                                                                $print_area_width = 1400;
                                                                $print_area_height = 300;
                                                                $print_area_position_hori = 850;
                                                                $print_area_position_verti = 1040;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 80;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Right Chest':
                                                        echo "width: 50px; height: 50px; top: 40%; left: 37%; transform: translate(-63%,-60%);";
                                                                $print_area_width = 420;
                                                                $print_area_height = 420;
                                                                $print_area_position_hori = 900;
                                                                $print_area_position_verti = 1170;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 45;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Left Chest':
                                                        echo "width: 50px; height: 50px; top: 40%; left: 63%; transform: translate(-37%,-60%);";
                                                                $print_area_width = 420;
                                                                $print_area_height = 420;
                                                                $print_area_position_hori = 1820;
                                                                $print_area_position_verti = 1170;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 45;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Right Vertical':
                                                        echo "width: 40px; height: 240px; top: 57%; left: 34%; transform: translate(-66%,-43%);";
                                                                $print_area_width = 300;
                                                                $print_area_height = 1870;
                                                                $print_area_position_hori = 800;
                                                                $print_area_position_verti = 1230;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 85;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Left Vertical':
                                                        echo "width: 40px; height: 240px; top: 57%; left: 66%; transform: translate(-34%,-43%);";
                                                                $print_area_width = 300;
                                                                $print_area_height = 1870;
                                                                $print_area_position_hori = 2000;
                                                                $print_area_position_verti = 1230;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 85;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Left Bottom':
                                                        echo "width: 70px; height: 50px; top: 76%; left: 64%; transform: translate(-36%,-24%);";
                                                                $print_area_width = 550;
                                                                $print_area_height = 350;
                                                                $print_area_position_hori = 1790;
                                                                $print_area_position_verti = 2650;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 50;
                                                                $shipping = 25;
                                                        break;
                                                    case 'Right Bottom':
                                                        echo "width: 70px; height: 50px; top: 76%; left: 36%; transform: translate(-64%,-24%);";
                                                                $print_area_width = 550;
                                                                $print_area_height = 350;
                                                                $print_area_position_hori = 770;
                                                                $print_area_position_verti = 2650;
                                                                $smallAmount = 100;
                                                                $mediumAmount = 100;
                                                                $largeAmount = 100;
                                                                $xlargeAmount = 100;
                                                                $price = 50;
                                                                $shipping = 25;
                                                        break;
                                                }
                                            echo'">';
                                        ?>
                                    <input type="hidden" name="customer-image" value="<?= $customer_image ?>">
                                    <?php

                                            $customer_image = $_GET['customer-image'];
                                            $front_area = $_GET['front-area'];
                                            // $back_area = $_GET['back-area'];

                                            $imagePath = "images/";

                                            $baseImage = imagecreatefrompng($imageURL);

                                            $overlayImage = imagecreatefrompng("../customer-image/$customer_image");

                                            $overlayWidth = $print_area_width;
                                            $overlayHeight = $print_area_height;

                                            $overlayResized = imagescale($overlayImage, $overlayWidth, $overlayHeight);

                                            imagecopy($baseImage, $overlayResized,  $print_area_position_hori,  $print_area_position_verti, 0, 0, $overlayWidth, $overlayHeight);

                                            $mergedImagePath = "../customer-finish-product/";
                                            
                                            $baseFilename = "merged_image";

                                            $fileExtension = ".png";

                                            $counter = 1;

                                            $filename = $baseFilename . $fileExtension;

                                            while (file_exists($mergedImagePath . $filename)) {
                                                // If the file exists, increment the counter and generate a new filename
                                                $counter++;
                                                $filename = $baseFilename . $counter . $fileExtension;
                                            }

                                            
                                            imagepng($baseImage, $mergedImagePath . $filename);

                                            imagedestroy($baseImage);
                                            imagedestroy($overlayImage);
                                    ?>
                                    <input type="hidden" name="merge-image" value="<?= $filename ?>">
                                    <input type="hidden" name="mergedImagePath" value="<?= $mergedImagePath ?>">
                                <?php } ?>
                            <?php }?>
                        </div>
                        <div class="back-area">
                            <?php if(!empty($_GET['back-area'])){?> 
                                <img src="<?= $behindImageback ?>" width="400" height="450" alt="">
                                    <?php
                                        echo'<img src="../customer-image/'. $customer_images .'" class="layer-image" style="';
                                        switch($_GET['back-area']) {
                                            case 'Full Back':
                                                    echo "width: 165px; height: 165px; top: 45%; left: 50%; transform: translate(-50%,-55%);";
                                                        $print_area_width = 1350;
                                                        $print_area_height = 1350;
                                                        $print_area_position_hori = 873;
                                                        $print_area_position_verti = 1080;
                                                        $price_back = 120;
                                                        $smallAmount = 100;
                                                        $mediumAmount = 100;
                                                        $largeAmount = 100;
                                                        $xlargeAmount = 100;
                                                        $shipping = 40; 
                                                break;
                                            case 'Medium Back':
                                                    echo "width: 130px; height: 130px; top: 39%; left: 50%; transform: translate(-50%,-61%);";
                                                        $print_area_width = 1000;
                                                        $print_area_height = 1000;
                                                        $print_area_position_hori = 1050;
                                                        $print_area_position_verti = 870;
                                                        $price_back = 80;
                                                        $smallAmount = 100;
                                                        $mediumAmount = 100;
                                                        $largeAmount = 100;
                                                        $xlargeAmount = 100;
                                                        $shipping = 35;
                                                break;
                                            case 'Across Back':
                                                    echo "width: 170px; height: 40px; top: 28%; left: 50%; transform: translate(-50%,-72%);";
                                                        $print_area_width = 1400;
                                                        $print_area_height = 300;
                                                        $print_area_position_hori = 850;
                                                        $print_area_position_verti = 830;
                                                        $smallAmount = 100;
                                                        $mediumAmount = 100;
                                                        $largeAmount = 100;
                                                        $xlargeAmount = 100;
                                                        $price_back = 80;
                                                        $shipping = 35;
                                                break;
                                            case 'Back Patch':
                                                    echo "width: 50px; height: 60px; top: 28%; left: 50%; transform: translate(-50%,-72%);";
                                                        $print_area_width = 450;
                                                        $print_area_height = 550;
                                                        $print_area_position_hori = 1365;
                                                        $print_area_position_verti = 820;
                                                        $smallAmount = 100;
                                                        $mediumAmount = 100;
                                                        $largeAmount = 100;
                                                        $xlargeAmount = 100;
                                                        $price_back = 50;
                                                        $shipping = 25;
                                                break;
                                        }
                                        echo'">';
                                    ?>
                                    <input type="hidden" name="customer-image" value="<?= $customer_image ?>">
                                    <?php

                                            $customer_images = $_GET['customer-images'];
                                            // $front_area = $_GET['front-area'];
                                            $back_area = $_GET['back-area'];

                                            $imagePath = "images/";

                                            $baseImage = imagecreatefrompng($behindImageback);

                                            $overlayImage = imagecreatefrompng("../customer-image/$customer_images");

                                            $overlayWidth = $print_area_width;
                                            $overlayHeight = $print_area_height;

                                            $overlayResized = imagescale($overlayImage, $overlayWidth, $overlayHeight);

                                            imagecopy($baseImage, $overlayResized,  $print_area_position_hori,  $print_area_position_verti, 0, 0, $overlayWidth, $overlayHeight);

                                            $mergedImagePathh = "../customer-finish-product/";
                                           
                                            $baseFilename = "merged_image_back";

                                            $fileExtension = ".png";

                                            $counter = 1;

                                            $filename = $baseFilename . $fileExtension;

                                            while (file_exists($mergedImagePathh . $filename)) {
                                                // If the file exists, increment the counter and generate a new filename
                                                $counter++;
                                                $filename = $baseFilename . $counter . $fileExtension;
                                            }

                                            imagepng($baseImage, $mergedImagePathh . $filename);

                                            imagedestroy($baseImage);
                                            imagedestroy($overlayImage);
                                ?>
                                <input type="hidden" name="merge-image-back" value="<?= $filename ?>">
                                <input type="hidden" name="mergedImagePath" value="<?= $mergedImagePathh ?>">
                            <?php }?>                    
                        </div>
                    </div>
                    
                    <div class="checkout-right">
                        <div class="first-column">
                            <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                    <h1> No address, please set your address in account settings</h1>
                            <?php }else{ ?>
                                    <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                        <input type="hidden" name="names" value="<?= $address['names'];?>">
                                    <div class="address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                            <input type="hidden" name="address" value="<?= $address['address']; ?>">
                                            <input type="hidden" name="city" value="<?= $address['city']; ?>">
                                            <input type="hidden" name="zipcode" value="<?= $address['zipcode']; ?>">
                                            <input type="hidden" name="country" value="<?= $address['country']; ?>">
                                    </div>
                                <div class="phone">
                                    <i class="fa-solid fa-phone"></i>
                                    <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                    <input type="hidden" name="phone_number" value="<?= $address['phone_number'];?>">
                                </div>
                            <?php } ?>
                        </div>

                        <div class="select-type">
                                <h3>Select receive type: </h3>
                                <select name="receive-type" id="">
                                    <option value="Delivery">Delivery</option>
                                    <option value="Pickup">Pick up</option>
                                </select>
                        </div>    

                
                        <div class="second-column">
                            <div class="second-column-left">
                                        <h1>Product Details</h1>
                                
                                        <div class="product-details">
                                            <p>Customized <span><?= $name ?></span></p>
                                            <input type="hidden" name="customize-product" value="<?= $name ?>">
                                            <p>Color - <span><?= $color ?></span></p>
                                            <input type="hidden" name="product-color" value="<?= $color ?>">
                                            <p>Type - <span><?= $type ?></span></p>
                                            <input type="hidden" name="product-type" value="<?= $type ?>">
                                            <p>Collar - <span><?= $collar ?></span></p>
                                            <input type="hidden" name="product-collar" value="<?= $collar ?>">
                                            <p>Print Area - <span><?php if(!empty($front_area)){ echo $front_area;} ?><?php if(!empty($back_area)){ echo '/'.$back_area;} ?></span></p>
                                            <input type="hidden" name="product-print-area" value="<?php if(!empty($front_area)){echo $front_area;}?>">
                                            <input type="hidden" name="product-print-back" value="<?php if(!empty($back_area)){echo $back_area;}?>">
                                            <?php if(!empty($_GET['front-area'])){?>
                                                <p>File name - <span><?= $customer_image?></span></p>
                                            <?php }?>
                                            <?php if(!empty($_GET['back-area'])){?>
                                                <p>File name - <span><?= $customer_images?></span></p>
                                            <?php }?>
                                        </div>
                                    
                            </div>
                            <div class="second-column-right">
                                    <div class="second-column-right-top">
                                        <table>
                                            <div class="quantity">
                                                <tr>
                                                    <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                    <th style="padding: 5px;"><h1>Amount</h1></th>
                                                    <th style="padding: 5px;"><h1>Price</h1></th>
                                                    <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                        <div class="quantity-details">
                                                        
                                                        </div>
                                                </tr>
                                            </div>
                                            <div class="amount">
                                                <?php if(!empty($small)){?>
                                                    <tr>
                                                        <div class="amount-details">
                                                            <td><p>S - <span><?= $small ?></span></p></td>
                                                                <input type="hidden" name="product-small" value="<?= $small ?>">
                                                            <td>
                                                                <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                    <p> <?php if($small){ echo $smalls = ($small*$smallAmount);} ?></p>
                                                                <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                    <p> <?php if($small){ echo ($small*$smallAmount);} ?></p>
                                                                <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                    <p> <?php if($small){ echo ($small*$smallAmount);} ?></p>
                                                                <?php }?>
                                                            </td>
                                                            <td>
                                                                <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                    <p> <?php if($small){ echo $prices = $price+$price_back;} ?></p>
                                                                <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                    <p> <?php if($small){ echo $price;} ?></p>
                                                                <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                    <p> <?php if($small){ echo $price_back;} ?></p>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                    <p> <?php if(($small)){ echo $smallSubtotal = ($prices+$smalls);} ?> </p>
                                                                <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                    <p> <?php if(($small)){ echo $smallSubtotal = $small*$smallAmount+$price;} ?> </p>
                                                                <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                    <p> <?php if(($small)){ echo $smallSubtotal = $small*$smallAmount+$price_back;} ?> </p>
                                                                <?php }?>
                                                            </td>
                                                        </div>
                                                    </tr>
                                                <?php } ?>
                                            </div>
                                                <tr>
                                                    <div class="subtotal">
                                                        
                                                            <div class="subtotal-details">
                                                                <?php if(!empty($medium)){ ?>
                                                                    <tr>
                                                                        <td><p>M - <span><?= $medium ?></span></p></td>
                                                                            <input type="hidden" name="product-medium" value="<?= $medium ?>">
                                                                        <td>
                                                                            <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                                <p> <?php if($medium){ echo $mediums = ($medium*$mediumAmount);} ?></p>
                                                                            <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                                <p> <?php if($medium){ echo ($medium*$mediumAmount);} ?></p>
                                                                            <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                                <p> <?php if($medium){ echo ($medium*$mediumAmount);} ?></p>
                                                                            <?php }?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                                <p> <?php if($medium){ echo $prices = $price+$price_back;} ?></p>
                                                                            <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                                <p> <?php if($medium){ echo $price;} ?></p>
                                                                            <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                                <p> <?php if($medium){ echo $price_back;} ?></p>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                                <p> <?php if(($medium)){ echo $mediumSubtotal = ($prices+$mediums);} ?> </p>
                                                                            <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                                <p> <?php if(($medium)){ echo $mediumSubtotal = $medium*$mediumAmount+$price;} ?> </p>
                                                                            <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                                <p> <?php if(($medium)){ echo $mediumSubtotal = $medium*$mediumAmount+$price_back;} ?> </p>
                                                                            <?php }?>
                                                                        </td>
                                                                    </tr>
                                                                <?php }?>    
                                                            </div>
                                                            <?php if(!empty($large)){ ?>
                                                                <tr>
                                                                    <td><p>L - <span><?= $large ?></span></p></td>
                                                                            <input type="hidden" name="product-large" value="<?= $large ?>">
                                                                    <td>
                                                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($large){ echo $larges = ($large*$largeAmount);} ?></p>
                                                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                            <p> <?php if($large){ echo ($large*$largeAmount);} ?></p>
                                                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($large){ echo ($large*$largeAmount);} ?></p>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($large){ echo $prices = $price+$price_back;} ?></p>
                                                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                            <p> <?php if($large){ echo $price;} ?></p>
                                                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($large){ echo $price_back;} ?></p>
                                                                        <?php } ?>
                                                                        </td>
                                                                    <td>
                                                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if(($large)){ echo $largeSubtotal = ($prices+$larges);} ?> </p>
                                                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                            <p> <?php if(($large)){ echo $largeSubtotal = $large*$largeAmount+$price;} ?> </p>
                                                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if(($large)){ echo $largeSubtotal = $large*$largeAmount+$price_back;} ?> </p>
                                                                        <?php }?>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?> 
                                                            <?php if(!empty($xlarge)){?>  
                                                                <tr>
                                                                    <td><p>XL - <span><?= $xlarge ?></span></p></td>
                                                                        <input type="hidden" name="product-xlarge" value="<?= $xlarge ?>">
                                                                    <td>
                                                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($xlarge){ echo $xlarges = ($xlarge*$xlargeAmount);} ?></p>
                                                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                            <p> <?php if($xlarge){ echo ($xlarge*$xlargeAmount);} ?></p>
                                                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($xlarge){ echo ($xlarge*$xlargeAmount);} ?></p>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($xlarge){ echo $prices = $price+$price_back;} ?></p>
                                                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                            <p> <?php if($xlarge){ echo $price;} ?></p>
                                                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if($xlarge){ echo $price_back;} ?></p>
                                                                        <?php } ?>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if(($xlarge)){ echo $mediumSubtotal = ($prices+$xlarges);} ?> </p>
                                                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                                                            <p> <?php if(($xlarge)){ echo $xlargeSubtotal = $xlarge*$xlargeAmount+$price;} ?> </p>
                                                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                                                            <p> <?php if(($xlarge)){ echo $xlargeSubtotal = $xlarge*$xlargeAmount+$price_back;} ?> </p>
                                                                        <?php }?>
                                                                    </td>
                                                                </tr>
                                                            <?php }?>
                                                    </div>
                                                </tr>
                                        </table>
                                    </div>
                                    <div class="second-column-right-bottom">
                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                            <!-- <h1>Merchandise Total: <span><?php echo $merchandiseTotal = ($smallSubtotal) + ($mediumSubtotal) + ($largeSubtotal) + ($xlargeSubtotal) ?></span></h1> -->
                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                            <!-- <h1>Merchandise Total: <span><?php echo $merchandiseTotal = $smallSubtotal + $mediumSubtotal + $largeSubtotal + $xlargeSubtotal?></span></h1> -->
                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                            <!-- <h1>Merchandise Total: <span><?php echo $merchandiseTotal = $smallSubtotal + $mediumSubtotal + $largeSubtotal + $xlargeSubtotal?></span></h1> -->
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="payment-method">
                            <h1>Payment method: </h1> 
                                <select name="payment-method" id="">
                                    <option value="COD">Payment1(COD)</option>
                                </select>
                        </div>

                        <div class="order-total">
                            <div class="order-total-price">
                                <table width="70%">
                                    <tr>
                                        <th>Merchandise Total</th>
                                        <th><?php echo $merchandiseTotal ?></th>
                                    </tr>
                                    <tr>
                                        <th>Shipping Subtotal</th>
                                        <?php if(!empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                            <th><?= $shipping = $shipping*2?></th>
                                        <?php }else if(!empty($_GET['front-area']) && empty($_GET['back-area'])){?>
                                            <th><?= $shipping ?></th>
                                        <?php }else if(empty($_GET['front-area']) && !empty($_GET['back-area'])){?>
                                            <th><?= $shipping ?></th>
                                        <?php }?>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <th><?php echo $orderTotal = $merchandiseTotal + $shipping ?></th>
                                        <input type="hidden" name="order-total" value="<?= $orderTotal ?>">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="place-order">
                            <button name="place-order">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }else if(isset($_GET['catalog_id2']) == 2){
    $catalog_id2 = $_GET['catalog_id2'];
    $area_print2 = $_GET['print_area2'];
    $customer_image2 = $_GET['customer_image2'];
    $product2 = mysqli_query($conn, "SELECT * FROM product2 WHERE catalog_id = '$catalog_id2'");
    while($row2 = mysqli_fetch_assoc($product2)){
        $image2 = $row2['catalog_image'];
        $name2 = $row2['catalog_name'];
        $type2 = $row2['product_type'];
        $type2 = $_GET['type2'];
        switch ($type2) {
            case 'Classic-mug':
                    $imageURL2 = "images/classic-mug-1.png";
            break;
            case 'Magic-mug':
                    $imageURL2 = "images/magic-mug-1.png";
            break;
        }
        $print_area2 = $row2['product_print_area'];
        $row_image2 = $row2['product_upload_image'];
        $quantity2 = $row2['product_quantity'];
        $customer_image2 = basename($row_image2);
    }
        $amount2 = 75;
        $shipping = 40;

        $customer_id = $_SESSION['customer_id'];
        $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
    ?>
    <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id2=<?=$catalog_id2?>"><?= $name2 ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>


            <div class="checkout">
                <h1 class="checkout-header">Checkout</h1>
            <div class="checkout-left-right">
                    <div class="checkout-left">
                        <?php if(!empty($_GET['print_area2'])){?> 
                                <?php if($print_area2 == "Single"){?>
                                        <img src="<?=  $imageURL2 ?>" width="400" height="450" style="position: relative;" alt="">
                                            <?php
                                                if($type2 == "Classic-mug"){
                                                    echo'<img src="../customer-image/'. $customer_image2 .'" class="layer-image" style="';
                                                            switch($area_print2) {
                                                                case 'Single':
                                                                        echo"width: 200px;height: 240px;top: 48%; left: 42%;transform:translate(-58%,-52%);";
                                                                            $print_area_width2 = 2100;
                                                                            $print_area_height2 = 2350;
                                                                            $print_area_position_hori2 = 500;
                                                                            $print_area_position_verti2 = 1100;
                                                                            $price2 = 100;
                                                                            $shipping = 30;
                                                                break;
                                                            }
                                                    echo'">';
                                                }else if($type2 == "Magic-mug"){
                                                    echo'<img src="../customer-image/'. $customer_image2 .'" class="layer-image" style="';
                                                            switch($area_print2) {
                                                                case 'Single':
                                                                    echo"width: 200px;height: 235px;top: 53%; left: 42%;transform:translate(-58%,-47%);";
                                                                        $print_area_width2 = 2110;
                                                                        $print_area_height2 = 2400;
                                                                        $print_area_position_hori2 = 470;
                                                                        $print_area_position_verti2 = 1230;
                                                                        $price2 = 150;
                                                                        $shipping = 30;
                                                                break;
                                                            }
                                                        }
                                                    echo'">';
                                            ?>
                                <?php }else if($print_area2 == "Wrapped"){?>
                                    <img src="../customer-image/<?= $customer_image2 ?>" alt="">
                                    <?php 
                                        if($type2 == "Classic-mug"){
                                            $price2 = 100;
                                            $shipping = 30;
                                        }else if($type2 == "Magic-mug"){
                                            $price2 = 150;
                                            $shipping = 30;
                                        }
                                    ?>
                                <?php }?>
                                        <input type="hidden" name="customer-image2" value="<?= $customer_image2 ?>">
                                        <?php
                                            if($print_area2 == "Single"){
                                                $customer_image2 = $_GET['customer_image2'];

                                                $imagePath2 = "images/";

                                                $baseImage2 = imagecreatefrompng($imageURL2);

                                                $overlayImage2 = imagecreatefrompng("../customer-image/$customer_image2");

                                                $overlayWidth2 = $print_area_width2;
                                                $overlayHeight2 = $print_area_height2;
                                                
                                                $overlayResized2 = imagescale($overlayImage2, $overlayWidth2, $overlayHeight2);

                                                imagecopy($baseImage2, $overlayResized2,  $print_area_position_hori2,  $print_area_position_verti2, 0, 0, $overlayWidth2, $overlayHeight2);

                                                $mergedImagePath2 = "../customer-finish-product/";
                                                
                                                $baseFilename2 = "merged_image";

                                                $fileExtension2 = ".png";

                                                $counter2 = 1;

                                                $filename2 = $baseFilename2 . $fileExtension2;

                                                while (file_exists($mergedImagePath2 . $filename2)) {

                                                    $counter2++;
                                                    $filename2 = $baseFilename2 . $counter2 . $fileExtension2;
                                                }

                                                imagepng($baseImage2, $mergedImagePath2 . $filename2);

                                                imagedestroy($baseImage2);
                                                imagedestroy($overlayImage2);
                                            }
                                    ?>
                                    <input type="hidden" name="merge-image2" value="<?= $filename2 ?>">
                                    <input type="hidden" name="mergedImagePath2" value="<?= $mergedImagePath2 ?>">
                        <?php }?> 
                    </div>
                    
                    <div class="checkout-right">
                        <div class="first-column">
                            <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                    <h1> No address, please set your address in account settings</h1>
                            <?php }else{ ?>
                                    <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                        <input type="hidden" name="names2" value="<?= $address['names'];?>">
                                    <div class="address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                            <input type="hidden" name="address2" value="<?= $address['address']; ?>">
                                            <input type="hidden" name="city2" value="<?= $address['city']; ?>">
                                            <input type="hidden" name="zipcode2" value="<?= $address['zipcode']; ?>">
                                            <input type="hidden" name="country2" value="<?= $address['country']; ?>">
                                    </div>
                                <div class="phone">
                                    <i class="fa-solid fa-phone"></i>
                                    <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                    <input type="hidden" name="phone_number2" value="<?= $address['phone_number'];?>">
                                </div>
                            <?php } ?>
                        </div>

                        <div class="select-type">
                                <h3>Select receive type: </h3>
                                <select name="receive-type2" id="">
                                    <option value="Delivery">Delivery</option>
                                    <option value="Pickup">Pick up</option>
                                </select>
                        </div>    

                
                        <div class="second-column">
                            <div class="second-column-left">
                                    <h1>Product Details</h1>
                                
                                        <div class="product-details">
                                            <p>Customized - <span><?= $name2?></span></p>
                                            <input type="hidden" name="customize-product2" value="<?= $name2?>">
                                            <p>Type - <span><?= $type2?></span></p>
                                            <input type="hidden" name="product-type2" value="<?= $type2?>">
                                            <p>Print Area - <span><?= $area_print2 ?></span></p>
                                            <input type="hidden" name="product-print-area2" value="<?= $area_print2 ?>">
                                            <p>File name - <span><?= $customer_image2?></span></p>
                                        </div>
                                    
                            </div>
                            <div class="second-column-right">
                                    <div class="second-column-right-top">
                                        <table>
                                            <div class="quantity">
                                                <tr>
                                                    <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                    <th style="padding: 5px;"><h1>Price</h1></th>
                                                    <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                        <div class="quantity-details">
                                                        
                                                        </div>
                                                </tr>
                                            </div>
                                            <div class="amount">
                                                <tr>
                                                    <th><?= $quantity2 ?></th>
                                                    <input type="hidden" name="quantity2" value="<?= $quantity2 ?>">
                                                    <th><?= $price2 ?></th>
                                                    <th><?= $amounts2 = $quantity2 * $price2 ?></th>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                    <div class="second-column-right-bottom">
                                        <h1>Merchandise Total: <span><?= $amounts2 ?></span></h1>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="payment-method">
                            <h1>Select payment method: </h1> 
                                <select name="payment-method2" id="">
                                    <option value="COD">Payment1(COD)</option>
                                </select>
                        </div>

                        <div class="order-total">
                            <div class="order-total-price">
                                <table width="70%">
                                    <tr>
                                        <th>Merchandise Total</th>
                                        <th><?= $amounts2 ?></th>
                                    </tr>
                                    <tr>
                                        <th>Shipping Subtotal</th>
                                        <th><?= $shipping ?></th>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <th><?php echo $order_total2 = $amounts2 + $shipping; ?></th>
                                        <input type="hidden" name="order-total2" value="<?= $order_total2 ?>">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="place-order">
                            
                            <button name="place-order2">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }else if(isset($_GET['catalog_id3']) == 3){
     $catalog_id3 = $_GET['catalog_id3'];
     $customer_image3 = $_GET['customer_image3'];
     $product3 = mysqli_query($conn, "SELECT * FROM product3 WHERE catalog_id = '$catalog_id3'");
     while($row3 = mysqli_fetch_assoc($product3)){
         $image3 = $row3['catalog_image'];
         $name3 = $row3['catalog_name'];
         $row_image3 = $row3['product_upload_image'];
         $quantity3 = $row3['product_quantity'];
         $customer_image3 = basename($row_image3);
     }
         $amount3 = 45;
         $shipping = 35;
 
         $customer_id = $_SESSION['customer_id'];
         $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
    ?>

    <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id3=<?=$catalog_id3?>"><?= $name3 ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>


            <div class="checkout">
                <h1 class="checkout-header">Checkout</h1>
            <div class="checkout-left-right">
                    <div class="checkout-left">
                            <img src="../customer-image/<?= $customer_image3 ?>" width="100%" height="200px" alt="">
                            <input type="hidden" name="customer-image3" value="<?= $customer_image3 ?>">
                    </div>
                    
                    <div class="checkout-right">
                        <div class="first-column">
                            <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                <h1> No address, please set your address in account settings</h1>
                            <?php }else{ ?>
                                <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                    <input type="hidden" name="names3" value="<?= $address['names'];?>">
                                <div class="address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                        <input type="hidden" name="address3" value="<?= $address['address']; ?>">
                                        <input type="hidden" name="city3" value="<?= $address['city']; ?>">
                                        <input type="hidden" name="zipcode3" value="<?= $address['zipcode']; ?>">
                                        <input type="hidden" name="country3" value="<?= $address['country']; ?>">
                                </div>
                            <div class="phone">
                                <i class="fa-solid fa-phone"></i>
                                <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                <input type="hidden" name="phone_number3" value="<?= $address['phone_number'];?>">
                            </div>
                            <?php } ?>
                        </div>

                        <div class="select-type">
                                <h3>Select receive type: </h3>
                                <select name="receive-type3" id="">
                                    <option value="Delivery">Delivery</option>
                                    <option value="Pickup">Pick up</option>
                                </select>
                        </div>    

                
                        <div class="second-column">
                            <div class="second-column-left">
                                    <h1>Product Details</h1>
                                
                                        <div class="product-details">
                                            <p>Customized - <span><?= $name3?></span></p>
                                            <input type="hidden" name="customize-product3" value="<?= $name3?>">
                                            <p>File name - <span><?= $customer_image3?></span></p>
                                            <input type="hidden" name="customer-image3" value="<?= $customer_image3?>">
                                        </div>
                                    
                            </div>
                            <div class="second-column-right">
                                    <div class="second-column-right-top">
                                        <table>
                                            <div class="quantity">
                                                <tr>
                                                    <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                    <th style="padding: 5px;"><h1>Amount</h1></th>
                                                    <th style="padding: 5px;"><h1>Price</h1></th>
                                                    <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                        <div class="quantity-details">
                                                        
                                                        </div>
                                                </tr>
                                            </div>
                                            <div class="amount">
                                                <tr>
                                                    <th><?= $quantity3 ?></th>
                                                    <input type="hidden" name="quantity3" value="<?=$quantity3 ?>">
                                                    <th><?php echo $amounts = number_format($quantity3*$amount3); ?></th>
                                                    <th><?= $amount3 ?></th>
                                                    <th><?= $amounts3 = $amounts+$amount3 ?></th>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                    <div class="second-column-right-bottom">
                                        <h1>Merchandise Total: <span><?= $amounts3 ?></span></h1>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="payment-method">
                            <h1>Select payment method: </h1> 
                                <select name="payment-method3" id="">
                                    <option value="COD">Payment1(COD)</option>
                                </select>
                        </div>

                        <div class="order-total">
                            <div class="order-total-price">
                                <table width="70%">
                                    <tr>
                                        <th>Merchandise Total</th>
                                        <th><?= $amounts3 ?></th>
                                    </tr>
                                    <tr>
                                        <th>Shipping Subtotal</th>
                                        <th><?= $shipping ?></th>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <th><?php echo $order_total3 = $amounts3 + $shipping; ?></th>
                                        <input type="hidden" name="order-total3" value="<?= $order_total3 ?>">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="place-order">
                            <button name="place-order3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }else if(isset($_GET['catalog_id4']) == 4){
     $catalog_id4 = $_GET['catalog_id4'];
     $area_print4 = $_GET['print-area4'];
     $customer_image4 = $_GET['customer_image4'];
     $product4 = mysqli_query($conn, "SELECT * FROM product4 WHERE catalog_id = '$catalog_id4'");
     while($row4 = mysqli_fetch_assoc($product4)){
         $image4 = $row4['catalog_image'];
         $name4 = $row4['catalog_name'];
         $print_area4 = $row4['product_print_area'];
         $row_image4 = $row4['product_upload_image'];
         $quantity4 = $row4['product_quantity'];
         $customer_image4 = basename($row_image4);
     }
         $imageURL4 = "images/totebag.png";
 
         $customer_id = $_SESSION['customer_id'];
         $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
     ?>

    <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id4=<?=$catalog_id4?>"><?= $name4 ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>


            <div class="checkout">
                <h1 class="checkout-header">Checkout</h1>
                <div class="checkout-left-right">
                        <div class="checkout-left">
                                <?php if(!empty($_GET['print-area4'])){?> 
                                        <img src="<?= $imageURL4 ?>" width="400" height="450" style="position: relative;" alt="">
                                            <?php
                                                echo'<img src="../customer-image/'. $customer_image4 .'" class="layer-image" style="';
                                                switch($area_print4) {
                                                    case 'Full':
                                                            echo"width: 200px;height: 225px;top: 60%; left:51%;transform:translate(-49%,-40%);";
                                                                $print_area_width4 = 1800;
                                                                $print_area_height4 = 2300;
                                                                $print_area_position_hori4 = 1200;
                                                                $print_area_position_verti4 = 1600;
                                                                $price4 = 70;
                                                                $amount4 = 70;
                                                                $shipping = 40;
                                                        break;
                                                    case 'Medium':
                                                        echo "width: 130px; height: 130px; top: 60%; left: 50.9%; transform: translate(-49.1%,-40%);";    
                                                                $print_area_width4 = 1500;
                                                                $print_area_height4 = 1500;
                                                                $print_area_position_hori4 = 1300;
                                                                $print_area_position_verti4 = 2200;
                                                                $amount4 = 55;
                                                                $price4 = 70;
                                                                $shipping = 30;
                                                        break;
                                                    case 'Portrait':
                                                        echo "width: 140px; height: 190px; top: 60%; left: 50.9%; transform: translate(-49.1%,-40%);";
                                                                $print_area_width4 = 1300;
                                                                $print_area_height4 = 2300;
                                                                $print_area_position_hori4 = 1450;
                                                                $print_area_position_verti4 = 1850;
                                                                $amount4 = 60;
                                                                $price4 = 70;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Banner':
                                                        echo "width: 190px; height: 140px; top: 60%; left: 50.9%; transform: translate(-49.1%,-40%);";
                                                                $print_area_width4 = 2100;
                                                                $print_area_height4 = 1300;
                                                                $print_area_position_hori4 = 1030;
                                                                $print_area_position_verti4 = 2200;
                                                                $amount4 = 50;
                                                                $price4 = 70;
                                                                $shipping = 35;
                                                        break;
                                                }
                                                echo'">';
                                            ?>
                                            <input type="hidden" name="customer-image4" value="<?= $customer_image4 ?>">
                                            <?php

                                                    $customer_image4 = $_GET['customer_image4'];

                                                    $imagePath4 = "images/";

                                                    $baseImage4 = imagecreatefrompng($imageURL4);

                                                    $overlayImage4 = imagecreatefrompng("../customer-image/$customer_image4");

                                                    $overlayWidth4 = $print_area_width4;
                                                    $overlayHeight4 = $print_area_height4;

                                                    $overlayResized4 = imagescale($overlayImage4, $overlayWidth4, $overlayHeight4);

                                                    imagecopy($baseImage4, $overlayResized4,  $print_area_position_hori4,  $print_area_position_verti4, 0, 0, $overlayWidth4, $overlayHeight4);

                                                    $mergedImagePath4 = "../customer-finish-product/";
                                                    
                                                    $baseFilename4 = "merged_image";

                                                    $fileExtension4 = ".png";

                                                    $counter4 = 1;

                                                    $filename4 = $baseFilename4 . $fileExtension4;

                                                    while (file_exists($mergedImagePath4 . $filename4)) {

                                                        $counter4++;
                                                        $filename4 = $baseFilename4 . $counter4 . $fileExtension4;
                                                    }

                                                    imagepng($baseImage4, $mergedImagePath4 . $filename4);

                                                    imagedestroy($baseImage4);
                                                    imagedestroy($overlayImage4);
                                        ?>
                                        <input type="hidden" name="merge-image4" value="<?= $filename4 ?>">
                                        <input type="hidden" name="mergedImagePath4" value="<?= $mergedImagePath4 ?>">
                                <?php }?> 
                        </div>
                        
                        <div class="checkout-right">
                            <div class="first-column">
                                <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                    <h1> No address, please set your address in account settings</h1>
                                <?php }else{ ?>
                                    <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                        <input type="hidden" name="names4" value="<?= $address['names'];?>">
                                    <div class="address">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                            <input type="hidden" name="address4" value="<?= $address['address']; ?>">
                                            <input type="hidden" name="city4" value="<?= $address['city']; ?>">
                                            <input type="hidden" name="zipcode4" value="<?= $address['zipcode']; ?>">
                                            <input type="hidden" name="country4" value="<?= $address['country']; ?>">
                                    </div>
                                    <div class="phone">
                                    <i class="fa-solid fa-phone"></i>
                                    <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                    <input type="hidden" name="phone_number4" value="<?= $address['phone_number'];?>">
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="select-type">
                                    <h3>Select receive type: </h3>
                                    <select name="receive-type4" id="">
                                        <option value="Delivery">Delivery</option>
                                        <option value="Pickup">Pick up</option>
                                    </select>
                            </div>    

                    
                            <div class="second-column">
                                <div class="second-column-left">
                                            <h1>Product Details</h1>
                                    
                                            <div class="product-details">
                                                <p>Customized - <span><?= $name4?></span></p>
                                                <input type="hidden" name="customize-product4" value="<?= $name4?>">
                                                <p>Print Area - <span><?= $print_area4 ?></span></p>
                                                <input type="hidden" name="product-print-area4" value="<?= $print_area4 ?>">
                                                <p>File name - <span><?= $customer_image4?></span></p>
                                            </div>
                                </div>
                                <div class="second-column-right">
                                        <div class="second-column-right-top">
                                            <table>
                                                <div class="quantity">
                                                    <tr>
                                                        <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                        <th style="padding: 5px;"><h1>Amount</h1></th>
                                                        <th style="padding: 5px;"><h1>Price</h1></th>
                                                        <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                            <div class="quantity-details">
                                                            
                                                            </div>
                                                    </tr>
                                                </div>
                                                <div class="amount">
                                                    <tr>
                                                        <th><?= $quantity4 ?></th>
                                                        <input type="hidden" name="quantity4" value="<?= $quantity4 ?>">
                                                        <th><?php echo $amounts = number_format($quantity4*$amount4); ?></th>
                                                        <th style="padding: 5px;"><?= $price4 ?></th>
                                                        <th><?= $amountss = $amounts+$price4 ?></th>
                                                    </tr>
                                                </div>
                                            </table>
                                        </div>
                                        <div class="second-column-right-bottom">
                                            <h1>Merchandise Total: <span><?= $amountss ?></span></h1>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="payment-method">
                                <h1>Select payment method: </h1> 
                                    <select name="payment-method4" id="">
                                        <option value="COD">Payment1(COD)</option>
                                    </select>
                            </div>

                            <div class="order-total">
                                <div class="order-total-price">
                                    <table width="70%">
                                        <tr>
                                            <th>Merchandise Total</th>
                                            <th><?= $amountss ?></th>
                                        </tr>
                                        <tr>
                                            <th>Shipping Subtotal</th>
                                            <th><?= $shipping ?></th>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <th><?php echo $amountsss = $amountss + $shipping; ?></th>
                                            <input type="hidden" name="order-total4" value="<?= $amountsss ?>">
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="place-order">
                                <button name="place-order4">Place Order</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>
<?php }else if(isset($_GET['catalog_id5']) == 5){
    $catalog_id5 = $_GET['catalog_id5'];
    $customer_image5 = $_GET['customer_image5'];
    $product5 = mysqli_query($conn, "SELECT * FROM product5 WHERE catalog_id = '$catalog_id5'");
    while($row5 = mysqli_fetch_assoc($product5)){
        $image5 = $row5['catalog_image'];
        $name5 = $row5['catalog_name'];
        $row_image5 = $row5['product_upload_image'];
        $quantity5 = $row5['product_quantity'];
        $imageURL5 = "images/coinpurse.png";
        $customer_image5 = basename($row_image5);
    }
        $amount5 = 45;
        $shipping = 35;

        $customer_id = $_SESSION['customer_id'];
        $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
   ?>
    <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id5=<?=$catalog_id5?>"><?= $name5 ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>


            <div class="checkout">
                <h1 class="checkout-header">Checkout</h1>
            <div class="checkout-left-right">
                    <div class="checkout-left" style="position: relative;">
                            <img src="<?= $imageURL5 ?>" width="400" height="450" alt="">
                                <?php echo'<img src="../customer-image/'. $customer_image5 .'" class="layer-image" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%); width:210px; height:140px;"';?>
                            <input type="hidden" name="customer-image5" value="<?= $customer_image5 ?>">
                            <?php
                                $customer_image5 = $_GET['customer_image5'];
                                
                                $imagePath5 = "images/";

                                $baseImage5 = imagecreatefrompng($imageURL5);

                                $overlayImage5 = imagecreatefrompng("../customer-image/$customer_image5");

                                $overlayWidth5 = 2000;
                                $overlayHeight5 = 1500;
                                $print_area_position_hori5 = 950;
                                $print_area_position_verti5 = 1600;

                                $overlayResized5 = imagescale($overlayImage5, $overlayWidth5, $overlayHeight5);

                                imagecopy($baseImage5, $overlayResized5,  $print_area_position_hori5,  $print_area_position_verti5, 0, 0, $overlayWidth5, $overlayHeight5);

                                $mergedImagePath5 = "../customer-finish-product/";
                               
                                $baseFilename5 = "merged_image";

                                $fileExtension5 = ".png";

                                $counter5 = 1;

                                $filename5 = $baseFilename5 . $fileExtension5;

                                while (file_exists($mergedImagePath5 . $filename5)) {
                                    $counter5++;
                                    $filename5 = $baseFilename5 . $counter5 . $fileExtension5;
                                }

                                imagepng($baseImage5, $mergedImagePath5 . $filename5);

                                imagedestroy($baseImage5);
                                imagedestroy($overlayImage5);
                            ?>
                                <input type="hidden" name="merge-image5" value="<?= $filename5 ?>">
                                <input type="hidden" name="mergedImagePath5" value="<?= $mergedImagePath5 ?>">
                    </div>
                    
                    <div class="checkout-right">
                        <div class="first-column">
                            <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                <h1> No address, please set your address in account settings</h1>
                            <?php }else{ ?>
                                <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                    <input type="hidden" name="names5" value="<?= $address['names'];?>">
                                <div class="address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                        <input type="hidden" name="address5" value="<?= $address['address']; ?>">
                                        <input type="hidden" name="city5" value="<?= $address['city']; ?>">
                                        <input type="hidden" name="zipcode5" value="<?= $address['zipcode']; ?>">
                                        <input type="hidden" name="country5" value="<?= $address['country']; ?>">
                                </div>
                                <div class="phone">
                                    <i class="fa-solid fa-phone"></i>
                                    <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                    <input type="hidden" name="phone_number5" value="<?= $address['phone_number'];?>">
                                </div>
                            <?php } ?>
                        </div>

                            <div class="select-type">
                                    <h3>Select receive type: </h3>
                                    <select name="receive-type5" id="">
                                        <option value="Delivery">Delivery</option>
                                        <option value="Pickup">Pick up</option>
                                    </select>
                            </div>    

                
                        <div class="second-column">
                            <div class="second-column-left">
                                    <h1>Product Details</h1>
                                    <div class="product-details">
                                        <p>Customized - <span><?= $name5?></span></p>
                                        <input type="hidden" name="customize-product5" value="<?= $name5?>">
                                        <p>File name - <span><?= $customer_image5?></span></p>
                                        <input type="hidden" name="customer-image5" value="<?= $customer_image5?>">
                                    </div>        
                            </div>
                            <div class="second-column-right">
                                    <div class="second-column-right-top">
                                        <table>
                                            <div class="quantity">
                                                <tr>
                                                    <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                    <th style="padding: 5px;"><h1>Amount</h1></th>
                                                    <th style="padding: 5px;"><h1>Price</h1></th>
                                                    <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                        <div class="quantity-details">
                                                        
                                                        </div>
                                                </tr>
                                            </div>
                                            <div class="amount">
                                                <tr>
                                                    <th><?= $quantity5 ?></th>
                                                    <input type="hidden" name="quantity5" value="<?=$quantity5 ?>">
                                                    <th><?php echo $amounts = number_format($quantity5*$amount5); ?></th>
                                                    <th><?= $amount5 ?></th>
                                                    <th><?= $amounts5 = $amounts+$amount5 ?></th>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                    <div class="second-column-right-bottom">
                                        <h1>Merchandise Total: <span><?= $amounts5 ?></span></h1>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="payment-method">
                            <h1>Select payment method: </h1> 
                                <select name="payment-method5" id="">
                                    <option value="COD">Payment1(COD)</option>
                                </select>
                        </div>

                        <div class="order-total">
                            <div class="order-total-price">
                                <table width="70%">
                                    <tr>
                                        <th>Merchandise Total</th>
                                        <th><?= $amounts5 ?></th>
                                    </tr>
                                    <tr>
                                        <th>Shipping Subtotal</th>
                                        <th><?= $shipping ?></th>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <th><?php echo $order_total5 = $amounts5 + $shipping; ?></th>
                                        <input type="hidden" name="order-total5" value="<?= $order_total5 ?>">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="place-order">
                            <button name="place-order5">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }else if(isset($_GET['catalog_id6']) == 6){  
        $catalog_id6 = $_GET['catalog_id6'];
        $customer_image6 = $_GET['customer_image6'];
        $product6 = mysqli_query($conn, "SELECT * FROM product6 WHERE catalog_id = '$catalog_id6`'");
        while($row6 = mysqli_fetch_assoc($product6)){
            $image6 = $row6['catalog_image'];
            $name6 = $row6['catalog_name'];
            $row_image6 = $row6['product_upload_image'];
            $quantity6 = $row6['product_quantity'];
            $customer_image6 = basename($row_image6);
        }
            $amount6 = 35;
            $shipping = 35;
    
            $customer_id = $_SESSION['customer_id'];
            $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
   ?>
    <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id6=<?=$catalog_id6?>"><?= $name6 ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>


            <div class="checkout">
                <h1 class="checkout-header">Checkout</h1>
                <div class="checkout-left-right">
                        <div class="checkout-left">
                                <img src="../customer-image/<?= $customer_image6 ?>" width="100%" height="200px" alt="">
                                <input type="hidden" name="customer-image6" value="<?= $customer_image6 ?>">
                        </div>
                        
                        <div class="checkout-right">
                                <div class="first-column">
                                <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                <h1> No address, please set your address in account settings</h1>
                            <?php }else{ ?>
                                        <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                            <input type="hidden" name="names6" value="<?= $address['names'];?>">
                                    <div class="address">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                                <input type="hidden" name="address6" value="<?= $address['address']; ?>">
                                                <input type="hidden" name="city6" value="<?= $address['city']; ?>">
                                                <input type="hidden" name="zipcode6" value="<?= $address['zipcode']; ?>">
                                                <input type="hidden" name="country6" value="<?= $address['country']; ?>">
                                    </div>
                                    <div class="phone">
                                        <i class="fa-solid fa-phone"></i>
                                        <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                            <input type="hidden" name="phone_number6" value="<?= $address['phone_number'];?>">
                                    </div>
                                <?php } ?>
                                </div>

                                <div class="select-type">
                                        <h3>Select receive type: </h3>
                                        <select name="receive-type6" id="">
                                            <option value="Delivery">Delivery</option>
                                            <option value="Pickup">Pick up</option>
                                        </select>
                                </div>    

                        
                                <div class="second-column">
                                    <div class="second-column-left">
                                            <h1>Product Details</h1>
                                        
                                                <div class="product-details">
                                                    <p>Customized - <span><?= $name6?></span></p>
                                                    <input type="hidden" name="customize-product6" value="<?= $name6?>">
                                                    <p>File name - <span><?= $customer_image6?></span></p>
                                                    <input type="hidden" name="customer-image6" value="<?= $customer_image6?>">
                                                </div>
                                            
                                    </div>
                                    <div class="second-column-right">
                                            <div class="second-column-right-top">
                                                <table>
                                                    <div class="quantity">
                                                        <tr>
                                                            <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                            <th style="padding: 5px;"><h1>Amount</h1></th>
                                                            <th style="padding: 5px;"><h1>Price</h1></th>
                                                            <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                                <div class="quantity-details">
                                                                
                                                                </div>
                                                        </tr>
                                                    </div>
                                                    <div class="amount">
                                                        <tr>
                                                            <th><?= $quantity6 ?></th>
                                                            <input type="hidden" name="quantity6" value="<?=$quantity6 ?>">
                                                            <th><?php echo $amounts = number_format($quantity6*$amount6); ?></th>
                                                            <th><?= $amount6 ?></th>
                                                            <th><?= $amounts6 = $amounts+$amount6 ?></th>
                                                        </tr>
                                                    </div>
                                                </table>
                                            </div>
                                            <div class="second-column-right-bottom">
                                                <h1>Merchandise Total: <span><?= $amounts6 ?></span></h1>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="payment-method">
                                    <h1>Select payment method: </h1> 
                                        <select name="payment-method6" id="">
                                            <option value="COD">Payment1(COD)</option>
                                        </select>
                                </div>

                                <div class="order-total">
                                    <div class="order-total-price">
                                        <table width="70%">
                                            <tr>
                                                <th>Merchandise Total</th>
                                                <th><?= $amounts6 ?></th>
                                            </tr>
                                            <tr>
                                                <th>Shipping Subtotal</th>
                                                <th><?= $shipping ?></th>
                                            </tr>
                                            <tr>
                                                <th>Order Total</th>
                                                <th><?php echo $order_total6 = $amounts6 + $shipping; ?></th>
                                                <input type="hidden" name="order-total6" value="<?= $order_total6 ?>">
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="place-order">
                                    <button name="place-order6">Place Order</button>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </form>
    
<?php }else if(isset($_GET['catalog_id7']) == 7){  
    $catalog_id7 = $_GET['catalog_id7'];
    $customer_image7 = $_GET['customer-image7'];
    $area_print7 = $_GET['print-area7'];
    $product7 = mysqli_query($conn, "SELECT * FROM product7 WHERE catalog_id = '$catalog_id7'");
    while($row7 = mysqli_fetch_assoc($product7)){
        $image7 = $row7['catalog_image'];
        $name7 = $row7['catalog_name'];
        $color7 = $row7['product_color'];
        $color7 = $_GET['color'];
        switch ($color7) {
            case 'Black':
                    $imageURL7 = "images/tumbler-black.png";
            break;
            case 'Blue':
                    $imageURL7 = "images/tumbler-blue.png";
            break;
            case 'White':
                    $imageURL7 = "images/tumbler-white.png";
            break;
            case 'Red':
                    $imageURL7 = "images/tumbler-red.png";
            break;
        }
        $row_image7 = $row7['product_upload_image'];
        $quantity7 = $row7['product_quantity'];
        $customer_image7 = basename($row_image7);
    }

        $customer_id = $_SESSION['customer_id'];
        $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
   ?>
    <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id7=<?=$catalog_id7?>"><?= $name7 ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>

            <div class="checkout">
                    <h1 class="checkout-header">Checkout</h1>
                <div class="checkout-left-right">
                    <div class="checkout-left">
                        <?php if(!empty($_GET['print-area7'])){?> 
                                <img src="<?= $imageURL7 ?>" width="400" height="450" style="position: relative;" alt="">
                                            <?php
                                                echo'<img src="../customer-image/'. $customer_image7 .'" class="layer-image" style="';
                                                switch($area_print7) {
                                                    case 'Full':
                                                            echo"width: 80px;height: 240px;top: 53%; left:50%;transform:translate(-50%,-47%);";
                                                                $print_area_width7 = 850;
                                                                $print_area_height7 = 2650;
                                                                $print_area_position_hori7 = 1580;
                                                                $print_area_position_verti7 = 1150;
                                                                $price7 = 70;
                                                                $amount7 = 60;
                                                                $shipping = 35;
                                                        break;
                                                    case 'Medium':
                                                            echo"width: 52px;height: 170px;top: 55%; left:50%;transform:translate(-50%,-45%);";
                                                                $print_area_width7 = 600;
                                                                $print_area_height7 = 1900;
                                                                $print_area_position_hori7 = 1700;
                                                                $print_area_position_verti7 = 1650;
                                                                $amount7 = 50;
                                                                $price7 = 70;
                                                                $shipping = 30;
                                                        break;
                                                    case 'Icon':
                                                            echo"width: 50px;height: 60px;top: 39%; left:50%;transform:translate(-50%,-61%);";
                                                                $print_area_width7 = 500;
                                                                $print_area_height7 = 600;
                                                                $print_area_position_hori7 = 1750;
                                                                $print_area_position_verti7 = 1350;
                                                                $amount7 = 35;
                                                                $price7 = 70;
                                                                $shipping = 20;
                                                        break;
                                                    case 'Bottom':
                                                            echo"width: 85px;height: 50px;top: 76%; left:50%;transform:translate(-50%,-24%);";
                                                                $print_area_width7 = 910;
                                                                $print_area_height7 = 500;
                                                                $print_area_position_hori7 = 1540;
                                                                $print_area_position_verti7 = 3330;
                                                                $amount7 = 40;
                                                                $price7 = 70;
                                                                $shipping = 25;
                                                        break;
                                                }
                                                echo'">';
                                            ?>
                                             <input type="hidden" name="customer-image7" value="<?= $customer_image7 ?>">
                                            <?php

                                            $customer_image7 = $_GET['customer-image7'];

                                            $imagePath7 = "images/";

                                            $baseImage7 = imagecreatefrompng($imageURL7);

                                            $overlayImage7 = imagecreatefrompng("../customer-image/$customer_image7");

                                            $overlayWidth7 = $print_area_width7;
                                            $overlayHeight7 = $print_area_height7;

                                            $overlayResized7 = imagescale($overlayImage7, $overlayWidth7, $overlayHeight7);

                                            imagecopy($baseImage7, $overlayResized7,  $print_area_position_hori7,  $print_area_position_verti7, 0, 0, $overlayWidth7, $overlayHeight7);

                                            $mergedImagePath7 = "../customer-finish-product/";

                                            $baseFilename7 = "merged_image";

                                            $fileExtension7 = ".png";

                                            $counter7 = 1;

                                            $filename7 = $baseFilename7 . $fileExtension7;

                                            while (file_exists($mergedImagePath7 . $filename7)) {

                                                $counter7++;
                                                $filename7 = $baseFilename7 . $counter7 . $fileExtension7;
                                            }

                                            imagepng($baseImage7, $mergedImagePath7 . $filename7);

                                            imagedestroy($baseImage7);
                                            imagedestroy($overlayImage7);
                                            ?>
                                            <input type="hidden" name="merge-image7" value="<?= $filename7 ?>">
                                            <input type="hidden" name="mergedImagePath7" value="<?= $mergedImagePath7 ?>">                
                        <?php }?> 
                    </div>
                    
                    <div class="checkout-right">
                        <div class="first-column">
                            <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                <h1> No address, please set your address in account settings</h1>
                            <?php }else{ ?>
                                <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                    <input type="hidden" name="names7" value="<?= $address['names'];?>">
                                <div class="address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                        <input type="hidden" name="address7" value="<?= $address['address']; ?>">
                                        <input type="hidden" name="city7" value="<?= $address['city']; ?>">
                                        <input type="hidden" name="zipcode7" value="<?= $address['zipcode']; ?>">
                                        <input type="hidden" name="country7" value="<?= $address['country']; ?>">
                                </div>
                                <div class="phone">
                                    <i class="fa-solid fa-phone"></i>
                                    <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                    <input type="hidden" name="phone_number7" value="<?= $address['phone_number'];?>">
                                </div>
                            <?php } ?>
                        </div>

                        <div class="select-type">
                                <h3>Select receive type: </h3>
                                <select name="receive-type7" id="">
                                    <option value="Delivery">Delivery</option>
                                    <option value="Pickup">Pick up</option>
                                </select>
                        </div>    

                
                        <div class="second-column">
                            <div class="second-column-left">
                                    <h1>Product Details</h1>
                                
                                        <div class="product-details">
                                            <p>Customized - <span><?= $name7?></span></p>
                                            <input type="hidden" name="customize-product7" value="<?= $name7?>">
                                            <p>Color - <span><?= $color7 ?></span></p>
                                            <input type="hidden" name="color7" value="<?= $color7?>">
                                            <p>Print Area - <span><?= $area_print7 ?></span></p>
                                            <input type="hidden" name="product-print-area7" value="<?= $area_print7 ?>">
                                            <p>File name - <span><?= $customer_image7?></span></p>
                                        </div>       
                            </div>
                            <div class="second-column-right">
                                    <div class="second-column-right-top">
                                        <table>
                                            <div class="quantity">
                                                <tr>
                                                    <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                    <th style="padding: 5px;"><h1>Amount</h1></th>
                                                    <th style="padding: 5px;"><h1>Price</h1></th>
                                                    <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                        <div class="quantity-details">
                                                        
                                                        </div>
                                                </tr>
                                            </div>
                                            <div class="amount">
                                                <tr>
                                                    <th><?= $quantity7 ?></th>
                                                    <input type="hidden" name="quantity7" value="<?= $quantity7 ?>">
                                                    <th><?php echo $amounts = number_format($quantity7*$amount7); ?></th>
                                                    <th><?= $price7 ?></th>
                                                    <th><?= $amounts7 = $amounts + $price7 ?></th>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                    <div class="second-column-right-bottom">
                                        <h1>Merchandise Total: <span><?= $amounts7 ?></span></h1>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="payment-method">
                            <h1>Select payment method: </h1> 
                                <select name="payment-method7" id="">
                                    <option value="COD">Payment1(COD)</option>
                                </select>
                        </div>

                        <div class="order-total">
                            <div class="order-total-price">
                                <table width="70%">
                                    <tr>
                                        <th>Merchandise Total</th>
                                        <th><?= $amounts7 ?></th>
                                    </tr>
                                    <tr>
                                        <th>Shipping Subtotal</th>
                                        <th><?= $shipping ?></th>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <th><?php echo $total7 = $amounts7 + $shipping; ?></th>
                                        <input type="hidden" name="order-total7" value="<?= $total7 ?> ">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="place-order">
                            <button name="place-order7">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }else if(isset($_GET['catalog_id8']) == 8){  
     $catalog_id8 = $_GET['catalog_id8'];
     $product8 = mysqli_query($conn, "SELECT * FROM product8 WHERE catalog_id = '$catalog_id8`'");
     while($row8 = mysqli_fetch_assoc($product8)){
         $image8 = $row8['catalog_image'];
         $name8 = $row8['catalog_name'];
         $row_image8 = $row8['product_upload_image'];
         $quantity8 = $row8['product_quantity'];
         $customer_image8 = basename($row_image8);
     }
         $amount8 = 40;
         $shipping = 30;
 
         $customer_id = $_SESSION['customer_id'];
         $address = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = $customer_id"));
   ?>
     <form action="" method="post">
        <div class="content">
            <div class="content-header">
            <h2><a href="userpage.php">Home</a> <span>></span> <a href="products.php?catalog_id8=<?=$catalog_id8?>"><?= $name8 ?></a> <span>></span> <a href="javascript:self.history.back()">Preview</a> <span>></span> Order</h2>
            </div>


            <div class="checkout">
                <h1 class="checkout-header">Checkout</h1>
            <div class="checkout-left-right">
                    <div class="checkout-left">
                            <img src="../customer-image/<?= $customer_image8 ?>" width="100%" height="200px" style="border-radius: 15px;" alt="">
                            <input type="hidden" name="customer-image8" value="<?= $customer_image8 ?>">
                    </div>
                    
                    <div class="checkout-right">
                        <div class="first-column">
                            <?php if(empty($address['name']) && empty($address['address'])){ ?>
                                <h1> No address, please set your address in account settings</h1>
                            <?php }else{ ?>
                                        <h1>Name: <span><?php if(!empty($address['names'])){ echo $address['names'];} ?></span></h1>
                                            <input type="hidden" name="names8" value="<?= $address['names'];?>">
                                    <div class="address">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p><?php if(!empty($address['address'])){ echo $address['address'];}?>, <?php if(!empty($address['city'])){ echo $address['city'];} ?>, <?php if(!empty($address['zipcode'])){ echo $address['zipcode'];} ?> <?php if(!empty($address['country'])){ echo $address['country'];} ?></p>
                                                <input type="hidden" name="address8" value="<?= $address['address']; ?>">
                                                <input type="hidden" name="city8" value="<?= $address['city']; ?>">
                                                <input type="hidden" name="zipcode8" value="<?= $address['zipcode']; ?>">
                                                <input type="hidden" name="country8" value="<?= $address['country']; ?>">
                                    </div>
                                    <div class="phone">
                                        <i class="fa-solid fa-phone"></i>
                                        <p><?php if(!empty($address['phone_number'])){ echo $address['phone_number'];} ?></p>
                                            <input type="hidden" name="phone_number8" value="<?= $address['phone_number'];?>">
                                    </div>
                            <?php } ?>
                        </div>

                        <div class="select-type">
                                <h3>Select receive type: </h3>
                                <select name="receive-type8" id="">
                                    <option value="Delivery">Delivery</option>
                                    <option value="Pickup">Pick up</option>
                                </select>
                        </div>    

                
                        <div class="second-column">
                            <div class="second-column-left">
                                    <h1>Product Details</h1>
                                
                                        <div class="product-details">
                                            <p>Customized - <span><?= $name8?></span></p>
                                            <input type="hidden" name="customize-product8" value="<?= $name8?>">
                                            <p>File name - <span><?= $customer_image8?></span></p>
                                            <input type="hidden" name="customer-image8" value="<?= $customer_image8?>">
                                        </div>
                                    
                            </div>
                            <div class="second-column-right">
                                    <div class="second-column-right-top">
                                        <table>
                                            <div class="quantity">
                                                <tr>
                                                    <th style="padding: 5px;"><h1>Quantity</h1></th>
                                                    <th style="padding: 5px;"><h1>Amount</h1></th>
                                                    <th style="padding: 5px;"><h1>Price</h1></th>
                                                    <th style="padding: 5px;"><h1>Subtotal</h1></th>
                                                        <div class="quantity-details">
                                                        
                                                        </div>
                                                </tr>
                                            </div>
                                            <div class="amount">
                                                <tr>
                                                    <th><?= $quantity8 ?></th>
                                                    <input type="hidden" name="quantity8" value="<?=$quantity8 ?>">
                                                    <th><?php echo $amounts = number_format($quantity8*$amount8); ?></th>
                                                    <th><?= $amount8 ?></th>
                                                    <th><?= $amounts8 = $amounts+$amount8 ?></th>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                    <div class="second-column-right-bottom">
                                        <h1>Merchandise Total: <span><?= $amounts8 ?></span></h1>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="payment-method">
                            <h1>Select payment method: </h1> 
                                <select name="payment-method8" id="">
                                    <option value="COD">Payment1(COD)</option>
                                </select>
                        </div>

                        <div class="order-total">
                            <div class="order-total-price">
                                <table width="70%">
                                    <tr>
                                        <th>Merchandise Total</th>
                                        <th><?= $amounts8 ?></th>
                                    </tr>
                                    <tr>
                                        <th>Shipping Subtotal</th>
                                        <th><?= $shipping ?></th>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <th><?php echo $order_total8 = $amounts8 + $shipping; ?></th>
                                        <input type="hidden" name="order-total8" value="<?= $order_total8 ?>">
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="place-order">
                            <button name="place-order8">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
                                                     
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
        width: 100%;
        height: 100%;
    }
    .content .content-header{
        display: flex;
        height: 40px;
        align-items: center;
        padding-left: 3%;
    }
    .content .content-header h2{
        font-size: 25px;
    }
    .content .content-header h2 a{
        color: #E16C69;
        text-decoration: none;
    }
    .content .checkout{
        width: 100%;
        position: relative;
    }
    .content .checkout .checkout-header{
        text-align: center;
        font-size: 50px;
    }
    .content .checkout .checkout-left-right{
        display: flex;
        width: 100%;
        height: 100%;
    }
    .content .checkout .checkout-left{
        width: 30%;
        height: 100%;
        display: flex;
        border: 1px solid black;
        flex-direction: column;
        padding: 0 10px;
        position: relative;
    }
    .content .checkout .checkout-left .front-area{
        width: 100%;
        height: auto;
        position: relative;
    }
    .content .checkout .checkout-left .layer-image{
        position: absolute;
    }
    .content .checkout .checkout-left .back-area{
        width: 100%;
        height: 100%;
        position: relative;
    }
    .content .checkout .checkout-left .back-area .layer-image{
        position: absolute;
    }
    .content .checkout .checkout-left .layer-image{
        position: absolute;
    }
    .content .checkout .checkout-right{
        width: 70%;
        padding: 10px;
    }
    .content .checkout .checkout-right .first-column{
        background: #eeeceb;
        padding: 10px;
    }
    .content .checkout .checkout-right .first-column .select-type{
        display: flex;
        align-items: center;
        height: 40px;
        gap: 30px;
    }
    .content .checkout .checkout-right .first-column .select-type .type-btn{
        display: flex;
        gap: 20px;
    }
    .content .checkout .checkout-right .first-column .select-type .type-btn button{
        font-size: 18px;
        padding: 4px 10px;
        border-radius: 50px;
        border: none;
        background: #f6f6f6;
    }
    .content .checkout .checkout-right .first-column .address{
        display: flex;
        align-items: center;
        height: 40px;
        gap: 10px;
    }
    .content .checkout .checkout-right .first-column .address i{
        font-size: 30px;
        color: red;
    }
    .content .checkout .checkout-right .first-column .address p{
        font-size: 19px;
    }
    .content .checkout .checkout-right .first-column .phone{
        display: flex;
        height: 40px;
        align-items: center;
        gap: 10px
    }
    .content .checkout .checkout-right .first-column .phone i{
        font-size: 30px;
    }
    .content .checkout .checkout-right .first-column .phone p{
        font-size: 19px;
    }
    .content .checkout .checkout-right .second-column{
        padding: 10px;
        display: flex;
        background: #eeeceb;
        margin-top: 10px; 
    }
    .content .checkout .checkout-right .second-column .second-column-left{
        width: 35%;
    }
    .content .checkout .checkout-right .second-column .second-column-left .product-details p{
        margin: 8px 0;
    }
    .content .checkout .checkout-right .second-column .second-column-right{
        width: 65%;
        border-left: 2px solid white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .content .checkout .checkout-right .second-column .second-column-right-top{
        display: flex;
        justify-content: center;
        height: 100%;
    }
    .content .checkout .checkout-right .second-column .second-column-right-top p{
        text-align: center;
        margin: 8px;
    }
    .content .checkout .checkout-right .second-column .second-column-right-bottom{     
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;    
        border-top: 2px solid white;
    }
    .content .checkout .checkout-right .second-column p{
        font-size: 20px;
    }
    .content .checkout .checkout-right .payment-method{
        display: flex;
        height: 60px;
        align-items: center;
        width: 100%;
    }
    .content .checkout .checkout-right .payment-method h1{
        width: 45%;
    }
    .content .checkout .checkout-right .payment-method select{
        width: 55%;
        padding: 5px;
        border-radius: 50px;
        outline: none;
    }
    .content .checkout .checkout-right .order-total{
        background: #eeeceb;
        padding: 10px;
        margin-top: 30px;
    }
    .content .checkout .checkout-right .order-total .order-total-price{
        display: flex;
        justify-content: center;
    }
    .content .checkout .checkout-right .order-total .order-total-price table,tr,th,td{
        border: 1px solid black;
    }
    .content .checkout .checkout-right .order-total .order-total-price th{
        font-size: 30px;
        padding: 10px;
    }
    .content .checkout .checkout-right .order-total .order-total-price td{
        font-size: 19px;
        text-align: center;
    }
    .content .checkout .checkout-right .place-order{
        width: 100%;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: right;
    }
    .content .checkout .checkout-right .place-order button{
        margin-right: 3%;
        padding: 7px 20px;
        border-radius: 50px;
        font-size: 21px;
        border: none;
        background: #c84542;
        color: white;
        cursor: pointer;
    }
    
</style>
</html>