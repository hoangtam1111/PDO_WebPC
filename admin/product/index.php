<?php 
    require '../../config/connect.php';
    require '../../class/Product.php';
    require '../../class/Brand.php';
    require '../../class/ProductType.php';
    $pages = 1;
    
    if(isset($_GET['pages'])){
        $pages = $_GET['pages'];
    }
    // Search
    $search="";
    $MaLoai="";
    $brandId="";
    if(isset($_GET['loaiSP'])){
        $MaLoai=$_GET['loaiSP'];
    }
    if(isset($_GET['brand'])){
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

    // Sort
    $sort="";
    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
    }
    if(!empty($sort)){
        if($sort==="name"){
            $sql1.=" ORDER BY TenSP ";
        }else if($sort==="price"){
            $sql1.=" ORDER BY Gia ";
        }else if($sort==="priceDesc"){
            $sql1.=" ORDER BY Gia DESC ";
        }else if($sort==="type"){
            $sql1.=" ORDER BY MaLoai ";
        }else if($sort==="brand"){
            $sql1.=" ORDER BY BrandId ";
        }
    }
    // Pages
    $result=Product::getProducts($sql1);
    $rowCount=count($result);
    if($rowCount>10){
        $num_product=10;
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

<?php include '../includes/header.php' ?>
<link href="../../content/css/productIndex.css" rel="stylesheet" />
<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="../home">Trang chủ</a> /
            </li>
            <li>
                <a href="../product">Sản phẩm</a> /
            </li>
        </ul>
    </div>
    <div class="row">
        <h2>Thương hiệu</h2>
        <?php foreach($brand as $each){
            global $MaLoai;?>
            <div class="brand-item col">
                <a href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $each->BrandId?>&pages=<?php echo $pages ?>">
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
                <a href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $each->MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>">
                    <span><?php echo $each->TenLoai?></span>
                </a>
            </li>
        <?php }?>
        </ul>
    </div>
    <a href="insert.php"><h2>Thêm sản phẩm</h2></a>
    <div class="row">
        <?php if($rowCount>0) {?>
            <div class="col-6">
                <h2><?php echo $rowCount?> sản phẩm</h2>
            </div>
            <div class="col-6">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=name">Sắp xếp theo tên</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=price">Sắp xếp theo giá tăng dần</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=priceDesc">Sắp xếp theo giá giảm dần</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=type">Sắp xếp theo loại linh kiện</a></li>
                        <li><a class="dropdown-item" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=brand">Sắp xếp theo hãng</a></li>
                    </ul>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hãng</th>
                    <th>Loại</th>
                    <th>Chỉnh sửa</th>
                </tr>
                <?php foreach($result as $product){?>
                    <tr>
                        <td>
                            <img src="../../content/images/product/<?php echo $product->Anh?>" style="height: 50px" class="card-img-top" alt="">
                        </td>
                        <td><a href="detail.php?id=<?php echo $product->MaSP?>"><?php echo $product->TenSP?></a></td>
                        <td><?php echo number_format($product->Gia, 0, ".", ",")?> đ</td>
                        <td><?php echo $product->SoLuong?></td>
                        <td><?php echo Brand::getById($product->BrandId)->BrandName?></td>
                        <td><?php echo ProductType::getById($product->MaLoai)->TenLoai?></td>
                        <td><a href="update.php?id=<?php echo $product->MaSP?>">Sửa</a> | <a href="delete.php?id=<?php echo $product->MaSP?>">Xóa</a></td>
                    </tr>
                <?php } ?>
            </table>
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
                            <a class="page-link" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $PrevPage ?>&sort=<?php $sort?>">Pre</a>
                        </li>
                        <?php for($i = 1; $i <= $num_page; $i++){?>
                            <li class="page-item">
                                <a class="page-link" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $i ?>&sort=<?php $sort?>"><?php echo $i?></a>
                            </li>
                        <?php }?>
                        <li class="page-item">
                            <a class="page-link" href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $NextPage ?>&sort=<?php $sort?>">Next</a>
                        </li>
                    </ul>
            <?php  } 
        }else{
            echo "<h2>Không tìm thấy sản phẩm</h2>";
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php' ?>