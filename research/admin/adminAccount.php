<?php
    include("../connection.php");

    $username = "admin";
    $password = "admin";
    $email = "admin@gmail.com";

    $hash = password_hash($password, PASSWORD_BCRYPT);

    mysqli_query($conn, "INSERT INTO adminn(`username`,`email`,`password`) VALUES('$username','$email','$hash')");

?>