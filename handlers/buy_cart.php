<?php
require '../class/Cart.php';
require '../class/Order.php';
require '../class/OrderDetail.php';
session_start();
require '../config/connect.php';
if(!empty($_SESSION['Id'])){
    
    $IdUser=$_SESSION['Id'];
    // select cart
    $sql="SELECT * FROM `cart` WHERE IdUser=$IdUser";
    $arrCart=Cart::getCart($sql);
    if(count($arrCart)>0){
        // insert order
        $dayNow=date("Y-m-d");
        Order::insert($dayNow,$IdUser);
        //select MaDH
        $selectOder="SELECT MaDH FROM `donhang` WHERE NgayDat='$dayNow' and MaUser=$IdUser ORDER BY MaDH DESC LIMIT 1;";
        $order=Order::getOrder($selectOder);
        $MaDH=$order[0]->MaDH;
        var_dump($order);
        //insert order details

        foreach($arrCart as $each){
            $maSP=$each->MaSP;
            $soLuong=$each->Quantity;
            OrderDetail::insert($MaDH,$maSP,$soLuong);
        }
        // delete Cart
        Cart::deleteAllByUser($IdUser);
        header("location: ../buy.php?MaDH=$MaDH");
        exit;
    }
    header("location: ../index.php?error=Not found product in cart");

}