<?php

include("../connection.php");

    if(!isset($_SESSION['valid2'])){
        header("Location: ../login.php");
    }

    $toship = mysqli_query($conn, "SELECT * FROM toship"); 

    $toship2 = mysqli_query($conn, "SELECT * FROM toship");
    if ($toship2 && mysqli_num_rows($toship2) > 0) {
        $rowss = mysqli_fetch_assoc($toship2);
        $_SESSION['ship_id'] = $rowss['ship_id'];
    } else {
        
        $_SESSION['ship_id'] = null;
    }

    $catalog = mysqli_query($conn, "SELECT * FROM product_catalog");
    $rowsss = mysqli_fetch_assoc($catalog);
    $_SESSION['catalog_id'] = $rowsss['catalog_id'];
    if(isset($_POST['to-receive'])){
        if(isset($_SESSION['ship_id'])){
            $customer_id1 = $_POST['customer_id'];
            $catalog_id = $_SESSION['catalog_id'];
            $ship_id = $_SESSION['ship_id'];

            $merge_image = $_POST['merge_image'];
            $customer_upload_image = $_POST['customer_upload_image'];
            $customer_name = $_POST['customer_name'];
            $customize_product = $_POST['customize_product'];
            $product_color = $_POST['product_color'];
            $product_type = $_POST['product_type'];
            $product_collar = $_POST['product_collar'];
            $product_print_area = $_POST['product_print_area'];
            $small = $_POST['small'];
            $medium = $_POST['medium'];
            $large = $_POST['large'];
            $xlarge = $_POST['xlarge'];
            $receive_type = $_POST['receive_type'];
            $payment_method = $_POST['payment_method'];
            $order_total = $_POST['order_total'];
            $quantity = $_POST['quantity'];
            $reference_id = $_POST['reference_id'];
            $names = $_POST['names'];
            $phone_number = $_POST['phone_number'];
            $city = $_POST['city'];
            $zipcode = $_POST['zipcode'];
            $country = $_POST['country'];
            $address = $_POST['address'];

            $merge_image2 = $_POST['merge_image2'];
            $customer_upload_image2 = $_POST['customer_upload_image2'];
            $product_print_area2 = $_POST['product_print_area2'];

            mysqli_query($conn, "INSERT INTO `customer_notification`(customer_id,notifications) VALUES('$customer_id1','Your order is now on to received')");
            mysqli_query($conn, "INSERT INTO `toreceive`(`customer_id`, `catalog_id`, `merge_image`,`merge_image2`, `customer_upload_image`,`customer_upload_image2`,`customize_product`, `product_color`, `product_type`, `product_collar`, `product_print_area`,`product_print_area2`, `small`, `medium`, `large`, `xlarge`, `receive_type`, `payment_method`, `order_total`,`quantity`,`reference_id`,`names`,`phone_number`,`address`,`city`,`zipcode`,`country`) VALUES ('$customer_id1','$catalog_id','$merge_image','$merge_image2','$customer_upload_image','$customer_upload_image2','$customize_product','$product_color','$product_type','$product_collar','$product_print_area','$product_print_area2','$small','$medium','$large','$xlarge','$receive_type','$payment_method','$order_total','$quantity','$reference_id','$names','$phone_number','$address','$city','$zipcode','$country')");
            mysqli_query($conn, "DELETE FROM `toship` WHERE ship_id = '$ship_id'");
            header("Location: adminQueuesShip.php");
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminQueuess.css">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Admin | Print My Shirt</title>
</head>
<style>
    .top-header-left{
        display: flex;
        width: 100%;
        align-items: center;
        gap: 15px;
        font-size: 20px;
        padding: 10px 0 10px 5px;
    }
    .top-header-left .adminlogo{
        background: black;
        color: white;
        border-radius: 50px;
        border: 1px;
        font-size: 18px;
        padding: 5px 10px;
    }
    .header-left .chatsupport-settings-logout{
        position: absolute;
        bottom: 10px;
        line-height: 25px;
        left: 3%;
    }
    .header-left .chatsupport-settings-logout a{
        color: black;
        text-decoration: none;
        font-size: 17px;
    }
    .Queues-content a{
       text-decoration: none;
       color: black;
    }
</style>
<body>  
    <div class="body">
        <div class="header-left">

            <div class="top-header-left">
                <div class="adminlogo">
                    <i class="fa-solid fa-user" id="adminlogo"></i>
                    <label for="adminlogo">Admin</label>
                </div>
                <div class="email">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                </div>
            </div>
            
            <div class="logo">
                <img src="../images/logo.png" alt="">
                <h1>Print My Shirt</h1>
            </div>
            <div class="dashboard" id="dashboard">
                <input type="checkbox" name="check1" id="check1">
                <label for="check1">
                    <h1 id="h1"><a href="adminDashboard.php">Dashboard</a></h1>
                </label>
                <div class="dashboard-content">
                    <p id="overview">Overview</p>
                    <p id="products">Products</p>
                    <p id="analytics">Analytics</p>
                    <p id="sales">Sales</p>
                </div>
            </div>
        
            <div class="Queues" id="Queues">
                <input type="checkbox" name="check2" id="check2">
                <label for="check2">
                    <h1 id="h2">Queues</h1>
                </label>
                <div class="Queues-content">
                    <a href="adminQueues.php"><p>To Pay</p></a>
                    <a href="adminQueuesProcess.php"><p>To Process</p></a>
                    <p>To Ship</p>
                    <a href="adminQueuesToReceive.php"><p>To Receive</p></a>
                    <a href="adminQueuesReceive.php"><p>Received</p></a>
                    <a href="adminQueuesCancelled.php"><p>Cancelled</p></a>
                </div>
            </div>
            
            <div class="userProfile" id="userProfile">
                <input type="checkbox" name="check3" id="check3">
                <label for="check3">
                    <h1 id="h3"><a href="adminUserprofile.php">User Profiles</a></h1>
                </label>
                <div class="userProfile-content">
                    <p>Accounts</p>
                </div>
            </div>
            
            <div class="transactions" id="transactions">
                <input type="checkbox" name="check4" id="check4">
                <label for="check4">
                    <h1 id="h4"><a href="adminActivities.php">Activities</a></h1>
                </label>
                <div class="transactions-content">
                    <p>Mode of payment </p>
                    <p>History</p>
                </div>
            </div>
        
            <div class="chatsupport-settings-logout">
                <!-- <div class="settings">
                    <a href="">Settings</a>
                </div> -->
                <div class="logout">
                    <a href="logout.php">Logout</a>
                </div>
            </div>

        </div>
            <div class="header">
          
                <div class="queuesOrders" id="queuesOrders">
                    <div class="queuesOrders-content">
                        <h1>Queues</h1>
                        <p>Queues <span>></span> To Ship</p>
                    </div>
                    <center>
                        <?php
                                while ($row3 = mysqli_fetch_assoc($toship)) {
                            ?>
                                <div>
                                    <form action="" method="post">
                                        <table width="98%" style="margin: 110px 0 30px 18%">
                                            <tr>
                                                <th>Reference ID</th>
                                                <?php if(!empty($row3['merge_image'])){echo '<th>Finish Product</th>';}?>
                                                <?php if(!empty($row3['merge_image2'])){echo '<th>Finish Design</th>';}?>
                                                <?php if(!empty($row3['customer_upload_image'])){echo '<th>Upload Image</th>';}?>
                                                <?php if(!empty($row3['customer_upload_image2'])){echo '<th>Upload Image</th>';}?>
                                                <th>Product</th>
                                                <?php if(!empty($row3['product_color'])){echo '<th>Color</th>';}?>
                                                <?php if(!empty($row3['product_type'])){echo '<th>Type</th>';}?>
                                                <?php if(!empty($row3['product_collar'])){echo '<th>Collar</th>';}?>
                                                <?php if(!empty($row3['small'])){echo '<th>S</th>';}?>
                                                <?php if(!empty($row3['medium'])){echo '<th>M</th>';}?>
                                                <?php if(!empty($row3['large'])){echo '<th>L</th>';}?>
                                                <?php if(!empty($row3['xlarge'])){echo '<th>XL</th>';}?>
                                                <?php if(!empty($row3['quantity'])){echo '<th colspan="100%"> Quantity </th>';}?>
                                                <?php if(!empty($row3['product_print_area'])){echo '<th>Print Area</th>';}?>
                                                <?php if(!empty($row3['product_print_area2'])){echo '<th>Print Area</th>';}?>
                                                <th>Receive Type</th>
                                                <th>MOP</th>
                                                <th>Price</th>
                                                <th>Date and Time</th>
                                            </tr>
                                            <tr>
                                                <th><?= $row3['reference_id'] ?></th>
                                                    <input type="hidden" name="reference_id" value="<?= $row3['reference_id'] ?>">
                                                    <input type="hidden" name="customer_id" value="<?= $row3['customer_id'] ?>">
                                                <?php if(!empty($row3['merge_image'])){echo "<th><img src='".$row3['merge_image']."' width='200'</th>";}?>
                                                    <input type="hidden" name="merge_image" value="<?= $row3['merge_image'] ?>">

                                                <?php if(!empty($row3['merge_image2'])){echo "<th><img src='".$row3['merge_image2']."' width='200'</th>";}?>
                                                    <input type="hidden" name="merge_image2" value="<?= $row3['merge_image2'] ?>">
                                                    
                                                <?php if(!empty($row3['customer_upload_image'])){echo "<th><img src='".$row3['customer_upload_image']."' width='200'</th>";}?>
                                                <?php if(!empty($row3['customer_upload_image2'])){echo "<th><img src='".$row3['customer_upload_image2']."' width='200'</th>";}?>
                                                    <input type="hidden" name="customer_upload_image" value="<?= $row3['customer_upload_image'] ?>">
                                                    <input type="hidden" name="customer_upload_image2" value="<?= $row3['customer_upload_image2'] ?>">

                                                <th><?= $row3['customize_product'] ?></th>
                                                    <input type="hidden" name="customize_product" value="<?= $row3['customize_product'] ?>">

                                                <?php if(!empty($row3['product_color'])){echo "<th>".$row3['product_color']."</th>";}?>
                                                    <input type="hidden" name="product_color" value="<?= $row3['product_color'] ?>">

                                                <?php if(!empty($row3['product_type'])){echo "<th>". $row3['product_type']. "</th>";}?> 
                                                    <input type="hidden" name="product_type" value="<?= $row3['product_type'] ?>">

                                                <?php if(!empty($row3['product_collar'])){echo "<th>". $row3['product_collar']. "</th>";}?> 
                                                    <input type="hidden" name="product_collar" value="<?= $row3['product_collar'] ?>">
                                               
                                                <?php if(!empty($row3['small'])){echo "<th>" .$row3['small']. "</th>";}?>
                                                    <input type="hidden" name="small" value="<?= $row3['small'] ?>">

                                                <?php if(!empty($row3['medium'])){echo "<th>" .$row3['medium']. "</th>";}?>
                                                    <input type="hidden" name="medium" value="<?= $row3['medium'] ?>">

                                                <?php if(!empty($row3['large'])){echo "<th>" .$row3['large']. "</th>";}?>
                                                    <input type="hidden" name="large" value="<?= $row3['large'] ?>">

                                                <?php if(!empty($row3['xlarge'])){echo "<th>" .$row3['xlarge']. "</th>";}?>
                                                    <input type="hidden" name="xlarge" value="<?= $row3['xlarge'] ?>">

                                                <?php if(!empty($row3['quantity'])){echo "<th colspan='100%'>" .$row3['quantity']. "</th>";}?>
                                                    <input type="hidden" name="quantity" value="<?= $row3['quantity'] ?>">

                                                <?php if(!empty($row3['product_print_area'])){echo "<th>".$row3['product_print_area']. "</th>";}?>
                                                 <input type="hidden" name="product_print_area" value="<?= $row3['product_print_area'] ?>">

                                                 <?php if(!empty($row3['product_print_area2'])){ echo "<th>".$row3['product_print_area2']."</th>";}?>
                                                 <input type="hidden" name="product_print_area2" value="<?= $row3['product_print_area2'] ?>">

                                                <th><?= $row3['receive_type'] ?></th>
                                                    <input type="hidden" name="receive_type" value="<?= $row3['receive_type'] ?>">

                                                <th><?= $row3['payment_method'] ?></th>
                                                    <input type="hidden" name="payment_method" value="<?= $row3['payment_method'] ?>">

                                                <th><?= $row3['order_total'] ?></th>
                                                    <input type="hidden" name="order_total" value="<?= $row3['order_total'] ?>">

                                                <th><?= $row3['date_time']?></th>
                                            </tr>
                                            <tr>
                                                <th colspan=""><button id="showProcess">To receive</button></th>
                                                <div class="popupProcess" id="popupProcess">
                                                    <div class="box">
                                                        <h2>Mark as to receive?</h2>
                                                        <div class="btn">
                                                            <button id="no">Cancel</button>
                                                            <button id="yes" name="to-receive">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <th colspan=""><?= $row3['names']?></th>
                                                    <input type="hidden" name="names" value="<?= $row3['names'] ?>">

                                                <th colspan=""><?= $row3['phone_number']?></th>
                                                    <input type="hidden" name="phone_number" value="<?= $row3['phone_number'] ?>">

                                                <th colspan=""><?= $row3['city']?></th>
                                                    <input type="hidden" name="city" value="<?= $row3['city'] ?>">

                                                <th colspan=""><?= $row3['zipcode']?></th>
                                                    <input type="hidden" name="zipcode" value="<?= $row3['zipcode'] ?>">

                                                <th colspan=""><?= $row3['country']?></th>
                                                    <input type="hidden" name="country" value="<?= $row3['country'] ?>">
                                        
                                                <th colspan="200%" width=""><?= $row3['address']?></th>
                                                    <input type="hidden" name="address" value="<?= $row3['address'] ?>">
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                        <?php }?>
                    </center>
                </div>
            </div>
        </div>
    <script>
       let no = document.getElementById("no");
       let showProcess = document.getElementById("showProcess");
       let popupProcess = document.getElementById("popupProcess");

       showProcess.addEventListener("click", function(event) {
            event.preventDefault();
            popupProcess.classList.add("show");
       });

       no.addEventListener("click", function(e) {
            e.preventDefault();
            popupProcess.classList.remove("show");
       });
    </script>
</body>
<style>
    table,tr,th,td{
        border: 1px solid black;
    }
    tr,th,td{
        padding: 2px;
    }
    table tr button{
        padding: 5px 7px;
        font-size: 16px;
        cursor: pointer;
    }
    .popupProcess{
        position: fixed;
        top: 0;
        left: 0;
        background: rgba(0,0,0,.4);
        display: none;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        z-index: 99999;
    }
    .popupProcess.show{
        display: flex;
    }
    .popupProcess .box{
        background: #c84542;
        padding: 30px;
        border-radius: 10px;
        width: auto;
        height: auto;
    }
    .popupProcess .box h2{
        color: white;
        margin-bottom: 15px;
    }
    .popupProcess .box .btn{
        display: flex;
        gap: 10px;
    }
    .popupProcess .box button{
        font-size: 18px;
        padding: 5px 30px;
        border-radius: 50px;
        border: none;
        outline: none;
        cursor: pointer;
    }
</style>
</html>