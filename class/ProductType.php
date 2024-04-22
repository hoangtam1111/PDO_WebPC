<?php
class ProductType{
    public $MaLoai,$TenLoai;
    public function __construct($MaLoai=0,$TenLoai=""){
        $this->MaLoai=$MaLoai;
        $this->TenLoai=$TenLoai;
    }
    public static function getProductType($sql){
        global $pdo;
        $type=$pdo->query($sql);
        $arrType=array();
        foreach($type->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $type=new ProductType();
            foreach($row as $key=>$pro){
                $type->{$key}=$row[$key];
            }
            $arrType[]=$type;
        }
        return $arrType;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `loaisp` where MaLoai=$id";
        $type=new ProductType();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $type->{$key}=$row[$key];
        }
        return $type;
    }
    public static function insert($TenLoai){
        global $pdo;
        $sql="INSERT INTO `loaisp`(`TenLoai`)
        VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$TenLoai]);
    }
    
    public static function update($MaLoai,$TenLoai){
        global $pdo;
        $sql="UPDATE `loaisp` SET `TenLoai`=? WHERE `MaLoai`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$TenLoai,$MaLoai]);
    }
    public static function delete($MaLoai){
        global $pdo;
        $sql="DELETE FROM `loaisp` WHERE MaLoai=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$MaLoai]);
    }
}