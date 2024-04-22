<?php 
require_once '../class/Cart.php';
session_start();
require '../config/connect.php';
$id=$_POST['IdCart'];
echo $id;
if(!empty($id)){
    Cart::delete($id);
    header("location: ../cart.php");
    exit();
}
header("location: ../index.php?error=delete cart error");