<?php
session_start();
include("DB/DBHelper.php");
include("models/User.php");
$db = DBHelper::getInstance();
if (isset($_SESSION['userId'])) {

    $data = $db->getUser($_SESSION['userId']);
    $user = new User();
    $user->setPicture($data['picture']);
    $user->setEmail($data['email']);
    $user->setFirstName($data['first_name']);
    $user->setLastName($data['last_name']);
} else {
    header("Location:/login-via-fb-or-google/login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container " style="padding-top: 200px">
    <div class="row col-md-4 col-md-offset-4 ">
        <div class="text-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= $user->getPicture() ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <div class="card-text row">
                        <span class="col-lg-6">First Name</span>
                        <span class="col-lg-6"><?= $user->getFirstName() ?></span>
                    </div>
                    <div class="card-text row">
                        <span class="col-lg-6">Last Name</span>
                        <span class="col-lg-6"><?= $user->getlastName() ?></span>
                    </div>
                    <div class="card-text row">
                        <span class="col-lg-3">Email</span>
                        <span class="col-lg-9"><?= $user->getEmail() ?></span>
                    </div>
                    <a href="logout.php" class="btn btn-danger">Logout !</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
