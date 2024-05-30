<?php
    include("../connection.php");
    if(!isset($_SESSION['valid2'])){
        header("Location: ../login.php");
    }

    $query1 = mysqli_query($conn, "SELECT * FROM topay");
    $query2 = mysqli_query($conn, "SELECT * FROM toprocess");
    $query3 = mysqli_query($conn, "SELECT * FROM toship");
    $query4 = mysqli_query($conn, "SELECT * FROM toreceive");
    $query5 = mysqli_query($conn, "SELECT * FROM received");
    $query6 = mysqli_query($conn, "SELECT * FROM cancelled");

    $kweri = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer"));
            $_SESSION['customer_id'] = $kweri['customer_id'];
            $customer_id = $_SESSION['customer_id'];
        
            $notif = mysqli_query($conn, "SELECT * FROM admin_notification WHERE customer_id = '$customer_id'");
        
            if(isset($_POST['view'])){
                mysqli_query($conn, "DELETE FROM `admin_notification` WHERE customer_id = '$customer_id'");
                header("Location: adminQueues.php");
            }
        
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminCSS/adminDashboard.css">
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
    .notification{
        position: relative;
    }
    #notif{
        cursor: pointer;
    }
    .popupNotif{
        position: absolute;
        background: #E16C69;
        box-shadow: 0 0 10px black;
        width: 270px;
        height: 250px;
        top: 5%;
        left: 12.5%;
        z-index: ;
        border-radius: 10px;
        display: none;
        padding: 10px;
        flex-direction: column;
        text-align: center;
        z-index: 99999;
        overflow: auto;
    }
    .popupNotif.active{
        display: flex;
    }
    #badge{
        background: red;
        padding: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
        font-size: 13px;
        color: white;
        width: 17px;
        height: 17px;
        position: absolute;
        top: -50%;
        left: 80%;
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
                    <i class="fa-solid fa-bell" id="notif"></i>
                    <span id="badge"><?php echo mysqli_num_rows($notif)?></span>
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
                    <p id="overview">Overview</p>
                    <!-- <a href="adminDashboardProducts.php">Products</a> -->
                    <a href="adminDashboardSales.php">Sales</a>
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
                <div class="popupNotif" id="popupNotif">
                                <?php while($notif_row = mysqli_fetch_assoc($notif)){ ?>
                                    <form action="" method="post">
                                        <p><button name="view">Customer <?= $notif_row['customer_id']?> <?= $notif_row['actions'] ?></button></p>
                                    </form>
                                <?php } ?>
                </div>
                <div class="dashboardOverview" id="dashboardOverview">
                    <div class="dashboardOverview-content" id="dashboardOverview-content">
                        <h1>Dashboard</h1>
                        <p>Dashboard <span>></span> Overview</p>
                    </div>
                        <div class="contents">
                            <div class="card">
                                <h1>To Pay</h1>
                                <div class="content-text">
                                    <p><?= mysqli_num_rows($query1) ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <h1>To Process</h1>
                                <div class="content-text">
                                <p><?= mysqli_num_rows($query2) ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <h1>To Ship</h1>
                                <div class="content-text">
                                <p><?= mysqli_num_rows($query3) ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <h1>To Receive</h1>
                                <div class="content-text">
                                <p><?= mysqli_num_rows($query4) ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <h1>Received</h1>
                                <div class="content-text">
                                <p><?= mysqli_num_rows($query5) ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <h1>Cancelled</h1>
                                <div class="content-text">
                                <p><?= mysqli_num_rows($query6) ?></p>
                                </div>
                            </div>
                        </div>
                </div>    
                
 
            </div>

    </div>
    <script>
         document.onclick = function(e){
                if(e.target.id !== 'popupNotif' && e.target.id !== 'notif'){
                    popupNotif.classList.remove('active');
                }
            }


            let notif = document.getElementById('notif');
            let popupNotif = document.getElementById('popupNotif');

            notif.onclick = function(){
                popupNotif.classList.toggle('active');
            }
    </script>
</body>
<style>
    .contents{
        width: 100%;
        height: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    .contents .card{
        width: 300px;
        height: 200px;
        padding: 10px;
        border-radius: 10px;
        background: beige;
        text-align: center;
        z-index: -1;
    }
    .contents .card .content-text{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 75%;
    }
    .contents .card p{
        font-size: 50px;
    }
</style>
</html>