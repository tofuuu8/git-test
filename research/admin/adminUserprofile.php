<?php
    include("config.php");

    $query = mysqli_query($conn, "SELECT * FROM customer");

    $custom = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer"));
    $_SESSION['customer_id'] = $custom['customer_id'];
    $customer_id = $_SESSION['customer_id'];
    if(isset($_GET['search'])){
        $searching = $_GET['searching'];
            $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$searching'");
            $rows = mysqli_fetch_assoc($query);

            if($searching !== $rows['customer_id']){
                header("Location: adminUserprofile.php?message=No ID found");
            }else{
                $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$searching'");
            }
    }
   

    if(isset($_GET['seeAll'])){
       header("Location:adminUserprofile.php");
    }

    if(isset($_POST['seemore'])){
        $customer_id = $_POST['customer_id'];

        header("Location: userSettingsAccInfo.php?customer_id=$customer_id");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminUserprofile.css">
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
                    <h1 id="h3">User Profiles</h1>
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
                <div class="logout">
                    <a href="logout.php">Logout</a>
                </div>
            </div>

        </div>
        
            <div class="header">

                <div class="userProfiles" id="userProfiles">
                    <div class="userProfiles-content">
                        <h1>User Profile</h1>
                        <p>User Profile <span>></span> Accounts</p>
                    </div>
                    <form action="" method="get" style="margin: 10px 0 0 11px;">
                        <input type="text" name="searching" id="" placeholder="Search ID" style="padding: 5px; font-size: 16px; outline: none;">
                        <button style="padding: 4px 10px; font-size: 17px; cursor: pointer;" name="search">Search</button>
                        <button style="padding: 4px 10px; font-size: 17px; cursor: pointer;" name="seeAll">See all</button>
                    </form>
                    <center>
                        <?php  if(!empty(isset($_GET['message']))){
                            echo $_GET['message'];
                        } ?>
                    </center>
                    <center>
                        <table width="98%" >
                    
                            <tr class="trheader"> 
                        
                                <th>Id</th>
                                <th>Username</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Date and time</th>
                                <th>Show more</th>
                                
                            </tr>
                            <tr>            
                            <?php
                                while($row = mysqli_fetch_assoc($query)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['customer_id'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['first_name'] ?></td>
                                        <td><?php echo $row['last_name'] ?></td>
                                        <td><?php echo $row['date_time'] ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="customer_id" value="<?php echo $row['customer_id'] ?>">
                                                <button name="seemore">See more</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>

                        </table>
                    </center>
                </div>
                
            </div>

    </div>
    <script>
        let overview = document.getElementById("overview");
        let products = document.getElementById("products");
        let analytics = document.getElementById("analytics");
        let sales = document.getElementById("sales");

        let dashboardOverview = document.getElementById("dashboardOverview");
        let dashboardProducts = document.getElementById("dashboardProducts");
        let dashboardAnalytics = document.getElementById("dashboardAnalytics");
        let dashboardSales = document.getElementById("dashboardSales");

        overview.addEventListener("click", () => {
            dashboardOverview.style.display = 'block';

            dashboardProducts.style.display = 'none';
            dashboardAnalytics.style.display = 'none';
            dashboardSales.style.display = 'none';
        });

        products.addEventListener("click", () => {
            dashboardProducts.style.display = 'block';

            dashboardOverview.style.display = 'none';
            dashboardAnalytics.style.display = 'none';
            dashboardSales.style.display = 'none';
        });

        analytics.addEventListener("click", () => {
            dashboardAnalytics.style.display = 'block';

            dashboardOverview.style.display = 'none';
            dashboardProducts.style.display = 'none';
            dashboardSales.style.display = 'none';
        });

        sales.addEventListener("click", () => {
            dashboardSales.style.display = 'block';

            dashboardOverview.style.display = 'none';
            dashboardProducts.style.display = 'none';
            dashboardAnalytics.style.display = 'none';
        });

        
    </script>
</body>
<style>
</style>
</html>