<?php
require("dbcon.php");
$login = false;
$showerror = false;

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `loginn` WHERE username = '$username'and password = '$pass'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num = 1) {
        $login = true;
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("location: Home.php");
    } else {
        $showerror = "invalid login";
    }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    <div class="container">

        <h1 class="p-3 text-center bg-primary text-white">Login</h1>
        <hr>
        <h3 class="p-3 text-center bg-info">Register Your Account</h3>
        <form action="" method="POST" class="bg-info p-5" enctype="multipart/form-data">
            <div class="row mb-3 justify-content-center">
                <label for="name" class="col-sm-2 col-form-label">Username : </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <label for="password" class="col-sm-2 col-form-label">Password : </label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="password" name="pass">
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Register</button>
            </div>
</body>

</html>