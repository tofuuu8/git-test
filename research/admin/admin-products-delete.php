<?php
    include("config.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $delete = mysqli_query($conn, "DELETE FROM adminproducts WHERE id = $id ");

        header("Location:adminDashboardProducts.php?delete_msg=Delete successfully");
    }
?>