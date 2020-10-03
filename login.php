<?php
session_start();
if (isset($_SESSION['userId'])) {
    header("Location:/login-via-fb-or-google/profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container " style="padding-top: 200px">
    <div class="row col-md-4 col-md-offset-4 ">
        <div class="text-center">
            <a href="socialMedia/google.php" class="btn btn-danger">Login via Google</a>
            <a href="socialMedia/facebook.php" class="btn btn-primary">Login via FaceBook</a>
        </div>
    </div>
</div>
</body>
</html>
