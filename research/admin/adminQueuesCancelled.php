<?php
    include("../connection.php");

    $query = mysqli_query($conn, "SELECT * FROM customer");
    $row = mysqli_fetch_assoc($query);
    $_SESSION['customer_id'] = $row['customer_id'];
 

    $customer_id = $_SESSION['customer_id'];

    $address = mysqli_query($conn, "SELECT * FROM customer_address WHERE customer_id = '$customer_id'"); 
    $cancelled = mysqli_query($conn, "SELECT * FROM cancelled"); 

    $cancelled2 = mysqli_query($conn, "SELECT * FROM cancelled");
    if ($cancelled2 && mysqli_num_rows($cancelled2) > 0) {
        $rowss = mysqli_fetch_assoc($cancelled2);
        $_SESSION['cancelled_id'] = $rowss['cancelled_id'];
    } else {
        
        $_SESSION['cancelled_id'] = null;
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
                    <a href="adminQueuesShip.php"><p>To Ship</p></a>
                    <a href="adminQueuesToReceive.php"><p>To Receive</p></a>
                    <a href="adminQueuesReceive.php"><p>Received</p></a>
                    <p>Cancelled</p>
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
                        <p>Queues <span>></span> Cancelled</p>
                    </div>
                    <center>
                        <?php
                                while ($row3 = mysqli_fetch_assoc($cancelled)) {
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
    
</body>
<style>
    table,tr,th,td{
        border: 1px solid black;
    }
    tr,th,td{
        padding: 2px;
    }
</style>
</html>