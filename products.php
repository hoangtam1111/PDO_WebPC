<?php 
    require './config/connect.php';
    include './includes/header.php';
    require './class/Product.php';
    require './class/Brand.php';

    $pages = 1;
    
    if(isset($_GET['pages'])){
        $pages = $_GET['pages'];
    }
    // Search
    $search="";
    $MaLoai="";
    $brandId="";
    if(!empty($_GET['loaiSP'])){
        $MaLoai=$_GET['loaiSP'];
    }
    if(!empty($_GET['brand'])){
        $brandId=$_GET['brand'];
    }
    if(empty($_GET['search']))
    {
        $sql1= "SELECT * FROM `sanpham`";
        if(!empty($MaLoai) && !empty($brandId))
            $sql1= "SELECT * FROM `sanpham` WHERE MaLoai='$MaLoai' and BrandId='$brandId'";
        else if(!empty($MaLoai) && empty($brandId))
            $sql1= "SELECT * FROM `sanpham` WHERE MaLoai='$MaLoai'";
        else if(empty($MaLoai) && !empty($brandId))
            $sql1= "SELECT * FROM `sanpham` WHERE BrandId='$brandId'";    
    }
    else{
        $search=$_GET['search'];
        $sql1= "SELECT * FROM `sanpham` WHERE TenSP LIKE '%$search%'";
        if(!empty($MaLoai) && !empty($brandId))
            $sql1= "SELECT * FROM `sanpham` WHERE TenSP LIKE '%$search%' and MaLoai='$MaLoai' and BrandId='$brandId'";
        else if(!empty($MaLoai) && empty($brandId))
            $sql1= "SELECT * FROM `sanpham` WHERE TenSP LIKE '%$search%' and MaLoai='$MaLoai'";
        else if(empty($MaLoai) && !empty($brandId))
            $sql1= "SELECT * FROM `sanpham` WHERE TenSP LIKE '%$search%' and BrandId='$brandId'";    
    }
    //Pages
    $result=Product::getProducts($sql1);
    $rowCount=count($result);
    if($rowCount>12){
        $num_product=12;
        $num_page=ceil($rowCount/$num_product);
        $skip_pages=$num_product*($pages-1);
        $sql1.=" limit $num_product offset $skip_pages";
        $result=Product::getProducts($sql1);
    }

    // select ProType, Brand
    $sql2= "SELECT * FROM `loaisp`";
    $sql3= "SELECT * FROM `brand`";
    $productType= ProductType::getProductType($sql2);
    $brand= Brand::getBrand($sql3);

?>



<!-- Header -->
<link href="./content/css/productIndex.css" rel="stylesheet" />
<div class="container">
    <div class="row">
        <div class="insBreadcrumbs">
            <ul>
                <li>
                    <a href="/home/index">Trang chủ</a> /
                </li>
                <li>
                    <a href="/product/index">Sản phẩm</a> /
                </li>
            </ul>
        </div>
        <img class="img-banner" src="https://file.hstatic.net/200000420363/collection/head-muc-freeship__3__c83c99ea41d643c5b847c293fd2e4794.jpg" alt="Alternate Text" />
    </div>

    <!-- Brand -->
    <div class="row">
        <h2>Thương hiệu</h2>
        <?php foreach($brand as $each){
            global $MaLoai;?>
            <div class="brand-item col">
                <a href="./products.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $each->BrandId?>">
                    <img src="<?php echo $each->BrandLogo?>" alt="Alternate Text" />
                </a>
            </div>
        <?php }?>
    </div>
    <div class="row">
        <h2>Linh kiện</h2>
        <ul class="loai-item">
        <?php foreach($productType as $each){
            global $brandId;?>
            <li>
                <a href="./products.php?search=<?php echo $search?>&loaiSP=<?php echo $each->MaLoai ?>&brand=<?php echo $brandId;?>">
                    <span><?php echo $each->TenLoai?></span>
                </a>
            </li>
        <?php }?>
        </ul>
    </div>
    <div class="row">
        <h2> sản phẩm</h2>
        <?php if($rowCount>0) {?>
            <?php foreach($result as $each){?>
                <div class="col-lg-2 col-md-4 col-4">
                    <div class="card-product">
                        <div class="card">
                            <img src="./content/images/product/<?php echo $each->Anh?>" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="./detail.php?id=<?php echo $each->MaSP;?>"><?php echo $each->TenSP;?></a>
                                <div style="color: red;"><?php echo number_format($each->Gia, 0, ".", ",")?> đ</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php
                if($rowCount>10){
                    $PrevPage = intval($pages) - 1;
                    if ($PrevPage <= 1)
                    {
                        $PrevPage = 1;
                    }
                    $NextPage = intval($pages) + 1;
                    if ($NextPage > $num_page)
                    {
                        $NextPage = $num_page;
                    }
                    
            ?>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="./products.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $PrevPage ?>">Pre</a>
                    </li>
                    <?php for($i = 1; $i <= $num_page; $i++){?>
                        <li class="page-item">
                            <a class="page-link" href="./products.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $i ?>"><?php echo $i?></a>
                        </li>
                    <?php }?>
                    <li class="page-item">
                        <a class="page-link" href="./products.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $NextPage ?>">Next</a>
                    </li>
                </ul>
            <?php }
        }else{
            echo "<h2>Không tìm thấy sản phẩm</h2>";
        } ?>
    </div>
</div>

 
<!-- Footer --> 
<?php include './includes/footer.php'?>