<?php
ob_start();

    require_once '../../class/ProductType.php';

    $sqlLoaisp= "SELECT * FROM `loaisp`";
    $loaisp=ProductType::getProductType($sqlLoaisp);
    session_start();
    if($_SESSION['Admin']==0){
        header("location: ../../index.php");
    }
    $search="";
    $brandId;
    $pages;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Tin học ngôi sao</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../content/css/responesive.css">
    <link href="../../content/css/layout.css" rel="stylesheet" />
    <style>
        .search{
            color: white;
        }
        .nav-item form button:hover {
            border: 1px solid #E02207;

        }
        .nav-item form button:hover i{
            color: #E02207;
        }
        .action-1 {
        background: #E02207;
        color: white;
        border: 1px solid #E02207;
        }

        .action-1:hover {
            background: white;
            color: #E02207;
            border: 1px solid #E02207;
        }

        .action-2 {
            background: white;
            color: #E02207;
            border: 1px solid #E02207;
        }

        .action-2:hover {
            background: #E02207;
            color: white;
        }
    </style>
    <body>
        <nav class="nav">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-3 nav-item">
                        <a class="navbar-brand" href="../home/index.php">
                            <img src="../../content/images/layout/logo.jpg" alt="Alternate Text" />
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-7 col-6 nav-item">

                        <form action="../product/index.php" class="d-flex">
                            <input class="form-control" type="search" name="search" value="" placeholder="Tìm kiếm" aria-label="Search">
                            <button class="btn" type="submit"><i class="fas fa-search" style="color: white"></i></button>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-1 col-1 nav-item">
                    <?php if(!empty($_SESSION['Id'])){?>
                        <a href="../../handlers/process_logout.php">
                            <i class="fas fa-user"></i>
                            <span class="item-nav">Đăng xuất</span>
                        </a>
                    <?php }?>
                       
                    </div>
                    <div class="col-lg-2 col-md-1 col-1 nav-item">

                        <a href="../order/">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="item-nav">Đơn hàng</span>
                        </a>
                    </div>
                    <div class="col-1 dropdown icon-bar">
                        <button class="btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="nav-sidebar">
                            <i class="fas fa-bars"></i>
                            <a class="product__link" href="../product/index.php">DANH  MỤC SẢN PHẨM</a>
                            <div class="nav-sidebar__list">
                                <ul>
                                    <?php foreach($loaisp as $each){?>
                                        <li class="li-child">
                                            <a href="./index.php?search=<?php echo $search?>&loaiSP=<?php echo $each->MaLoai ?>&brand=<?php echo $brandId?>&pages=<?php echo $pages ?>&sort=">
                                                <span><?php echo $each->TenLoai;?></span>
                                                <i class="fas fa-angle-right"></i>
                                            </a>
                                        </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="nav-menu">
                            <ul class="nav-navbar">
                                <li>
                                    <a href="#"><i class="fas fa-wrench"></i> Lắp đặt phòng net</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-money-check"></i> Trả góp</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-money-bill"></i> Bảng giá</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-sliders-h"></i> Xây dựng cấu hình</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-shield-alt"></i> Kiểm tra bảo hành</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-dollar-sign"></i> Thiết bị mining</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>