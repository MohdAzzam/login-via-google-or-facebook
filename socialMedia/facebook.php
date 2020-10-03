<?php
require("../models/User.php");
require("../models/Auth.php");
require("../DB/DBHelper.php");
require('../vendor/autoload.php');
session_start();

$fb = new \Facebook\Facebook([
    'app_id' => '3672002439501340',
    'app_secret' => '593df560aff517a57de3d61bafb25000',
    'default_graph_version' => 'v2.10'

]);
$client = $fb->getClient();

$helper = $fb->getRedirectLoginHelper();

$login_url = $helper->getLoginUrl("http://localhost/login-via-fb-or-google/socialMedia/facebook.php", ['scope' => 'email']);

$auth = new Auth();
$user = new User();

if (isset($_GET['code'])) {
    try {
        $accessToken = (string)$helper->getAccessToken();
        if (isset($accessToken)) {
            $fb->setDefaultAccessToken($accessToken);
            $res = $fb->get('me?fields=first_name,last_name,email,picture');
            $db = DBHelper::getInstance();
            $data = $res->getGraphUser();
            $auth->source = "facebook";
            $auth->sourceId = $data['id'];
            if (($result = $db->loginWithSource($auth)) != null) {
                $_SESSION['userId'] = $result['user_id'];
                header("Location:/login-via-fb-or-google/profile.php");
            } else {
                $user->setEmail($data->getEmail());
                $user->setFirstName($data->getFirstName());
                $user->setLastName($data->getLastName());
                $user->setPicture($data->getPicture()->getUrl());
                $userID = $db->register($user->getFirstName(), $user->getlastName(), $user->getEmail(), $user->getPicture());
                $auth->userId = $userID;
                $db->addAuth($auth->userId, $auth->source, $auth->sourceId);
                $_SESSION['userId'] = $userID;
                header("Location:/login-via-fb-or-google/profile.php");
            }
        }
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
} else {
    header("Location:" . $login_url);
}


