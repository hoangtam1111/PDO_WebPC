<?php 
require '../class/Cart.php';
session_start();
require '../config/connect.php';
$maSP=$_POST['ProId'];
$quan=$_POST['Quantity'];
$userId=$_SESSION['Id'];
$pro=Cart::getById($userId,$maSP);
if(!empty($maSP)&&!empty($quan)){
    echo $quan;
    Cart::update($quan,$pro->IdCart);
    header("location: ../cart.php");
    exit();
}
header("location: ../index.php?error=update quantity error");
