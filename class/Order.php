<?php
class Order{
    public $MaDH,$NgayDat,$MaUser,$TongTien;
    public function __construct($MaDH=0,$NgayDat="",$MaUser=0,$TongTien=0){
        $this->MaDH=$MaDH;
        $this->NgayDat=$NgayDat;
        $this->MaUser=$MaUser;
        $this->TongTien=$TongTien;
    }
    public static function getOrder($sql){
        global $pdo;
        $order=$pdo->query($sql);
        $arrOrder = array();
        foreach($order->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $order=new Order();
            foreach($row as $key=>$pro){
                $order->{$key}=$row[$key];
            }
            $arrOrder[]=$order;
        }
        return $arrOrder;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `donhang` where MaDH=$id";
        $order=new Order();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $order->{$key}=$row[$key];
        }
        return $order;
    }
    public static function insert($NgayDat,$MaUser){
        global $pdo;
        $sql="INSERT INTO `donhang`(`NgayDat`, `MaUser`, `TongTien`)
        VALUES (?,?,0)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$NgayDat,$MaUser]);
    }
    public static function update($NgayDat,$MaUser,$TongTien,$MaDH){
        global $pdo;
        $sql="UPDATE `donhang` SET `NgayDat`=?,`MaUser`=?,
        `TongTien`=? WHERE `MaDH`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$NgayDat,$MaUser,$TongTien,$MaDH]);
    }
    public static function updatePrice($MaH,$Total){
        global $pdo;
        $sql="UPDATE `donhang` SET `TongTien`=? WHERE `MaDH`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Total,$MaH]);
    }
    public static function delete($Id){
        global $pdo;
        $sql="DELETE FROM `donhang` WHERE MaDH=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Id]);
    }
}