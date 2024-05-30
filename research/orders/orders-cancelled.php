<?php 
 include("../connection.php");
    $session_timeout = 10000;
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

        $query = mysqli_query($conn, "SELECT * FROM cancelled WHERE customer_id = '$customer_id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Cancelled | Print My Shirt</title>
</head>
<body>
    <?php include("website-orders-header.php"); ?>
    <div class="content">
        <ul class="content-header">
            <a href="orders-pay.php"><li>To Pay</li></a>
            <a href="orders-process.php"><li>To Process</li></a>
            <a href="orders-ship.php"><li>To Ship</li></a>
            <a href="orders-toreceived.php"><li>To Receive</li></a>
            <a href="orders-received.php"><li>Received</li></a>
            <a href="orders-cancelled.php"  class="active"><li>Cancelled</li></a>
        </ul>
    </div>
    <center>
        <?php while($row = mysqli_fetch_assoc($query)){ ?>
                    <table width="95%" style="margin-bottom: 30
                    px;">
                        <tr>
                            <th colspan="100%"><h1>Cancelled</h1></th>
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
    table, tr,th,td{
        border: 1px solid black;
    }
    table,tr,th,td{
        padding: 7px;
    }
</style>
</html>
