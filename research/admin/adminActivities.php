<?php
    include("../connection.php");

    if(!isset($_SESSION['valid2'])){
        header("Location: ../login.php");
    }
    
        $query = mysqli_query($conn, "SELECT * FROM audit_rel");
        if(isset($_GET['search'])){
            $searching = $_GET['searching'];
                $query = mysqli_query($conn, "SELECT * FROM audit_rel WHERE customer_id = '$searching'");
                $rows = mysqli_fetch_assoc($query);
    
                if($searching !== $rows['customer_id']){
                    header("Location: adminActivities.php?message=No ID found");
                }else{
                    $query = mysqli_query($conn, "SELECT * FROM audit_rel WHERE customer_id = '$searching'");
                }
        }
       
        if(isset($_GET['seeAll'])){
           header("Location:adminActivities.php");
        }

        mysqli_query($conn, "DELETE from audit_rel WHERE date_time <= CURRENT_DATE - INTERVAL 3 DAY");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminActivities.css">
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
                    <h1 id="h2"><a href="adminQueues.php">Queues</a></h1>
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
                    <h1 id="h4">Activities</h1>
                </label>
                <div class="transactions-content">
                    <p id="history">History</p>
                </div>
            </div>
        
            <div class="chatsupport-settings-logout">
                <div class="logout">
                    <a href="logout.php">Logout</a>
                </div>
            </div>

        </div>
            <div class="content">
                <div class="transactionsHistory" id="transactionsHistory">
                    <div class="transactionsHistory-content">
                        <h1>Activities</h1>
                        <p>Activities <span>></span> History</p>
                    </div>
                </div>
                <form action="" method="get" style="margin: 10px 0 0 11px;">
                        <input type="text" name="searching" id="" placeholder="Search Customer ID" style="padding: 5px; font-size: 16px; outline: none;">
                        <button style="padding: 4px 10px; font-size: 17px; cursor: pointer;" name="search">Search</button>
                        <button style="padding: 4px 10px; font-size: 17px; cursor: pointer;" name="seeAll">See all</button>
                </form>
                <center>
                        <?php  if(!empty(isset($_GET['message']))){
                            echo $_GET['message'];
                        } ?>
                </center>
                <center style="margin-top: 15px;">
                    <table width="95%">
                        <tr>
                            <th>ID</th>
                            <th>Customer ID</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Actions</th>
                            <th>Date and Time</th>
                        </tr>
                            <tr>
                                <?php while($row = mysqli_fetch_assoc($query)){ ?>
                                    <td><?= $row['audit_id'] ?></td>  
                                    <td><?= $row['customer_id'] ?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['customer_actions'] ?></td>
                                    <td><?= $row['date_time']?></td>
                            </tr>
                            <?php } ?>
                    </table>
                </center>
            </div>

    </div>
    <script>
      
    </script>
</body>
<style>
    table, tr, th, td{
        border: 1px solid black;
    }
    th, td{
        padding: 5px;
        text-align: center;
    }
</style>
</html>