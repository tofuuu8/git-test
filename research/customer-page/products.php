<?php 
include("../connection.php"); 
 ob_start();
 if(!isset($_SESSION['valid'])){
    header("Location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php if(isset($_GET['product'])){ echo $_GET['product'];}?> | Print My Shirt</title>
</head>
<style>
    section .content .section-right-content{
        padding-right: 8%;
    }
    section .content .section-right-content h1{
        font-size: 33px;
        margin-bottom: 10px;
    }
    section .content .section-right-content .color, .type, .collar{
        display: flex;
        gap: 20px;
        margin: 20px 0;
        align-items: center;   
    }
    section .content .section-right-content label{
      
    }
    section .content .section-right-content select{
        width: 90%;
        border: 2px solid black;
        font-size: 19px;
        padding: 5px;
        cursor: pointer;
    }
    section .content .section-right-content .quantity{
        margin: 15px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    section .content .section-right-content .quantity .inputs{
        display: flex;
        gap: 50px;
    }
    section .content .section-right-content .quantity input{
        width: 60px;
        border: 1px solid black;
        outline: none;
        text-align: center;
        height: 30px;
    }
    section .content .section-right-content .quantity #size-info{
        padding: 6px 10px;
        font-size: 16px;
        cursor: pointer;
    }
    section .content .section-right-content .upload-file{
        margin: 15px 0;
    }
    section .content .section-right-content .proceed{
        display: flex;
        flex-direction: column;
        margin-top: 50px;
    }
    section .content .section-right-content .proceed button{
        border-radius: 50px;
        border: none;
        font-size: 18px;
        padding: 10px;
        background: #c84542;
        color: white;
        cursor: pointer;    
    }
</style>
<body>
<?php include("website-header.php"); ?>

<?php if(isset($_GET['catalog_id']) == 1){
        $catalog_id = $_GET['catalog_id'];
        $customer_id = $_SESSION['customer_id'];
        $product1 = mysqli_query($conn, "SELECT * FROM customer INNER JOIN product_catalog ON customer.customer_id=$customer_id = product_catalog.catalog_id=$catalog_id");
        $row1 = mysqli_fetch_assoc($product1);
        if(isset($_POST['proceed1'])){
            $hidden_customer_id = $_POST['hidden_customer_id'];
            $hidden_catalog_id = $_POST['hidden_catalog_id'];
            $hidden_catalog_name = $_POST['hidden_catalog_name'];
            $hidden_catalog_image = $_POST['hidden_catalog_image'];
            $color = $_POST['color'];
            $type = $_POST['type'];
            $collar = $_POST['collar'];
            $select_front = $_POST['select-front'];
            $select_back = $_POST['select-back'];
            $small = $_POST['small'];
            $medium = $_POST['medium'];
            $large = $_POST['large'];
            $xlarge = $_POST['xlarge'];

            if(!empty($select_front)){
                $front_area = "front-area=".$select_front;
            }
            if(!empty($select_back)){
                $back_area = "back-area=".$select_back;
            }

                if (!empty($_FILES["upload_file_front"]["name"]) && !empty($_FILES["upload_file_back"]["name"])) {
                    $file = $_FILES["upload_file_front"];
                    $file2 = $_FILES["upload_file_back"];
                
                    $fileName = $file["name"];
                    $fileName2 = $file2["name"];
                
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $fileExtension2 = pathinfo($fileName2, PATHINFO_EXTENSION);
                
                    $allowedExtension = "png";
                
                    if (strtolower($fileExtension) === $allowedExtension && strtolower($fileExtension2) === $allowedExtension) {
                        $target_dir = "../customer-image/";
                        $target_file = $target_dir . basename($_FILES['upload_file_front']["name"]);
                        move_uploaded_file($_FILES['upload_file_front']["tmp_name"], $target_file);
                
                        $target_dir2 = "../customer-image/";
                        $target_file2 = $target_dir2 . basename($_FILES['upload_file_back']["name"]);
                        move_uploaded_file($_FILES['upload_file_back']["tmp_name"], $target_file2);
                
                        mysqli_query($conn, "INSERT INTO `product1`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`, `product_color`, `product_type`, `product_collar`, `product_print_area_front`,`product_print_area_back`,`small`,`medium`,`large`,`xlarge`,`customer_image`) VALUES ('$hidden_customer_id','$hidden_catalog_id','$hidden_catalog_image','$hidden_catalog_name','$color','$type','$collar','$select_front','$back_area','$small','$medium','$large','$xlarge','$target_file')");
                        header("Location:product-preview.php?catalog_id=$row1[catalog_id]&color=$color&collar=$collar&$front_area&$back_area&customer-image=".basename($target_file)."&customer-images=".basename($target_file2)."");
                    } else {
                        echo "<script> alert('Error: Only PNG files are allowed!')</script>";
                    }
                } else if (!empty($_FILES["upload_file_front"]["name"]) && empty($_FILES["upload_file_back"]["name"])) {
                    $file = $_FILES["upload_file_front"];
                    $fileName = $file["name"];
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $allowedExtension = "png";
                
                    if (strtolower($fileExtension) === $allowedExtension) {
                        $target_dir = "../customer-image/";
                        $target_file = $target_dir . basename($_FILES['upload_file_front']["name"]);
                        move_uploaded_file($_FILES['upload_file_front']["tmp_name"], $target_file);
                
                        mysqli_query($conn, "INSERT INTO `product1`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`, `product_color`, `product_type`, `product_collar`, `product_print_area_front`,`product_print_area_back`,`small`,`medium`,`large`,`xlarge`,`customer_image`) VALUES ('$hidden_customer_id','$hidden_catalog_id','$hidden_catalog_image','$hidden_catalog_name','$color','$type','$collar','$select_front','','$small','$medium','$large','$xlarge','$target_file')");
                        header("Location:product-preview.php?catalog_id=$row1[catalog_id]&color=$color&collar=$collar&$front_area&$back_area&customer-image=".basename($target_file));
                    } else {
                        echo "<script> alert('Error: Only PNG files are allowed!')</script>";
                    }
                }else if (empty($_FILES["upload_file_front"]["name"]) && !empty($_FILES["upload_file_back"]["name"])) {
                    $file2 = $_FILES["upload_file_back"];
                    $fileName2 = $file2["name"];
                    $fileExtension2 = pathinfo($fileName2, PATHINFO_EXTENSION);
                    $allowedExtension = "png";
                    
                    if (strtolower($fileExtension2) === $allowedExtension) {
                        $target_dir2 = "../customer-image/";
                        $target_file2 = $target_dir2 . basename($_FILES['upload_file_back']["name"]);
                        move_uploaded_file($_FILES['upload_file_back']["tmp_name"], $target_file2);

                        mysqli_query($conn, "INSERT INTO `product1`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`, `product_color`, `product_type`, `product_collar`, `product_print_area_front`,`product_print_area_back`,`small`,`medium`,`large`,`xlarge`,`customer_image`) VALUES ('$hidden_customer_id','$hidden_catalog_id','$hidden_catalog_image','$hidden_catalog_name','$color','$type','$collar','','$select_back','$small','$medium','$large','$xlarge','$target_file')");
                        header("Location:product-preview.php?catalog_id=$row1[catalog_id]&color=$color&collar=$collar&$front_area&$back_area&customer-images=".basename($target_file2));
                    } else {
                        echo "<script> alert('Error: Only PNG files are allowed!')</script>";
                    } 
                } else {
                    echo "<script> alert('Error: No file uploaded!')</script>";
                }
        
        }
        
    ?>
    <section>
        
            <div class="section-header ">
                <h1><span><a href="userpage.php">Home</a></span> > <?= $row1['catalog_name']; ?></h1>
            </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row1['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                    <h1>Customized <?= $row1['catalog_name']; ?></h1>
    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="color name">
                            <label for="color">Color</label>
                            <select name="color" id="color">
                                <option value="">Select color</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                                <option value="Blue">Blue</option>
                                <option value="Red">Red</option>
                            </select>
                        </div>

                        <div class="type name">
                            <label for="type">Type</label>
                            <select name="type" id="type">
                                <option value="">Select type</option>
                                <option value="Cotton">Cotton</option>
                                <option value="Drifit">Drifit</option>
                                <option value="Contton-spandex">Contton Spandex</option>
                            </select>
                        </div>

                        <div class="collar name">
                            <label for="collar">Collar</label>
                            <select name="collar" id="collar">
                                <option value="">Select collar</option>
                                <option value="Crew-neck">Crew Neck</option>
                                <option value="V-neck">V Neck</option>
                            </select>
                        </div>

                        <div class="print-area one name">
                            <label for="print-area">Print Area</label>
                            <select name="select-front" id="select-front" onchange="toggleInputFront()">
                                <option value="">Select front area</option>
                                <option value="Full Front">Full Front 12 x 12 ₱120</option>
                                <option value="Medium Front">Medium Front 8 x 8 ₱80</option>
                                <option value="Center Chest">Center Chest 5 x 6 ₱50</option>
                                <option value="Across Chest">Across Chest 4 x 12 ₱80</option>
                                <option value="Right Chest">Right Chest 5 x 5 ₱45</option>
                                <option value="Left Chest">Left Chest 5 x 5 ₱45</option>
                                <option value="Right Vertical">Right Vertical 5 x 12 ₱85</option>
                                <option value="Left Vertical">Left Vertical 5 x 12 ₱85</option>
                                <option value="Left Bottom">Left Bottom 6 x 5 ₱50</option>
                                <option value="Right Bottom">Right Bottom 6 x ₱50</option>
                            </select>
                            <button id="print-area-show1">Show</button>
                            <div class="front-area-popup" id="front-area-popup">
                                <span id="front-area-popup-exit">X</span>
                                <div class="front-area-popup-box">
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-full.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Full Front</h2>
                                            <p>12 x 12</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-medium.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Medium Front</h2>
                                            <p>8 x 8</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-center.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Center Chest</h2>
                                            <p>5 x 6</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-across.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Across Center</h2>
                                            <p>4 x 12</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-rightchest.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Right Chest</h2>
                                            <p>5 x 5</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-leftchest.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Left Chest</h2>
                                            <p>5 x 5</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-rightvertical.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Right Vertical</h2>
                                            <p>5 x 12</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-leftvertical.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Left Vertical</h2>
                                            <p>5 x 12</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-bottomleft.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Left Bottom</h2>
                                            <p>6 x 5</p>
                                        </div>
                                    </div>
                                    <div class="front-area-card">
                                        <img src="images/tshirt-front-bottomright.png" alt="">
                                        <div class="front-area-card-text">
                                            <h2>Right Bottom</h2>
                                            <p>6 x 5</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="print-area two name">
                            <label for="print-area">Print Area</label>
                            <select name="select-back" id="select-back" onchange="toggleInputBack()">
                                <option value="">Select back area</option>
                                <option value="Full Back">Full Back 12 x 12 ₱120</option>
                                <option value="Medium Back">Medium Back 8 x 8 ₱80</option>
                                <option value="Across Back">Across Back 4 x 12 ₱80</option>
                                <option value="Back Patch">Back Patch 5 x 6 ₱50</option>
                            </select>
                            <button id="print-area-show2">Show</button>
                            <div class="back-area-popup" id="back-area-popup">
                                <span id="back-area-popup-exit">X</span>
                                <div class="back-area-popup-box">
                                    <div class="back-area-card">
                                        <img src="images/tshirt-back-full.png" alt="">
                                        <div class="back-area-card-text">
                                            <h2>Full Back</h2>
                                            <p>12 x 12</p>
                                        </div>
                                    </div>
                                    <div class="back-area-card">
                                        <img src="images/tshirt-back-medium.png" alt="">
                                        <div class="back-area-card-text">
                                            <h2>Medium Back</h2>
                                            <p>8 x 8</p>
                                        </div>
                                    </div>
                                    <div class="back-area-card">
                                        <img src="images/tshirt-back-across.png" alt="">
                                        <div class="back-area-card-text">
                                            <h2>Across Back</h2>
                                            <p>4 x 12</p>
                                        </div>
                                    </div>
                                    <div class="back-area-card">
                                        <img src="images/tshirt-back-patch.png" alt="">
                                        <div class="back-area-card-text">
                                            <h2>Back Patch</h2>
                                            <p>5 x 6</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="hidden_customer_id" value="<?= $row1['customer_id'] ?>">
                        <input type="hidden" name="hidden_catalog_id" value="<?= $row1['catalog_id'] ?>">
                        <input type="hidden" name="hidden_catalog_name" value="<?= $row1['catalog_name'] ?>">
                        <input type="hidden" name="hidden_catalog_image" value="<?= $row1['catalog_image'] ?>">
                        
                        <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="small" id="" placeholder="S" maxlength="3">
                                <input type="text" name="medium" id="" placeholder="M" maxlength="3">
                                <input type="text" name="large" id="" placeholder="L" maxlength="3">
                                <input type="text" name="xlarge" id="" placeholder="XL" maxlength="3">
                            </div>
                            <button id="size-info">size info</button>
                            <div class="popupSizeInfo" id="popupSizeInfo">
                                <span id="popupSizeInfoExit">X</span>
                                <img src="images/xs.png" width="600px" alt="">
                            </div>
                        </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload file for front</label>
                            <input type="file" name="upload_file_front" id="upload_file" accept="png" disabled>
                        </div>
                        <div class="upload-file">
                            <label for="upload_file">Upload file for back</label>
                            <input type="file" name="upload_file_back" id="upload_file_back" accept="png" disabled>
                        </div>

                        <div class="proceed">
                            <button name="proceed1">Preview your design</button>
                        </div>
                    </form>
                
            </div>
        </div>
        <style>
            .popupSizeInfo{
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.4);
                display: none;
                align-items: center;
                justify-content: center;
            }
            .popupSizeInfo.removeSizeInfo{
                display: flex;
            }
            .popupSizeInfo #popupSizeInfoExit{
                font-size: 35px;
                color: white;
                cursor: pointer;
                position: absolute;
                top: 3%;
                right: 3%;
            }
        </style>
        <script>
            let size_info = document.getElementById("size-info");
            let popupSizeInfo = document.getElementById("popupSizeInfo");
            let popupSizeInfoExit = document.getElementById("popupSizeInfoExit");

            popupSizeInfoExit.addEventListener("click", () => {
                popupSizeInfo.classList.remove("removeSizeInfo");
            });
            size_info.addEventListener("click", function(e) {
                e.preventDefault();
                popupSizeInfo.classList.add("removeSizeInfo");
            });
            
        </script>
        <script>
            let print_area_show1 = document.getElementById("print-area-show1");
            let front_area_popup = document.getElementById("front-area-popup");
            let front_area_popup_exit = document.getElementById("front-area-popup-exit");

            print_area_show1.addEventListener("click", function(e) {
                e.preventDefault();
                front_area_popup.classList.add("show-front-popup");
            });
            front_area_popup_exit.addEventListener("click", () => {
                front_area_popup.classList.remove("show-front-popup");
            });

            let print_area_show2 = document.getElementById("print-area-show2");
            let back_area_popup  = document.getElementById("back-area-popup");
            let back_area_popup_exit = document.getElementById("back-area-popup-exit");

            print_area_show2.addEventListener("click", function(event) {
                event.preventDefault();
                back_area_popup.classList.add("show-back-popup");
            });
            back_area_popup_exit.addEventListener("click", () => {
                back_area_popup.classList.remove("show-back-popup");
            });

            function toggleInputFront() {
                var select = document.getElementById("select-front");
                var input = document.getElementById("upload_file");
                if (select.value !== "") {
                    input.removeAttribute("disabled");
                } else {
                    input.setAttribute("disabled", "disabled");
                }
            }
            function toggleInputBack() {
                var select_back = document.getElementById("select-back");
                var input_back = document.getElementById("upload_file_back");
                if (select_back.value !== "") {
                    input_back.removeAttribute("disabled");
                } else {
                    input_back.setAttribute("disabled", "disabled");
                }
            }

        </script>
    
    </section>
<?php } else if(isset($_GET['catalog_id2']) == 2){
      $catalog_id2 = $_GET['catalog_id2'];
      $customer_id2 = $_SESSION['customer_id'];
      $product2 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = $catalog_id2");
      $row2 = mysqli_fetch_assoc($product2);
      $product22 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $customer_id2");
      $row22 = mysqli_fetch_assoc($product22);
      if(isset($_POST['proceed2'])){
        $hidden_customer_id2 = $_POST['hidden_customer_id2'];
        $hidden_catalog_name2 = $_POST['hidden_catalog_name2'];
        $hidden_catalog_image2 = $_POST['hidden_catalog_image2'];
        $hidden_catalog_id2 = $_POST['hidden_catalog_id2'];
        $type2 = $_POST['type2'];
        $select_print_area2 = $_POST['select-print-area2'];
        $quantity2 = $_POST['quantity2'];

        $target_dir2 = "../customer-image/";
        $target_file2 =$target_dir2.basename($_FILES['upload_file2']["name"]);
        move_uploaded_file($_FILES['upload_file2']["tmp_name"], $target_file2);

        mysqli_query($conn, "INSERT INTO `product2`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`, `product_type`,`product_print_area`,`product_quantity`,`product_upload_image`) VALUES ('$hidden_customer_id2','$hidden_catalog_id2','$hidden_catalog_image2','$hidden_catalog_name2','$type2','$select_print_area2','$quantity2','$target_file2')");
    
        header("Location:product-preview.php?catalog_id2=$row2[catalog_id]&print_area2=$select_print_area2&type2=$type2&customer-image2=".basename($target_file2));
       
    }
    ?>
    <section>
        
        <div class="section-header ">
            <h1><span><a href="userpage.php">Home</a></span> > <?= $row2['catalog_name']; ?></h1>
        </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row2['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                <h1>Customized <?= $row2['catalog_name']; ?></h1>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="type name">
                        <label for="type">Type</label>
                        <select name="type2" id="type">
                            <option value="">Select type</option>
                            <option value="Classic-mug">Classic Mug ₱100</option>
                            <option value="Magic-mug">Magic Mug ₱150</option>
                        </select>
                    </div>

                    <div class="print-area mug name">
                        <label for="print-area2">Print Area</label>
                        <select name="select-print-area2" id="print-area2">
                            <option value="">Select print area</option>
                            <option value="Single">Single</option>
                            <option value="Wrapped">Wrapped</option>
                        </select>
                        <button id="show-popup-mug">Show</button>
                        <div class="mug-area-popup" id="mug-area-popup">
                                <span id="mug-area-popup-exit">X</span>
                                <div class="mug-area-popup-box">
                                    <div class="mug-area-card">
                                        <img src="images/mug-single.png" alt="">
                                        <div class="mug-area-card-text">
                                            <h2>Single</h2>
                                        </div>
                                    </div>
                                    <div class="mug-area-card">
                                        <img src="images/mug-wrap.png" alt="">
                                        <div class="mug-area-card-text">
                                            <h2>Wrapped</h2>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <input type="hidden" name="hidden_customer_id2" value="<?= $row22['customer_id'] ?>">
                    <input type="hidden" name="hidden_catalog_id2" value="<?= $row2['catalog_id'] ?>">
                    <input type="hidden" name="hidden_catalog_name2" value="<?= $row2['catalog_name'] ?>">
                    <input type="hidden" name="hidden_catalog_image2" value="<?= $row2['catalog_image'] ?>">


                    <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="quantity2" id="" maxlength="3" required>
                            </div>
                    </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload File</label>
                            <input type="file" name="upload_file2" id="upload_file" accept="png">
                        </div>

                        <div class="proceed">
                            <button name="proceed2">Preview your design</button>
                        </div>
                </form>
            
            </div>
            <script>
                let show_popup_mug = document.getElementById("show-popup-mug");
                let mug_area_popup = document.getElementById("mug-area-popup");
                let mug_area_popup_exit = document.getElementById("mug-area-popup-exit");

                show_popup_mug.addEventListener("click", function(e) {
                    e.preventDefault();
                    mug_area_popup.classList.add("show-mug-popup");
                });
                mug_area_popup_exit.addEventListener("click", () => {
                    mug_area_popup.classList.remove("show-mug-popup");
                });
            </script>
        </div>
    </section>
<?php } else if(isset($_GET['catalog_id3']) == 3){
      $catalog_id3 = $_GET['catalog_id3'];
      $customer_id3 = $_SESSION['customer_id'];
      $product3 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = $catalog_id3");
      $row3 = mysqli_fetch_assoc($product3);
      $product33 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $customer_id3");
      $row33 = mysqli_fetch_assoc($product33);
      if(isset($_POST['proceed3'])){
        $hidden_customer_id3 = $_POST['hidden_customer_id3'];
        $hidden_catalog_name3  = $_POST['hidden_catalog_name3'];
        $hidden_catalog_image3  = $_POST['hidden_catalog_image3'];
        $hidden_catalog_id3  = $_POST['hidden_catalog_id3'];
        $quantity3 = $_POST['quantity3'];
        
        if (isset($_FILES["upload_file3"])) {
            $file3 = $_FILES["upload_file3"];

            $fileName3 = $file3["name"];
            $fileExtension3 = pathinfo($fileName3, PATHINFO_EXTENSION);
    
            $allowedExtension3 = "png";
    
            if (strtolower($fileExtension3) === $allowedExtension3) {
                    $target_dir3 = "../customer-image/";
                    $target_file3 =$target_dir3.basename($_FILES['upload_file3']["name"]);
                    move_uploaded_file($_FILES['upload_file3']["tmp_name"], $target_file3);

                    mysqli_query($conn, "INSERT INTO `product3`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`,`product_quantity`,`product_upload_image`) VALUES ('$hidden_customer_id3','$hidden_catalog_id3','$hidden_catalog_image3','$hidden_catalog_name3','$quantity3','$target_file3')");
                
                    header("Location:product-preview.php?catalog_id3=$row3[catalog_id]&customer-image3=".basename($target_file3));
                } else {
                    echo "<script> alert('Error: Only PNG files are allowed!')</script>";
                }
            } else {
                echo "<script> alert('Error: No file uploaded!')</script>";
            }
      }
        
    ?>
    <section>
        
        <div class="section-header ">
            <h1><span><a href="userpage.php">Home</a></span> > <?= $row3['catalog_name']; ?></h1>
        </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row3['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                    <h1>Customized <?= $row3['catalog_name']; ?></h1>

                    <form action="" method="post" enctype="multipart/form-data">
                
                        <input type="hidden" name="hidden_customer_id3" value="<?= $row33['customer_id'] ?>">
                        <input type="hidden" name="hidden_catalog_id3" value="<?= $row3['catalog_id'] ?>">
                        <input type="hidden" name="hidden_catalog_name3" value="<?= $row3['catalog_name'] ?>">
                        <input type="hidden" name="hidden_catalog_image3" value="<?= $row3['catalog_image'] ?>">
                        <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="quantity3" id=""maxlength="3" required>
                            </div>
                        </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload File</label>
                            <input type="file" name="upload_file3" id="upload_file" accept="png">
                        </div>

                        <div class="proceed">
                            <button name="proceed3">Preview your design</button>
                        </div>
                    </form>
            </div>
        </div>
       
    </section>
<?php } else if(isset($_GET['catalog_id4']) == 4){
      $catalog_id4 = $_GET['catalog_id4'];
      $customer_id4 = $_SESSION['customer_id'];
      $product4 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = $catalog_id4");
      $row4 = mysqli_fetch_assoc($product4);
      $product44 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $customer_id4");
      $row44 = mysqli_fetch_assoc($product44);
      if(isset($_POST['proceed4'])){
        $hidden_customer_id4 = $_POST['hidden_customer_id4'];
        $hidden_catalog_name4  = $_POST['hidden_catalog_name4'];
        $hidden_catalog_image4  = $_POST['hidden_catalog_image4'];
        $hidden_catalog_id4  = $_POST['hidden_catalog_id4'];
        $select_print_area4 = $_POST['select-print-area4'];
        $quantity4 = $_POST['quantity4'];

            if (isset($_FILES["upload_file4"])) {
                $file4 = $_FILES["upload_file4"];

                $fileName4 = $file4["name"];
                $fileExtension4 = pathinfo($fileName4, PATHINFO_EXTENSION);
        
                $allowedExtension4 = "png";
        
                if (strtolower($fileExtension4) === $allowedExtension4) {
                    $target_dir4 = "../customer-image/";
                    $target_file4 =$target_dir4.basename($_FILES['upload_file4']["name"]);
                    move_uploaded_file($_FILES['upload_file4']["tmp_name"], $target_file4);

                    mysqli_query($conn, "INSERT INTO `product4`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`,`product_quantity`,`product_upload_image`,`product_print_area`) VALUES ('$hidden_customer_id4','$hidden_catalog_id4','$hidden_catalog_image4','$hidden_catalog_name4','$quantity4','$target_file4','$select_print_area4')");
                    header("Location:product-preview.php?customer_id4=$customer_id4&catalog_id4=$row4[catalog_id]&print-area4=$select_print_area4&customer-image4=".basename($target_file4));
                    } else {
                        echo "<script> alert('Error: Only PNG files are allowed!')</script>";
                    }
            } else {
                    echo "<script> alert('Error: No file uploaded!')</script>";
            }
      }
        
    ?>
    <section>
        
        <div class="section-header ">
            <h1><span><a href="userpage.php">Home</a></span> > <?= $row4['catalog_name']; ?></h1>
        </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row4['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                    <h1>Customized <?= $row4['catalog_name']; ?></h1>

                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="print-area totebag name">
                            <label for="print-area4">Print Area</label>
                            <select name="select-print-area4" id="print-area4">
                                <option value="">Select print area</option>
                                <option value="Full">Full ₱70</option>
                                <option value="Banner">Banner ₱55</option>
                                <option value="Portrait">Portrait ₱60</option>
                                <option value="Medium">Medium ₱50</option>
                            </select>
                            <button id="show-popup-totebag">Show</button>
                            <div class="totebag-area-popup" id="totebag-area-popup">
                                <span id="totebag-area-popup-exit">X</span>
                                <div class="totebag-area-popup-box">
                                    <div class="totebag-area-card">
                                        <img src="images/totebag-full.png" alt="">
                                        <div class="totebag-area-card-text">
                                            <h2>Full</h2>
                                        </div>
                                    </div>
                                    <div class="totebag-area-card">
                                        <img src="images/totebag-banner.png" alt="">
                                        <div class="totebag-area-card-text">
                                            <h2>Banner</h2>
                                        </div>
                                    </div>
                                    <div class="totebag-area-card">
                                        <img src="images/totebag-portrait.png" alt="">
                                        <div class="totebag-area-card-text">
                                            <h2>Portrait</h2>
                                        </div>
                                    </div>
                                    <div class="totebag-area-card">
                                        <img src="images/totebag-medium.png" alt="">
                                        <div class="totebag-area-card-text">
                                            <h2>Medium</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="hidden_customer_id4" value="<?= $row44['customer_id'] ?>">
                        <input type="hidden" name="hidden_catalog_id4" value="<?= $row4['catalog_id'] ?>">
                        <input type="hidden" name="hidden_catalog_name4" value="<?= $row4['catalog_name'] ?>">
                        <input type="hidden" name="hidden_catalog_image4" value="<?= $row4['catalog_image'] ?>">
                        <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="quantity4" id=""maxlength="3" required>
                            </div>
                        </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload File</label>
                            <input type="file" name="upload_file4" id="upload_file" accept="png">
                        </div>

                        <div class="proceed">
                            <button name="proceed4">Preview your design</button>
                        </div>
                    </form>
            </div>
        </div>
        <script>
                let show_popup_totebag = document.getElementById("show-popup-totebag");
                let totebag_area_popup = document.getElementById("totebag-area-popup");
                let totebag_area_popup_exit = document.getElementById("totebag-area-popup-exit");

                show_popup_totebag.addEventListener("click", function(e) {
                    e.preventDefault();
                    totebag_area_popup.classList.add("show-totebag-popup");
                });
                totebag_area_popup_exit.addEventListener("click", () => {
                    totebag_area_popup.classList.remove("show-totebag-popup");
                });
        </script>
    </section>
<?php } else if(isset($_GET['catalog_id5']) == 5){
        $catalog_id5 = $_GET['catalog_id5'];
        $customer_id5 = $_SESSION['customer_id'];

        $product5 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = $catalog_id5");
        $row5 = mysqli_fetch_assoc($product5);
        $product55 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $customer_id5");
        $row55 = mysqli_fetch_assoc($product55);
        if(isset($_POST['proceed5'])){
            $hidden_customer_id5 = $_POST['hidden_customer_id5'];
            $hidden_catalog_name5  = $_POST['hidden_catalog_name5'];
            $hidden_catalog_image5  = $_POST['hidden_catalog_image5'];
            $hidden_catalog_id5  = $_POST['hidden_catalog_id5'];
            $quantity5 = $_POST['quantity5'];
            
            if ((isset($_FILES["upload_file5"]))) {
                $file5 = $_FILES["upload_file5"];
    
                $fileName5 = $file5["name"];
                $fileExtension5 = pathinfo($fileName5, PATHINFO_EXTENSION);
        
                $allowedExtension5 = "png";
        
                if (strtolower($fileExtension5) === $allowedExtension5) {
                    $target_dir5 = "../customer-image/";
                    $target_file5 =$target_dir5.basename($_FILES['upload_file5']["name"]);
                    move_uploaded_file($_FILES['upload_file5']["tmp_name"], $target_file5);

                    mysqli_query($conn, "INSERT INTO `product5`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`,`product_quantity`,`product_upload_image`) VALUES ('$hidden_customer_id5','$hidden_catalog_id5','$hidden_catalog_image5','$hidden_catalog_name5','$quantity5','$target_file5')");
        
                    header("Location:product-preview.php?catalog_id5=$row5[catalog_id]&customer-image5=".basename($target_file5));
                    } else {
                        echo "<script> alert('Error: Only PNG files are allowed!')</script>";
                    }
                } else {
                    echo "<script> alert('Error: No file uploaded!')</script>";
                }
        }
        
    ?>
    <section>
        
        <div class="section-header ">
            <h1><span><a href="userpage.php">Home</a></span> > <?= $row5['catalog_name']; ?></h1>
        </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row5['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                    <h1>Customized <?= $row5['catalog_name']; ?></h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        
                        <input type="hidden" name="hidden_customer_id5" value="<?= $row55['customer_id'] ?>">
                        <input type="hidden" name="hidden_catalog_id5" value="<?= $row5['catalog_id'] ?>">
                        <input type="hidden" name="hidden_catalog_name5" value="<?= $row5['catalog_name'] ?>">
                        <input type="hidden" name="hidden_catalog_image5" value="<?= $row5['catalog_image'] ?>">
                        <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="quantity5" id=""maxlength="3" required>
                            </div>
                        </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload File</label>
                            <input type="file" name="upload_file5" id="upload_file" accept="png">
                        </div>

                        <div class="proceed">
                            <button name="proceed5">Preview your design</button>
                        </div>
                    </form>
            </div>
        </div>
    </section>
<?php } else if(isset($_GET['catalog_id6']) == 6){
      $catalog_id6 = $_GET['catalog_id6'];
      $customer_id6 = $_SESSION['customer_id'];

      $product6 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = $catalog_id6");
      $row6 = mysqli_fetch_assoc($product6);
      $product66 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $customer_id6");
      $row66 = mysqli_fetch_assoc($product66);
      if(isset($_POST['proceed6'])){
          $hidden_customer_id6 = $_POST['hidden_customer_id6'];
          $hidden_catalog_name6  = $_POST['hidden_catalog_name6'];
          $hidden_catalog_image6  = $_POST['hidden_catalog_image6'];
          $hidden_catalog_id6  = $_POST['hidden_catalog_id6'];
          $quantity6 = $_POST['quantity6'];
          
        if ((isset($_FILES["upload_file6"]))) {
            $file6 = $_FILES["upload_file6"];

            $fileName6 = $file6["name"];
            $fileExtension6 = pathinfo($fileName6, PATHINFO_EXTENSION);
    
            $allowedExtension6 = "png";
    
            if (strtolower($fileExtension6) === $allowedExtension6) {
                $target_dir6 = "../customer-image/";
                $target_file6 =$target_dir6.basename($_FILES['upload_file6']["name"]);
                move_uploaded_file($_FILES['upload_file6']["tmp_name"], $target_file6);

                mysqli_query($conn, "INSERT INTO `product6`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`,`product_quantity`,`product_upload_image`) VALUES ('$hidden_customer_id6','$hidden_catalog_id6','$hidden_catalog_image6','$hidden_catalog_name6','$quantity6','$target_file6')");
                
                header("Location:product-preview.php?catalog_id6=$row6[catalog_id]&customer-image6=".basename($target_file6));
            } else {
                echo "<script> alert('Error: Only PNG files are allowed!')</script>";
            }
        } else {
            echo "<script> alert('Error: No file uploaded!')</script>";
        }
      }
        
    ?>
    <section>
        
        <div class="section-header ">
            <h1><span><a href="userpage.php">Home</a></span> > <?= $row6['catalog_name']; ?></h1>
        </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row6['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                    <h1>Customized <?= $row6['catalog_name']; ?></h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="hidden_customer_id6" value="<?= $row66['customer_id'] ?>">
                        <input type="hidden" name="hidden_catalog_id6" value="<?= $row6['catalog_id'] ?>">
                        <input type="hidden" name="hidden_catalog_name6" value="<?= $row6['catalog_name'] ?>">
                        <input type="hidden" name="hidden_catalog_image6" value="<?= $row6['catalog_image'] ?>">
                        <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="quantity6" id=""maxlength="3" required>
                            </div>
                        </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload File</label>
                            <input type="file" name="upload_file6" id="upload_file" accept="png">
                        </div>

                        <div class="proceed">
                            <button name="proceed6">Preview your design</button>
                        </div>
                    </form>
            </div>
        </div>
    </section>
<?php } else if(isset($_GET['catalog_id7']) == 7){
      $catalog_id7 = $_GET['catalog_id7'];
      $customer_id7 = $_SESSION['customer_id'];
      $product7 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = $catalog_id7");
      $row7 = mysqli_fetch_assoc($product7);
      $product77 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $customer_id7");
      $row77 = mysqli_fetch_assoc($product77);

      if(isset($_POST['proceed7'])){
        $hidden_customer_id7 = $_POST['hidden_customer_id7'];
        $hidden_catalog_name7  = $_POST['hidden_catalog_name7'];
        $hidden_catalog_image7  = $_POST['hidden_catalog_image7'];
        $hidden_catalog_id7  = $_POST['hidden_catalog_id7'];
        $color7 = $_POST['color7'];
        $quantity7 = $_POST['quantity7'];
        $select_print_area7 = $_POST['select-print-area7'];
        
        if ((isset($_FILES["upload_file7"]))) {
            $file7 = $_FILES["upload_file7"];

            $fileName7 = $file7["name"];
            $fileExtension7 = pathinfo($fileName7, PATHINFO_EXTENSION);
    
            $allowedExtension7 = "png";
    
            if (strtolower($fileExtension7) === $allowedExtension7) {
                $target_dir7 = "../customer-image/";
                $target_file7 =$target_dir7.basename($_FILES['upload_file7']["name"]);
                move_uploaded_file($_FILES['upload_file7']["tmp_name"], $target_file7);

                mysqli_query($conn, "INSERT INTO `product7`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`,`product_color`,`product_quantity`,`product_print_area`,`product_upload_image`) VALUES ('$hidden_customer_id7','$hidden_catalog_id7','$hidden_catalog_image7','$hidden_catalog_name7','$color7','$quantity7','$select_print_area7','$target_file7')");
    
                header("Location:product-preview.php?catalog_id7=$row7[catalog_id]&color=$color7&print-area7=$select_print_area7&customer-image7=".basename($target_file7));
            } else {
                echo "<script> alert('Error: Only PNG files are allowed!')</script>";
            }
        } else {
            echo "<script> alert('Error: No file uploaded!')</script>";
        }
       }
        
    ?>
    <section>
        
        <div class="section-header ">
            <h1><span><a href="userpage.php">Home</a></span> > <?= $row7['catalog_name']; ?></h1>
        </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row7['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                    <h1>Customized <?= $row7['catalog_name']; ?></h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="color name">
                            <label for="color">Color</label>
                            <select name="color7" id="color" required>
                                <option value="">Select color</option>
                                <option value="Black">Black</option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                                <option value="White">White</option>
                            </select>
                        </div>

                        <div class="print-area tumbler name">
                            <label for="print-area7">Print Area</label>
                            <select name="select-print-area7" required id="print-area7">
                                <option value="">Select print area</option>
                                <option value="Full">Full ₱70</option>
                                <option value="Medium">Medium ₱50</option>
                                <option value="Icon">Icon ₱35</option>
                                <option value="Bottom">Bottom ₱45</option>
                        </select>
                            <button id="show-popup-tumbler">Show</button>
                            <div class="tumbler-area-popup" id="tumbler-area-popup">
                                <span id="tumbler-area-popup-exit">X</span>
                                <div class="tumbler-area-popup-box">
                                    <div class="tumbler-area-card">
                                        <img src="images/tumbler-full.png" alt="">
                                        <div class="tumbler-area-card-text">
                                            <h2>Full</h2>
                                        </div>
                                    </div>
                                    <div class="tumbler-area-card">
                                        <img src="images/tumbler-medium.png" alt="">
                                        <div class="tumbler-area-card-text">
                                            <h2>Medium</h2>
                                        </div>
                                    </div>
                                    <div class="tumbler-area-card">
                                        <img src="images/tumbler-icon.png" alt="">
                                        <div class="tumbler-area-card-text">
                                            <h2>Icon</h2>
                                        </div>
                                    </div>
                                    <div class="tumbler-area-card">
                                        <img src="images/tumbler-footer.png" alt="">
                                        <div class="tumbler-area-card-text">
                                            <h2>Bottom</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="hidden_customer_id7" value="<?= $row77['customer_id'] ?>">
                        <input type="hidden" name="hidden_catalog_id7" value="<?= $row7['catalog_id'] ?>">
                        <input type="hidden" name="hidden_catalog_name7" value="<?= $row7['catalog_name'] ?>">
                        <input type="hidden" name="hidden_catalog_image7" value="<?= $row7['catalog_image'] ?>">
                        <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="quantity7" id=""maxlength="3" required>
                            </div>
                        </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload File</label>
                            <input type="file" name="upload_file7" id="upload_file" accept="png">
                        </div>

                        <div class="proceed">
                            <button name="proceed7">Preview your design</button>
                        </div>
                    </form>
            </div>
        </div>
        <script>
                let show_popup_tumbler = document.getElementById("show-popup-tumbler");
                let tumbler_area_popup = document.getElementById("tumbler-area-popup");
                let tumbler_area_popup_exit = document.getElementById("tumbler-area-popup-exit");

                show_popup_tumbler.addEventListener("click", function(e) {
                    e.preventDefault();
                    tumbler_area_popup.classList.add("show-tumbler-popup");
                });
                tumbler_area_popup_exit.addEventListener("click", () => {
                    tumbler_area_popup.classList.remove("show-tumbler-popup");
                });
        </script>
    </section>
<?php } else if(isset($_GET['catalog_id8']) == 8){
      $catalog_id8 = $_GET['catalog_id8'];
      $customer_id8 = $_SESSION['customer_id'];
      $product8 = mysqli_query($conn, "SELECT * FROM product_catalog WHERE catalog_id = $catalog_id8");
      $row8 = mysqli_fetch_assoc($product8);
      $product88 = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = $customer_id8");
      $row88 = mysqli_fetch_assoc($product88);

      if(isset($_POST['proceed8'])){
        $hidden_customer_id8 = $_POST['hidden_customer_id8'];
        $hidden_catalog_name8  = $_POST['hidden_catalog_name8'];
        $hidden_catalog_image8  = $_POST['hidden_catalog_image8'];
        $hidden_catalog_id8  = $_POST['hidden_catalog_id8'];
        $quantity8 = $_POST['quantity8'];
        
        if ((isset($_FILES["upload_file8"]))) {
            $file8 = $_FILES["upload_file8"];

            $fileName8 = $file8["name"];
            $fileExtension8 = pathinfo($fileName8, PATHINFO_EXTENSION);
    
            $allowedExtension8 = "png";
    
            if (strtolower($fileExtension8) === $allowedExtension8) {
                $target_dir8 = "../customer-image/";
                $target_file8 =$target_dir8.basename($_FILES['upload_file8']["name"]);
                move_uploaded_file($_FILES['upload_file8']["tmp_name"], $target_file8);

                mysqli_query($conn, "INSERT INTO `product8`(`customer_id`,`catalog_id`,`catalog_image`, `catalog_name`,`product_quantity`,`product_upload_image`) VALUES ('$hidden_customer_id8','$hidden_catalog_id8','$hidden_catalog_image8','$hidden_catalog_name8','$quantity8','$target_file8')");
            
                header("Location:product-preview.php?catalog_id8=$row8[catalog_id]&customer-image8=".basename($target_file8));
            } else {
                echo "<script> alert('Error: Only PNG files are allowed!')</script>";
            }
        } else {
            echo "<script> alert('Error: No file uploaded!')</script>";
        }
  
    }
        
    ?>
    <section>
        
        <div class="section-header ">
            <h1><span><a href="userpage.php">Home</a></span> > <?= $row8['catalog_name']; ?></h1>
        </div>

        <div class="content">

            <div class="section-left-image">
                <div class="display-image">
                        <img src="<?= $row8['catalog_image']; ?>" alt="" id="displayImage">
                </div>

            </div>

            <div class="section-right-content">
                    <h1>Customized <?= $row8['catalog_name']; ?></h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="hidden_customer_id8" value="<?= $row88['customer_id'] ?>">
                        <input type="hidden" name="hidden_catalog_id8" value="<?= $row8['catalog_id'] ?>">
                        <input type="hidden" name="hidden_catalog_name8" value="<?= $row8['catalog_name'] ?>">
                        <input type="hidden" name="hidden_catalog_image8" value="<?= $row8['catalog_image'] ?>">
                        <div class="quantity">
                            <label for="">Quantity</label>
                            <div class="inputs">
                                <input type="text" name="quantity8" id=""maxlength="3" required>
                            </div>
                        </div>

                        <div class="upload-file">
                            <label for="upload_file">Upload File</label>
                            <input type="file" name="upload_file8" id="upload_file" accept="png">
                        </div>

                        <div class="proceed">
                            <button name="proceed8">Preview your design</button>
                        </div>
                    </form>
                
            </div>
        </div>
    </section>
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
        
<script>
</script>
</body>

<style>
    section{
        width: 100%;
        height: calc(100vh - 65px);
        position: relative;
    }
    section .section-header{
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
    }
    section .section-header h1{
        margin-left: 40px;
    }
    section .section-header h1 span a{
        color: #E16C69;
        text-decoration: none;
    }
    section .content{
        width: 100%;
        height: calc(100vh - 114.7px);
        display: flex;
    }
    section .content .section-left-image{
        width: 40%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }
    section .content .section-right-content{
        width: 60%;
        height: 90%;
    }
    section .content .section-left-image .display-image img{
        width: 300px;
        height: 470px;
    }
    .one{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .one #select-front{
        width: 500px;
    }
    .one #select-front{
        width: 500px;
    }
    .one #print-area2{
        width: 500px;
    }
    .two{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
    .two #select-front{
        width: 500px;
    }
    .two #select-back{
        width: 500px;
    }
    #print-area-show1, #print-area-show2, #show-popup-mug, #show-popup-totebag, #show-popup-tumbler{
        font-size: 16px;
        cursor: pointer;
        padding: 6px 10px;
    }
    .front-area-popup{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0,0,0,.3);
        display: none;
        align-items: center;
        justify-content: center;
        overflow: auto;
    }
    .front-area-popup.show-front-popup{
        display: flex;
    }
    #front-area-popup-exit{
        font-size: 35px;
        position: absolute;
        right: 3%;
        top: 3%;
        color: white;
        cursor: pointer;
    }
    .front-area-popup .front-area-popup-box{
        height: 100%;
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    .front-area-popup .front-area-card{
        width: 200px;
        height: auto;
        padding: 5px;
        background: beige;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .front-area-popup .front-area-card img{
        width: 100%;
    }
    .front-area-popup .front-area-card .front-area-card-text{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }
    .back-area-popup{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0,0,0,.3);
        display: none;
        align-items: center;
        justify-content: center;
        overflow: auto;
    }
    .back-area-popup.show-back-popup{
        display: flex;
    }
    #back-area-popup-exit{
        font-size: 35px;
        position: absolute;
        right: 3%;
        top: 3%;
        color: white;
        cursor: pointer;
    }
    .back-area-popup .back-area-popup-box{
        height: 100%;
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    .back-area-popup .back-area-card{
        width: 200px;
        height: auto;
        padding: 5px;
        background: beige;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .back-area-popup .back-area-card img{
        width: 100%;
    }
    .back-area-popup .back-area-card .back-area-card-text{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }





    .mug{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .mug #print-area2{
        width: 500px;
    }
    .mug-area-popup{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0,0,0,.3);
        display: none;
        align-items: center;
        justify-content: center;
        overflow: auto;
    }
    .mug-area-popup.show-mug-popup{
        display: flex;
    }
    #mug-area-popup-exit{
        font-size: 35px;
        position: absolute;
        right: 3%;
        top: 3%;
        color: white;
        cursor: pointer;
    }
    .mug-area-popup .mug-area-popup-box{
        height: 100%;
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
    }
    .mug-area-popup .mug-area-card{
        width: 300px;
        height: auto;
        padding: 5px;
        background: beige;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .mug-area-popup .mug-area-card img{
        width: 100%;
    }
    .mug-area-popup .mug-area-card .mug-area-card-text{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }




    .totebag{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .totebag #print-area4{
        width: 500px;
    }
    .totebag-area-popup{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0,0,0,.3);
        display: none;
        align-items: center;
        justify-content: center;
        overflow: auto;
    }
    .totebag-area-popup.show-totebag-popup{
        display: flex;
    }
    #totebag-area-popup-exit{
        font-size: 35px;
        position: absolute;
        right: 3%;
        top: 3%;
        color: white;
        cursor: pointer;
    }
    .totebag-area-popup .totebag-area-popup-box{
        height: 100%;
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
    }
    .totebag-area-popup .totebag-area-card{
        width: 250px;
        height: auto;
        padding: 5px;
        background: beige;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .totebag-area-popup .totebag-area-card img{
        width: 100%;
    }
    .totebag-area-popup .totebag-area-card .totebag-area-card-text{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }





    .tumbler{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .tumbler #print-area7{
        width: 500px;
    }
    .tumbler-area-popup{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0,0,0,.3);
        display: none;
        align-items: center;
        justify-content: center;
        overflow: auto;
    }
    .tumbler-area-popup.show-tumbler-popup{
        display: flex;
    }
    #tumbler-area-popup-exit{
        font-size: 35px;
        position: absolute;
        right: 3%;
        top: 3%;
        color: white;
        cursor: pointer;
    }
    .tumbler-area-popup .tumbler-area-popup-box{
        height: 100%;
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
    }
    .tumbler-area-popup .tumbler-area-card{
        width: 250px;
        height: auto;
        padding: 5px;
        background: beige;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .tumbler-area-popup .tumbler-area-card img{
        width: 100%;
    }
    .tumbler-area-popup .tumbler-area-card .tumbler-area-card-text{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

</style>
</html>

<?php ob_end_flush(); ?>