<?php
require '../class/User.php';
require '../class/ForgotPassword.php';
require '../config/connect.php';
function current_url()
{
    $url      = "http://"  . $_SERVER['HTTP_HOST'] . "/DoAnPHP/";
    return $url;
}


$email = $_POST['email'];



$sql = "SELECT * FROM `user` WHERE Email = '$email'";
$result=User::getUsers($sql);


if (count($result) === 1) {
    $each = $result[0];

    $id = $each->Id;
    $customer_name = $each->Name;

    $temp=ForgotPassword::getById($id);
   
    if(!empty($temp)){
        ForgotPassword::delete($id);
    }

    $token = uniqid();
    ForgotPassword::insert($id, $token);

    $link = current_url() . '/change_new_password.php?token=' . $token;

    //die($link);

    require '../mail.php';
    $title = 'change new password';
    $content = "Your password was changed!<br>
    Please <a href='$link'>click here</a> to change new password";
    sendmail($email, $customer_name, $title, $content);
}

header("location: ../login.php");