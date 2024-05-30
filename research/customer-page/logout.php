<?php
include("connection.php");
    $customer_id = $_SESSION['customer_id'];
    $query = mysqli_query($conn, "SELECT * FROM customer WHERE customer_id = '$customer_id'");
    $row = mysqli_fetch_assoc($query);
    $_SESSION['usernames'] = $row['username'];
    $usernames = $_SESSION['usernames'];
    $email = $row['email'];

    mysqli_query($conn, "INSERT INTO audit_rel(customer_id,email,username,customer_actions) VALUES('$customer_id','$email','$usernames','Logged out');");
    session_destroy();
    header("Location:../login.php");

?>