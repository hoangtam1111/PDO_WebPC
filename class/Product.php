<?php

    class Product{
        public $MaSP;
        public $TenSP;
        public $Gia;
        public $ThongTinSP;
        public $Anh;
        public $SoLuong;
        public $MaLoai;
        public $BrandId;
       
        public function __construct($MaSP=0,$TenSP="",$Gia=0,$ThongTinSP="",$Anh="",$SoLuong=0,$MaLoai=0,$BrandId=0){
            $this->MaSP=$MaSP;
            $this->TenSP=$TenSP;
            $this->Gia=$Gia;
            $this->ThongTinSP=$ThongTinSP;
            $this->Anh=$Anh;
            $this->SoLuong=$SoLuong;
            $this->MaLoai=$MaLoai;
            $this->BrandId=$BrandId;
        }
        public static function getProducts($sql){
            global $pdo;
            $products=$pdo->query($sql);
                // echo "<pre>";
                // print_r($products->fetchAll(PDO::FETCH_ASSOC));
                // echo "</pre>";
            $arrProducts=array();
            foreach($products->fetchAll(PDO::FETCH_ASSOC) as $row){ 
                $product=new Product();
                foreach($row as $key=>$pro){
                    $product->{$key}=$row[$key];
                }
                $arrProducts[]=$product;
            }
            return $arrProducts;
        }
        public static function getProductsBuy($sql){
            global $pdo;
            $products=$pdo->query($sql);
            $arrProducts=array();
            foreach($products->fetchAll(PDO::FETCH_ASSOC) as $row){ 
                $product=new Product();
                foreach($row as $key=>$pro){
                    $product->{$key}=$row[$key];
                }
                $product->SoLuong=$row['SoLuong'];
                $product->Gia=$row['Gia'];
                $product->Anh=$row['Anh'];
                $product->TenSP=$row['TenSP'];

                // echo "<pre>";
                // print_r($product);
                // echo "</pre>";
                $arrProducts[]=$product;
            }
            return $arrProducts;
        }
        public static function getById($id){
            global $pdo;
            $sql="SELECT * FROM `sanpham` where MaSP=$id";
            $product=new Product();
            $temp=$pdo->query($sql);
            $row= $temp->fetch(PDO::FETCH_ASSOC);
            foreach($row as $key=>$pro){
                $product->{$key}=$row[$key];
            }
            return $product;
        }
        public static function insert($TenSP,$Gia,$ThongTinSP,$Anh,$SoLuong,$MaLoai,$BrandId){
            global $pdo;
            $folder = '../../content/images/product/';
            $file_extension = explode('.', $Anh["name"])[1];
            $file_name = $Anh["name"];
            $path_file = $folder . $file_name;
        
            move_uploaded_file($Anh["tmp_name"], $path_file);
            $sql="INSERT INTO `sanpham`(`TenSP`, `Gia`, `ThongTinSP`, `Anh`, `SoLuong`, `MaLoai`, `BrandId`) 
            VALUES (?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$TenSP,$Gia,$ThongTinSP,$file_name,$SoLuong,$MaLoai,$BrandId]);
        }
        public static function update($MaSP,$TenSP,$Gia,$ThongTinSP,$Anh,$SoLuong,$MaLoai,$BrandId,$ImgOld){
            global $pdo;
            $file_name = $Anh["name"];

            if(!empty($Anh["name"])){
                $folder = '../../../content/images/product/';
                $file_extension = explode('.', $Anh["name"])[1];
                $file_name = uniqid() . '.' . $file_extension;
                $path_file = $folder . $file_name;
                move_uploaded_file($Anh["tmp_name"], $path_file);
            }
            else{
                $file_name=$ImgOld;
            }
            
            $sql="UPDATE `sanpham` SET `TenSP`=?,`Gia`=?,`ThongTinSP`=?,`Anh`=?,`SoLuong`=?,`MaLoai`=?,`BrandId`=? WHERE `MaSP`=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$TenSP,$Gia,$ThongTinSP,$file_name,$SoLuong,$MaLoai,$BrandId,$MaSP]);
        }
        public static function delete($MaSP){
            global $pdo;
            $MaSP=$_POST['MaSP'];
            $sql="DELETE FROM `sanpham` WHERE MaSP=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$MaSP]);
        }
    }
    
