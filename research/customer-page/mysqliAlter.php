<?php
    include("connection.php");
    $msg = "";
    if(isset($_POST['alter'])){

        // Cart
        // <form action="" method="post">
        
        // mysqli_query($conn, "TRUNCATE adminn");
        // mysqli_query($conn, "ALTER TABLE adminn AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE customer");
        // mysqli_query($conn, "ALTER TABLE customer AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE adminproducts");
        // mysqli_query($conn, "ALTER TABLE adminproducts AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE customer_address");
        // mysqli_query($conn, "ALTER TABLE customer_address AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE customer_notification");
        // mysqli_query($conn, "ALTER TABLE customer_notification AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE audit_rel");
        // mysqli_query($conn, "ALTER TABLE audit_rel AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE checkout");
        // mysqli_query($conn, "ALTER TABLE checkout AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE received");
        // mysqli_query($conn, "ALTER TABLE received AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE topay");
        // mysqli_query($conn, "ALTER TABLE topay AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE sana");
        // mysqli_query($conn, "ALTER TABLE sana AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE toprocess");
        // mysqli_query($conn, "ALTER TABLE toprocess AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE toreceive");
        // mysqli_query($conn, "ALTER TABLE toreceive AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE toship");
        // mysqli_query($conn, "ALTER TABLE toship AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE cancelled");
        // mysqli_query($conn, "ALTER TABLE cancelled AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product1");
        // mysqli_query($conn, "ALTER TABLE product1 AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product2");
        // mysqli_query($conn, "ALTER TABLE product2 AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product3");
        // mysqli_query($conn, "ALTER TABLE product3 AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product4");
        // mysqli_query($conn, "ALTER TABLE product4 AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product5");
        // mysqli_query($conn, "ALTER TABLE product5 AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product6");
        // mysqli_query($conn, "ALTER TABLE product6 AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product7");
        // mysqli_query($conn, "ALTER TABLE product7 AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product8");
        // mysqli_query($conn, "ALTER TABLE product8 AUTO_INCREMENT = 1");


        // mysqli_query($conn, "TRUNCATE explore_add_to_cart");
        // mysqli_query($conn, "ALTER TABLE explore_add_to_cart AUTO_INCREMENT = 1");

        // mysqli_query($conn, "TRUNCATE product_process_checkout");
        // mysqli_query($conn, "ALTER TABLE product_process_checkout AUTO_INCREMENT = 1");

        $msg = "CLEAR DATABASE SUCCESSFULLY";

        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(1,'images/tshirt.jpg','T-shirt')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(2,'images/mug.jpg','Mug')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(3,'images/keyholder.jpg','keyholder')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(4,'images/totebag.jpg','Totebag')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(5,'images/coinpurse.jpg','Coinpurse')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(6,'images/decalsticker.jpg','Decal Sticker')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(7,'images/tumbler.jpg','Tumbler')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(8,'images/fridgemagnet.jpg','Fridge Magnet')");
        // mysqli_query($conn, "INSERT INTO product_catalog(catalog_id,catalog_image,catalog_name) VALUES(9,'images/shotglass.jpg','Shot Glass')");
    
    }
?>

<form action="" method="post">
    <button name="alter" style="cursor: pointer;">ALTER</button>
</form>
<br>
<?= $msg; ?>