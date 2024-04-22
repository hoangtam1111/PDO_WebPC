<?php
ob_start();
    session_start();
    require './class/ProductType.php';

    $sqlLoaisp= "SELECT * FROM `loaisp`";
    $loaisps=ProductType::getProductType($sqlLoaisp);
    $search="";
    $brandId="";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Tin học ngôi sao</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./content/css/responesive.css">
    <link href="./content/css/layout.css" rel="stylesheet" />
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
                        <a class="navbar-brand" href="./index.php">
                            <img src="./content/images/layout/logo.jpg" alt="Alternate Text" />
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-7 col-6 nav-item">

                        <form action="products.php" class="d-flex">
                            <input class="form-control" type="search" name="search" value="" placeholder="Tìm kiếm" aria-label="Search">
                            <button class="btn" type="submit"><i class="fas fa-search search"></i></button>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-1 col-1 nav-item">
                        <?php if(!empty($_SESSION['Id'])){?>

                            <a href="./info.php">
                                <i class="fas fa-user"></i>
                                <span class="item-nav"><?php echo $_SESSION['Name']?></span>
                            </a>
                            <span> | </span>
                            <a href="./handlers/process_logout.php">
                                <span class="item-nav">Đăng xuất</span>
                            </a>

                        <?php } else{?>

                            <a href="./login.php">
                                <i class="fas fa-user"></i>
                                <span class="item-nav">Đăng nhập/ Đăng ký</span>
                            </a>

                        <?php }?>
                    </div>
                    <div class="col-lg-2 col-md-1 col-1 nav-item">

                        <a href="./cart.php">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="item-nav">Giỏ hàng</span>
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
                            <a class="product__link" href="./products.php">DANH  MỤC SẢN PHẨM</a>
                            <div class="nav-sidebar__list">
                                <ul>
                                    <?php foreach($loaisps as $loaisp){?>
                                        <li class="li-child">
                                            <a href="./products.php?search=<?php echo $search?>&loaiSP=<?php echo $loaisp->MaLoai ?>&brand=<?php echo $brandId?>">
                                                <span><?php echo $loaisp->TenLoai?></span>
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