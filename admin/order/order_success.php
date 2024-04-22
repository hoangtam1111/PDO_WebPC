<?php
if(!empty($_POST['MaDH'])){
    $maDH=$_POST['MaDH'];
    require '../../config/connect.php';
    require '../../class/Order.php';
    require '../../class/OrderDetail.php';
   
    OrderDetail::deleteByMaDH($maDH);
    Order::delete($maDH);
    header("location: ../order/index.php?Order=successfully");
    exit;
}

header("location: ../order/index.php?Order=Error can't find MaDH");
