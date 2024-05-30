<?php 
  include("../connection.php");
    $session_timeout = 100000;
    if(isset($_SESSION['valid'])){
        if(isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $session_timeout){
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

        $customer_id = $_SESSION['customer_id'];

        $query = mysqli_query($conn, "SELECT * FROM toship WHERE customer_id = '$customer_id'");
        $msg;
        if(isset($_GET['submit'])){
            $search = $_GET['search'];
                $query = mysqli_query($conn, "SELECT * FROM toship  WHERE customize_product = '$search'");
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Ship | Print My Shirt</title>
</head>
<body>
    <?php include("website-orders-header.php"); ?>
    <div class="content">
        <ul class="content-header">
           
            <a href="orders-pay.php"><li>To Pay</li></a>
            <a href="orders-process.php"><li>To Process</li></a>
            <a href="orders-ship.php" class="active"><li>To Ship</li></a>
            <a href="orders-toreceived.php"><li>To Receive</li></a>
            <a href="orders-received.php"><li>Received</li></a>
            <a href="orders-cancelled.php"><li>Cancelled</li></a>
        </ul>
    </div>
    <center>
        <form action="" method="post">
            <?php while($row = mysqli_fetch_assoc($query)){ ?>
                    <table width="95%" style="margin-bottom: 30px;">
                        <tr>
                            <th colspan="100%"><h1>Shipping</h1></th>
                        </tr>
                        <tr>
                            <th>Reference ID</th>
                            <?php if(!empty($row['merge_image'])){echo '<th>Finish Design</th>';}?>
                            <?php if(!empty($row['merge_image2'])){echo '<th>Finish Design</th>';}?>
                            <?php if(!empty($row['customer_upload_image'])){echo '<th>Upload Image</th>';}?>
                            <?php if(!empty($row['customer_upload_image2'])){echo '<th>Upload Image</th>';}?>
                            <th>Product</th>
                            <?php if(!empty($row['product_color'])){echo '<th>Color</th>';}?>
                            <?php if(!empty($row['product_type'])){echo '<th>Type</th>';}?>
                            <?php if(!empty($row['product_collar'])){echo '<th>Collar</th>';}?>
                            <?php if(!empty($row['small'])){echo '<th>S</th>';}?>
                            <?php if(!empty($row['medium'])){echo '<th>M</th>';}?>
                            <?php if(!empty($row['large'])){echo '<th>L</th>';}?>
                            <?php if(!empty($row['xlarge'])){echo '<th>XL</th>';}?>
                            <?php if(!empty($row['quantity'])){echo '<th> Quantity </th>';}?>
                            <?php if(!empty($row['product_print_area'])){echo '<th>Print Area</th>';}?>
                            <?php if(!empty($row['product_print_area2'])){echo '<th>Print Area</th>';}?>
                            <th>Receive Type</th>
                            <th>MOP</th>
                            <th>Price</th>
                            <th>Date and Time</th>
                        </tr>
                        <tr>
                            <th><?= $row['reference_id'] ?></th>
                            <?php if(!empty($row['merge_image'])){echo "<th><img src='".$row['merge_image']."' width='200'</th>";}?>
                            <?php if(!empty($row['merge_image2'])){echo "<th><img src='".$row['merge_image2']."' width='200'</th>";}?>
                            <?php if(!empty($row['customer_upload_image'])){echo "<th><img src='".$row['customer_upload_image']."' width='200'</th>";}?>
                            <?php if(!empty($row['customer_upload_image2'])){echo "<th><img src='".$row['customer_upload_image2']."' width='200'</th>";}?>
                            <th><?= $row['customize_product']?></th>
                            <?php if(!empty($row['product_color'])){echo "<th>".$row['product_color']."</th>";}else{ $row['product_color']=NULL;}?>
                            <?php if(!empty($row['product_type'])){echo "<th>".$row['product_type']."</th>";}?>
                            <?php if(!empty($row['product_collar'])){echo "<th>".$row['product_collar']."</th>";};?>
                            <?php if(!empty($row['small'])){echo "<th>".$row['small']."</th>";}?>
                            <?php if(!empty($row['medium'])){echo "<th>".$row['medium']."</th>";}?>
                            <?php if(!empty($row['large'])){echo "<th>".$row['large']."<t/h>";}?>
                            <?php if(!empty($row['xlarge'])){echo "<th>".$row['xlarge']."</th>";}?>
                            <?php if(!empty($row['quantity'])){ echo "<th>".$row['quantity']."</th>";}?>
                            <?php if(!empty($row['product_print_area'])){ echo "<th>".$row['product_print_area']."</th>";}?>
                            <?php if(!empty($row['product_print_area2'])){ echo "<th>".$row['product_print_area2']."</th>";}?>
                            <th><?= $row['receive_type']?></th>
                            <th><?= $row['payment_method']?></th>
                            <th><?= $row['order_total']?></th>
                            <th><?= $row['date_time']?></th>


                            <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
                            <input type="hidden" name="catalog_id" value="<?= $row['catalog_id'] ?>">
                            <input type="hidden" name="reference_id" value="<?= $row['reference_id'] ?>">
                            <input type="hidden" name="merge_image" value="<?php if(!empty($row['merge_image'])){echo $row['merge_image'];}?>">
                            <input type="hidden" name="merge_image2" value="<?php if(!empty($row['merge_image2'])){echo $row['merge_image2'];}?>">
                            <input type="hidden" name="customer_upload_image" value="<?= $row['customer_upload_image'] ?>">
                            <input type="hidden" name="customer_upload_image2" value="<?= $row['customer_upload_image2'] ?>">
                            <input type="hidden" name="customize_product" value="<?= $row['customize_product']?>">
                            <input type="hidden" name="product_color" value="<?php if(!empty($row['product_color'])){echo $row['product_color'];}?>">
                            <input type="hidden" name="product_type" value="<?php if(!empty($row['product_type'])){echo $row['product_type'];}?>">
                            <input type="hidden" name="product_collar" value="<?php if(!empty($row['product_collar'])){echo $row['product_collar'];}?>">
                            <input type="hidden" name="small" value="<?php if(!empty($row['small'])){echo $row['small'];}?>">
                            <input type="hidden" name="medium" value="<?php if(!empty($row['medium'])){echo $row['medium'];}?>">
                            <input type="hidden" name="large" value="<?php if(!empty($row['large'])){echo $row['large'];}?>">
                            <input type="hidden" name="xlarge" value="<?php if(!empty($row['xlarge'])){echo $row['xlarge'];}?>">
                            <input type="hidden" name="quantity" value="<?php if(!empty($row['quantity'])){ echo $row['quantity'];}?>">
                            <input type="hidden" name="product_print_area" value="<?php if(!empty($row['product_print_area'])){ echo $row['product_print_area'];}?>">
                            <input type="hidden" name="product_print_area2" value="<?php if(!empty($row['product_print_area2'])){ echo $row['product_print_area2'];}?>">
                            <input type="hidden" name="receive_type" value="<?= $row['receive_type'] ?>">
                            <input type="hidden" name="payment_method" value="<?= $row['payment_method'] ?>">
                            <input type="hidden" name="order_total" value="<?= $row['order_total'] ?>">
                        </tr>
                        <tr>
                            <?php if(!empty($row['reference_id'])){ echo "<th>Name</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>Phone number</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>Country</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>Zipcode</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>City</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th colspan='100%'>Address</th>";} ?>
                        </tr>
                        <tr>
                            <?php if(!empty($row['reference_id'])){ echo "<th>".$row['names']."</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>".$row['phone_number']."</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>".$row['country']."</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>".$row['zipcode']."</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th>".$row['city']."</th>";} ?>
                            <?php if(!empty($row['reference_id'])){ echo "<th colspan='100%'>".$row['address']."</th>";} ?>
                        </tr>
                    </table>
            <?php } ?>
        </form>
    </center>
</body>
<style>
    .content{
        width: 100%;
        height: 100%;
    }
    .content .content-header{
        display: flex;
        list-style: none;
        padding: 0 70px;
        align-items: center;
        justify-content: space-between;
        height: 60px;
        margin-top: 65px;
        position: fixed;
        width: 90%;
        left: 0;
        top: 0;
        background: beige;
        z-index: -1;
    }
    .content .content-header a.active{
        text-decoration: underline;
    }
    table{
        margin-top: 130px;
    }
    table,tr,th,td{
        border: 1px solid black;
    }
    tr,th,td{
        padding: 2px;
    }
</style>
</html>