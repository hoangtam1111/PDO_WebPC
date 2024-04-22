<?php 
require '../class/Cart.php';
session_start();
require '../config/connect.php';
$id=$_SESSION['Id'];
if(!empty($id)){
    
    if(!empty($_POST['MaSP'])){
        $maSP=$_POST['MaSP'];
        $product=Cart::getById($id,$maSP);
        if($product->IdCart<=0){
            Cart::insert($maSP,$id,1);
            $product=Cart::getById($id,$maSP);
            
        }else{
           Cart::update($product->Quantity+1,$product->IdCart);
        }
        header("location: ../cart.php");
        exit();
    }
}
header("location: ../index.php?error=insert cart error");