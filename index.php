<?php
    require './class/Product.php';
    require './config/connect.php';
    include './includes/header.php';

    $sql1= "SELECT * FROM `sanpham` WHERE MaLoai=1";
    $sql2= "SELECT * FROM `sanpham` WHERE MaLoai=2";
    $sql3= "SELECT * FROM `sanpham` WHERE MaLoai=3";
    $result1= Product::getProducts($sql1);
    $result2= Product::getProducts($sql2);
    $result3= Product::getProducts($sql3);
    
?>

<!-- header -->
<?php ?>
<link href="./content/css/homeIndex.css" rel="stylesheet" />

<!-- main -->
<div class="container">
    
<div class="row">
    <div class="col-lg-3 col-md-0 col-0">
    </div>
    <div class="col-lg-9 col-md-12 col-12">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner border-radius_5px">
                        <div class="carousel-item active">
                            <img src="./content/images/layout/slider-1.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./content/images/layout/slider-2.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./content/images/layout/slider-3.webp" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 ">
                        <img src="./content/images/layout/banner_right_1.webp" style="padding-bottom: 12px;" class="img-banner" alt="">
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <img src="./content/images/layout/banner_right_2.webp" class="img-banner" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-footer">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <img src="./content/images/layout/banner_right_3.webp" class="img-banner" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <img src="./content/images/layout/banner_right_4.webp" class="img-banner" alt="">
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <img src="./content/images/layout/banner_right_5.webp" class="img-banner" alt="">
                </div>
            </div>
        </div>
    </div>


<div class="wrapperBanner">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-6 pd-bottom-12"><a href="#"><img src="./content/images/layout/banner_home_1_master.webp" class="img-banner" alt=""></a></div>
        <div class="col-lg-3 col-md-6 col-6 pd-bottom-12"><a href="#"><img src="./content/images/layout/banner_home_2_master.webp" class="img-banner" alt=""></a></div>
        <div class="col-lg-3 col-md-6 col-6 pd-bottom-12"><a href="#"><img src="./content/images/layout/banner_home_3_master.webp" class="img-banner" alt=""></a></div>
        <div class="col-lg-3 col-md-6 col-6 pd-bottom-12"><a href="#"><img src="./content/images/layout/banner_home_4_master.webp" class="img-banner" alt=""></a></div>
    </div>
</div>
<div class="flashsaleBanner">
    <div class="row">
        <img src="./content/images/layout/home_fsale_apps_banner.webp" class="img-banner" alt="">
    </div>
</div>
</div>
<!-- Product -->
    <div class="homeProduct">
        <div class="blockTitle">
            <div class="row">
                <div class="col-3">
                    <a href="#">
                        <h2>CPU</h2>
                    </a>
                </div>
                <div class="col-9">
                    <ul class="list-title">
                        <li><a href="#">Core 3</a></li>
                        <li><a href="#">Core 5</a></li>
                        <li><a href="#">Core 7</a></li>
                        <li><a href="#">Xem tất cả</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blockContent">
            <div class="row justify-content-center">
                <div id="recipeCarousel1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                            
                        <?php 
                        $i=0;
                        foreach($result1 as $row) {
                            if($i==0){?>
                                <div class="carousel-item active item-1">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card-product">
                                            <div class="card">
                                                <img src="./content/images/product/<?php echo $row->Anh?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <a href="./detail.php?id=<?php echo $row->MaSP?>"><?php echo $row->TenSP?></a>
                                                    <div style="color: red;"><?php echo number_format($row->Gia, 0, ".", ",") ?> đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }else{?>
                                <div class="carousel-item item-1">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card-product">
                                        <div class="card">
                                                <img src="./content/images/product/<?php echo $row->Anh?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <a href="./detail.php?id=<?php echo $row->MaSP?>"><?php echo $row->TenSP?></a>
                                                    <div style="color: red;"><?php echo number_format($row->Gia, 0, ".", ",") ?> đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                            $i++;
                        };?>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel1" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel1" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="homeProduct">
        <div class="blockTitle">
            <div class="row">
                <div class="col-3">
                    <a href="#">
                        <h2>Mainboard</h2>
                    </a>
                </div>
                <div class="col-9">
                    <ul class="list-title">
                        <li><a href="#">Main Intel</a></li>
                        <li><a href="#">Main AMD</a></li>
                        <li><a href="#">Xem tất cả</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blockContent">
            <div class="row justify-content-center">
                <div id="recipeCarousel2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                    <?php 
                        $i=0;
                        foreach($result2 as $row) {
                            if($i==0){?>
                                <div class="carousel-item active item-1">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card-product">
                                            <div class="card">
                                                <img src="./content/images/product/<?php echo $row->Anh?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <a href="./detail.php?id=<?php echo $row->MaSP?>"><?php echo $row->TenSP?></a>
                                                    <div style="color: red;"><?php echo number_format($row->Gia, 0, ".", ",") ?> đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }else{?>
                                <div class="carousel-item item-1">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card-product">
                                        <div class="card">
                                                <img src="./content/images/product/<?php echo $row->Anh?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <a href="./detail.php?id=<?php echo $row->MaSP?>"><?php echo $row->TenSP?></a>
                                                    <div style="color: red;"><?php echo number_format($row->Gia, 0, ".", ",") ?> đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                            $i++;
                        };?>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel2" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel2" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="homeProduct">
        <div class="blockTitle">
            <div class="row">
                <div class="col-3">
                    <a href="#">
                        <h2>CASE - THÙNG MÁY</h2>
                    </a>
                </div>
                <div class="col-9">
                    <ul class="list-title">
                        <li><a href="#">Xem tất cả</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blockContent block-3">
            <div class="row justify-content-center">
                <div id="recipeCarousel3" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                    <?php 
                        $i=0;
                        foreach($result3 as $row) {
                            if($i==0){?>
                                <div class="carousel-item active item-1">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card-product">
                                            <div class="card">
                                                <img src="./content/images/product/<?php echo $row->Anh?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <a href="./detail.php?id=<?php echo $row->MaSP?>"><?php echo $row->TenSP?></a>
                                                    <div style="color: red;"><?php echo number_format($row->Gia, 0, ".", ",") ?> đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }else{?>
                                <div class="carousel-item item-1">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="card-product">
                                        <div class="card">
                                                <img src="./content/images/product/<?php echo $row->Anh?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <a href="./detail.php?id=<?php echo $row->MaSP?>"><?php echo $row->TenSP?></a>
                                                    <div style="color: red;"><?php echo number_format($row->Gia, 0, ".", ",") ?> đ</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                            $i++;
                        };?>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel3" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel3" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="border-radius: 1px solid red; color: red;"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    </div>

<?php include './includes/footer.php'?>