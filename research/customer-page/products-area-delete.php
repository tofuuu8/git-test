<?php
    include("../connection.php");

    if(isset($_GET['catalog_id']) && isset($_GET['id'])){
        $id = $_GET['id'];
        $catalog_id = $_GET['catalog_id'];

        mysqli_query($conn, "DELETE FROM `sana` WHERE id = $id");
        header("location: products.php?catalog_id=$catalog_id");

    }

    if(isset($_GET['catalog_id2']) && isset($_GET['id'])){
        $id2 = $_GET['id'];
        $catalog_id4 = $_GET['catalog_id2'];

        mysqli_query($conn, "DELETE FROM `sana` WHERE id = $id2");
        header("location: products.php?catalog_id2=$catalog_id2");

    }

    if(isset($_GET['catalog_id4']) && isset($_GET['id'])){
        $id4 = $_GET['id'];
        $catalog_id4 = $_GET['catalog_id4'];

        mysqli_query($conn, "DELETE FROM `sana` WHERE id = $id4");
        header("location: products.php?catalog_id4=$catalog_id4");

    }

    if(isset($_GET['catalog_id7']) && isset($_GET['id'])){
        $id7 = $_GET['id'];
        $catalog_id7 = $_GET['catalog_id7'];

        mysqli_query($conn, "DELETE FROM `sana` WHERE id = $id7");
        header("location: products.php?catalog_id7=$catalog_id7");

    }
?>