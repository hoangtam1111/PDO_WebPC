<?php
require '../class/User.php';
require '../class/ForgotPassword.php';
require '../config/connect.php';
$token = $_POST['token'];
$password = $_POST['password'];

$sql = "select customer_id from forgot_password where token = '$token'";
$result = ForgotPassword::getForgot($sql);
echo "<pre>";
print_r($result);
echo "</pre>";

if(count($result) === 0) {
    header("index.php");
    exit;
}
echo $password;
User::updatePassword($password, $result[0]->customer_id);
ForgotPassword::deleteWithToken($token);

header("location: ../login.php");