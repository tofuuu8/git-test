<?php
    include("config.php");

    if(isset($_POST['change']) && isset($_GET['id'])){
        $id = $_GET['id'];
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_color = $_POST['color'];
        $product_description = $_POST['description'];

        $target_dir ="../image/";
        $target_file =$target_dir.basename($_FILES['upload_file']["name"]);
        move_uploaded_file($_FILES['upload_file']["tmp_name"], $target_file);

        $change_info = mysqli_query($conn, "UPDATE adminproducts SET product_image = '$target_file', product_name = '$product_name', product_price = '$product_price', product_color = '$product_color', product_description = '$product_description' WHERE id = $id");

        if($change_info){
        header("Location:adminDashboardProducts.php?update_msg=Update successfully");
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = mysqli_query($conn, "SELECT * FROM adminproducts WHERE id = $id");

        while($row = mysqli_fetch_assoc($query)){
            $image = $row['product_image'];
            $name = $row['product_name'];
            $price = $row['product_price'];
            $color = $row['product_color'];
            $description = $row['product_description'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Document</title>
</head>
<body>
    <div class="center" id="center">
            <div class="box">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1>Change Info</h1>
                    <div class="inputs">
                        <input type="file" name="upload_file" id="" >
                    </div>
                    <div class="inputs">
                        <input type="text" name="name" id="" value="<?php echo $name; ?>">
                    </div>
                    <div class="inputs">
                        <input type="text" name="price" id="" value="<?php echo $price; ?>">
                    </div>
                    <div class="inputs">
                        <input type="text" name="color" id="" value="<?php echo $color; ?>">
                    </div>
                    <div class="inputs">
                        <textarea name="description" id="desciption" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </div>

                    <div class="inputs">
                        <button name="change">Change</button>
                    </div>
                </form>
            </div>
       </div>
</body>
<style>
*{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}
body{
    background: rgb(190, 183, 183);
}
.center{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.center .box{
    width: 400px;
    height: auto;
    padding: 20px;
    border-radius: 7px;
    background: white;
}
.center .box h1{
    text-align: center;
    margin-bottom: 15px;
}
.center .box .inputs{
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}
.center .box .inputs input{
    outline: none;
    padding: 7px;
}
.center .box .inputs textarea{
    outline: none;
    padding: 7px;
}
.center .box .inputs button{
    font-size: 17px;
    padding: 7px;
    cursor: pointer;
}
</style>
</html>