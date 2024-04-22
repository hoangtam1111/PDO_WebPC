<?php

class Brand{
    public $BrandId,$BrandName,$BrandLogo;
    public function __construct($BrandId=0,$BrandName="",$BrandLogo=""){
        $this->BrandId=$BrandId;
        $this->BrandName=$BrandName;
        $this->BrandLogo=$BrandLogo;
    }
    public static function getBrand($sql){
        global $pdo;
        $brand=$pdo->query($sql);
        $arrBrand=array();
        foreach($brand->fetchAll(PDO::FETCH_ASSOC) as $row){ 
            $brand=new Brand();
            foreach($row as $key=>$pro){
                $brand->{$key}=$row[$key];
            }
            $arrBrand[]=$brand;
        }
        return $arrBrand;
    }
    public static function getById($id){
        global $pdo;
        $sql="SELECT * FROM `brand` where BrandId=$id";
        $brand=new Brand();
        $temp=$pdo->query($sql);
        $row= $temp->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$pro){
            $brand->{$key}=$row[$key];
        }
        return $brand;
    }
    public static function insert($BrandName,$BrandLogo){
        global $pdo;
        $sql="INSERT INTO `brand`(`BrandName`, `BrandLogo`)
        VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$BrandName,$BrandLogo]);
    }
    public static function update($BrandId,$BrandName,$BrandLogo){
        global $pdo;
        $sql="UPDATE `brand` SET `BrandName`=?,`BrandLogo`=? WHERE `BrandId`=? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$BrandName,$BrandLogo,$BrandId]);
    }
    public static function delete($BrandId){
        global $pdo;
        $sql="DELETE FROM `brand` WHERE BrandId=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$BrandId]);
    }
}
