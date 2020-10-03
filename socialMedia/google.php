<?php

include('googleConfig.php');

include("../models/User.php");
include("../models/Auth.php");
include("../DB/DBHelper.php");
$db = DBHelper::getInstance();
$login_button = '';
if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();
        $auth = new Auth();
        $user = new User();
        $auth->source = "google";
        $auth->sourceId = $data['id'];
        if (($result = $db->loginWithSource($auth)) != null) {
            $_SESSION['userId'] = $result['user_id'];
            header("Location:/login-via-fb-or-google/profile.php");
        } else {
            $user->setEmail($data['email']);
            $user->setFirstName($data['given_name']);
            $user->setLastName($data['family_name']);
            $user->setPicture($data['picture']);
            $userID = $db->register($user->getFirstName(), $user->getlastName(), $user->getEmail(), $user->getPicture());

            $auth->userId = $userID;
            $db->addAuth($auth->userId, $auth->source, $auth->sourceId);
            $_SESSION['userId'] = $userID;
            header("Location:/login-via-fb-or-google/profile.php");
        }

    }
} else {
    header("Location:" .  $google_client->createAuthUrl());
}
