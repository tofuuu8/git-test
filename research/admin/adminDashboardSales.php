<?php
    include("../connection.php");
    if(!isset($_SESSION['valid2'])){
        header("Location: ../login.php");
    }
    $query = mysqli_query($conn, "SELECT * FROM received");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminCSS/adminDashboardSales.css">
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
</style>
<body>  
    <div class="body">
        <div class="header-left" id="header-left">

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
                <div class="navigation" id="navigation">
                    <span id="span1"></span>
                    <span id="span2"></span>
                </div>
            </div>
           
            <div class="logo">
                <img src="../images/logo.png" alt="">
                <h1>Print My Shirt</h1>
            </div>
            <div class="dashboard" id="dashboard">
                <input type="checkbox" name="check1" id="check1">
                <label for="check1">
                    <h1 id="h1">Dashboard</h1>
                </label>
                <div class="dashboard-content">
                    <a href="adminDashboard.php">Overview</a>
                    <!-- <a href="adminDashboardProducts.php">Products</a> -->
                    <!-- <a href="adminDashboardAnalytics.html">Analytics</a> -->
                    <p id="sales">Sales</p>
                </div>
            </div>
        
            <div class="Queues" id="Queues">
                <input type="checkbox" name="check2" id="check2">
                <label for="check2">
                    <h1 id="h2"><a href="adminQueues.php" id="sana">Queues</a></h1>
                </label>
                <div class="Queues-content">
                    <p>Orders</p>
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
                <div class="settings">
                    <a href="">Settings</a>
                </div>
                <div class="logout">
                    <a href="logout.php">Logout</a>
                </div>
            </div>


        </div>
        
            <div class="content" id="content">

                <div class="dashboardSales" id="dashboardSales">
                        <div class="dashboardSales-content" id="dashboardSales-content">
                            <h1>Dashboard</h1>
                            <p>Dashboard <span>></span> Sales</p>
                        </div>

                        <center style="margin-top: 15px;">
                            <table width="95%">
                                <tr>
                                    <th>Product</th>
                                    <th>Mode of Payment</th>
                                    <th>Sales</th>
                                </tr>
                                <tr>
                                    <?php $total = 0;
                                        while($row = mysqli_fetch_assoc($query)){ 
                                            $total += $row['order_total'];
                                        ?>
                                        <td>Customized <?= $row['customize_product'] ?></td>
                                        <td><?= $row['payment_method'] ?></td>
                                        <td><?= $row['order_total']?></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </center>
                </div>
                     
                   
            </div>

    </div>  
</body>
<style>
    table, tr, th, td{
        border: 1px solid black;
    }
    th{
        padding: 5px;
        font-size: 30px;
    }
    td{
        padding: 5px;
        text-align: center;
        font-size: 20px;
    }
</style>
</html>