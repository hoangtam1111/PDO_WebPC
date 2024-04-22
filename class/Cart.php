<?php
class Cart{
    public $IdCart,$MaSP,$IdUser,$Quantity;
    public function __construct($IdCart=0,$MaSP=0,$IdUser=0,$Quantity=0){
        $this->IdCart=$IdCart;
        $this->MaSP=$MaSP;
        $this->IdUser=$IdUser;
        $this->Quantity=$Quantity;
    }
    public static function getCart($sql){
        global $pdo;
        $cart=$pdo->query($sql);
        $arrCart=array();
        foreach($cart->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $cart=new Cart();
            foreach($row as $key=>$pro){
                $cart->{$key}=$row[$key];
            }
            $arrCart[]=$cart;
        }
        return $arrCart;
    }
    public static function getById($id,$masp){
        global $pdo;
        $sql="SELECT * FROM `cart` where IdUser=$id and MaSP=$masp";
        $cart=new Cart();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $cart->{$key}=$row[$key];
        }
        return $cart;
    }
    public static function insert($MaSP,$IdUser,$Quantity){
        global $pdo;
        $sql="INSERT INTO `cart`(`MaSP`, `IdUser`, `Quantity`)
        VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$MaSP,$IdUser,$Quantity]);
    }
    public static function update($Quantity,$Idcart){
        global $pdo;
        $sql="UPDATE `cart` SET `Quantity`=? WHERE `IdCart`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Quantity,$Idcart]);
    }
    public static function delete($IdCart){
        global $pdo;
        $sql="DELETE FROM `cart` WHERE IdCart=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$IdCart]);
    }
    public static function deleteAllByUser($idUser){
        global $pdo;
        $sql="DELETE FROM `cart` WHERE IdUser=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idUser]);
    }
}