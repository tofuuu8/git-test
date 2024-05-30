<?php
    session_start();

    if(isset($_POST['goback'])){
        header("Location: ../login.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="timeout">
        <h1>Session Expired</h1>
        <div class="btn">
            <form action="" method="post">
                <button name="goback">Logout</button>
            </form>
        </div>
    </div>
</body>
<style>
    *{
        padding: 0;
        margin: 0;
        font-family: sans-serif;
        letter-spacing: 1px;
    }
    body{
        background: beige;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    .timeout{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .timeout h1{
        font-size: 50px;
        margin-bottom: 20px;
    }
    .timeout .btn button{
        padding: 6px 20px;
        font-size: 16px;
        cursor: pointer;
    }
</style>
</html>