<?php
    include("config.php");
    if(!isset($_SESSION['valid2'])){
        header("Location: ../login.php");
    }

    if(isset($_POST['add'])){
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_color = $_POST['color'];
        $product_description = $_POST['description'];

        $target_dir ="../image/";
        $target_file =$target_dir.basename($_FILES['upload_file']["name"]);
        move_uploaded_file($_FILES['upload_file']["tmp_name"], $target_file);

        if(empty($target_file) OR empty($product_name) OR empty($product_price) OR empty($product_color) OR empty($product_description)){
            echo "<script> alert('All fields are required'); </script>";
        }else{
        mysqli_query($conn, "INSERT INTO adminproducts(product_image,product_name,product_price,product_color,product_description) VALUES('$target_file','$product_name','$product_price','$product_color','$product_description')");
        }
    }
    
    $query = mysqli_query($conn, "SELECT * FROM adminproducts");


    if(isset($_POST['delete'])){
        mysqli_query($conn, "TRUNCATE TABLE adminproducts");
        mysqli_query($conn, "ALTER TABLE adminproducts AUTO_INCREMENT = 1");
        header("Location: adminDashboardProducts.php");
    }
    // if(isset($_GET['searching'])){
    //     $search = $_GET['search'];

    //     $query1 = mysqli_query($conn, "SELECT * FROM adminproducts WHERE id = '$search'");
    //     if (mysqli_num_rows($query1) > 0) {
    //         $row1 = mysqli_fetch_assoc($query1);
    //         echo $row1['id'];
    //     } else {
           
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminCSS/adminDashboardProducts.css">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Document</title>
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
                <img src="images/logo.png" alt="">
                <h1>Print My Shirt</h1>
            </div>
            <div class="dashboard" id="dashboard">
                <input type="checkbox" name="check1" id="check1">
                <label for="check1">
                    <h1 id="h1">Dashboard</h1>
                </label>
                <div class="dashboard-content">
                    <a href="adminDashboard.php">Overview</a>
                    <p id="products">Products</p>
                    <!-- <a href="adminDashboardAnalytics.html">Analytics</a> -->
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
                <div class="dashboardProducts" id="dashboardProducts">
                    <div class="dashboardProducts-content" id="dashboardProducts-content">
                        <h1>Dashboard</h1>
                        <p>Dashboard <span>></span> Products</p>
                    </div>
                        <div class="add-search">
                            <div class="add" style="display:flex;justify-content:space-between;">
                                <button id="add" onclick="showadd()">Add</button>
                                <form action="" method="post">
                                <button name="delete">Delete</button>
                                </form>
                                <!-- <form action="" method="get">
                                    <input type="text" name="search" id="">
                                    <br>
                                    <button name="searching">Search</button>
                                </form> -->
                            </div>
                        </div>
                           

                       <div class="add-background" id="add-background">
                        <span onclick="hideadd()">✖</span>
                            <div class="add-center">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <h1>Add Product</h1>    
                                    <div class="inputs">
                                        <input type="file" name="upload_file" id="" >
                                    </div>
                                    <div class="inputs">
                                        <input type="text" name="name" id="" placeholder="Name" >
                                    </div>
                                    <div class="inputs">
                                        <input type="text" name="price" id="" placeholder="Price" >
                                    </div>
                                    <div class="inputs">
                                        <input type="text" name="color" id="" placeholder="Color" >
                                    </div>
                                    
                                    <div class="inputs">
                                        <textarea name="description" id="desciption" cols="30" rows="5" placeholder="Descriptions..." ></textarea>
                                    </div>

                                    <div class="inputs">
                                        <button name="add">Add</button>
                                    </div>
                                </form>
                            </div>
                       </div>
                    <center>
                         <?php if(isset($_GET['update_msg'])){
                            echo"<h1 class='success'> $_GET[update_msg]</h1>";
                        } ?>
                         <?php if(isset($_GET['delete_msg'])){
                            echo"<h1 class='success'> $_GET[delete_msg]</h1>";
                        } ?>
                        <table width="97%">
                            <tr>
                                <th>ID</th>
                                <th>IMAGE</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>COLOR</th>
                                <th>DESCRIPTION</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                            <tr>
                            <?php while($row = mysqli_fetch_assoc($query)){ $id = $row['id'];?>

                                <td><?php echo $row['id'] ?></td>
                                <td><img src="<?php echo $row['product_image'] ?>" alt=""></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['product_price'] ?></td>
                                <td><?php echo $row['product_color'] ?></td>
                                <td><?php echo $row['product_description'] ?></td>
                                <td><?php echo "<a class='update' href='admin-products-update.php?id=$id'>Update</a>" ?></td>
                                <td><?php echo "<a class='delete' href='admin-products-delete.php?id=$id'>Delete</a>" ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </center>
                </div>
            </div>

    </div>
    <script>
        let add_background = document.getElementById("add-background");

        function showadd(){
            add_background.classList.toggle("active");
        }
        function hideadd(){
            add_background.classList.remove("active");
        } 
                          
        let success = document.querySelector(".success");
        let counter = 0;
                         
        function incrementByOne(){                        
            counter++;  
        }

        let intervalId = setInterval(function() {
            incrementByOne();
            if(counter === 2){
                success.style.display = 'none';
                clearInterval(intervalId);
           }
        }, 1000);
    </script>
</body>
<style>
    
</style>
</html>