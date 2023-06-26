<?php
require("dbcon.php");
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $pass = $_POST['pass'];
    $passs = $_POST['passs'];


    if ($pass !== $passs) {
        echo '<script> alert("password do not matched")</script>';
    } else {
        $sql = "INSERT INTO `regs`(`username`, `password`, `cpassword`) VALUES ('$username','$pass','$passs')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script> alert("Register successfully")</script>';
        } else {
            echo "fail";
        }
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
    <div class="container">
        <h1 class="p-3 text-center bg-primary text-white">User Registration</h1>
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
            <div class="row mb-3 justify-content-center">
                <label for="confim-password" class="col-sm-2 col-form-label">Confirm Password : </label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="confirm-password" name="passs">
                </div>
            </div>


            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Register</button>
            </div>
        </form>
    </div>


</body>

</html>