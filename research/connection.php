<?php
    session_start();

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database_name = 'research';

    $conn = mysqli_connect($server, $username, $password, $database_name);

    
?>