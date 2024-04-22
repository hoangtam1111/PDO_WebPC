<?php
class OrderDetail{
    public $MaCTDH,$MaDH,$MaSP,$SoLuong;
    public function __construct($MaCTDH=0,$MaDH=0,$MaSP=0,$SoLuong=0){
        $this->MaCTDH=$MaCTDH;
        $this->MaDH=$MaDH;
        $this->MaSP=$MaSP;
        $this->SoLuong=$SoLuong;
    }
    public static function getOrderDetail($sql){
        global $pdo;
        $orderDetail=$pdo->query($sql);
        $arrOrderDetail=array();
        foreach($orderDetail->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $orderDetail=new OrderDetail();
            foreach($row as $key=>$pro){
                $orderDetail->{$key}=$row[$key];
            }
            $arrOrderDetail[]=$orderDetail;
        }
        return $arrOrderDetail;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `ctdh` where MaCTDH=$id";
        $orderDetail=new OrderDetail();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $orderDetail->{$key}=$row[$key];
        }
        return $orderDetail;
    }
    public static function insert($MaDH,$MaSP,$SoLuong){
        global $pdo;
        $sql="INSERT INTO `ctdh`(`MaDH`, `MaSP`, `SoLuong`)
        VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$MaDH,$MaSP,$SoLuong]);
    }
    public static function update($MaDH,$MaSP,$SoLuong,$MaCTDH){
        global $pdo;
        $sql="UPDATE `ctdh` SET `MaDH`=?,`MaSP`=?,
        `SoLuong`=? WHERE `MaCTHD`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$MaDH,$MaSP,$SoLuong,$MaCTDH]);
    }
    public static function delete($Id){
        global $pdo;
        $sql="DELETE FROM `ctdh` WHERE MaCTDH=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Id]);
    }
    public static function deleteByMaDH($Id){
        global $pdo;
        $sql="DELETE FROM `ctdh` WHERE MaDH=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Id]);
    }
}