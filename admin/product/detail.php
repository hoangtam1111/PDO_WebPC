<?php 
    require '../../config/connect.php';
    require '../../class/Product.php';
    $id=$_GET['id'];
    $row=Product::getById($id);
    if(empty($id) || empty($row)){
        header('location: ../includes/404.php');
    }
?>

<?php include '../includes/header.php' ?>

<link href="../../content/css/productDetail.css" rel="stylesheet" />
<div class="container">
    <div class="product">
        <div class="row">
            <h2>Tên sản phẩm: <?php echo $row->TenSP?></h2>
            <div class="col-lg-6 col-md-6 col-12">
                <img src="../../content/images/product/<?php echo $row->Anh?>" style="max-width: 300px;" />
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <h3 class="product__price">
                    Giá tiền: <?php echo number_format($row->Gia, 0, ".", ",")?> đ
                </h3>
                <div class="product__info">
                    <h4>Thông tin sản phẩm</h4>
                    <?php echo $row->ThongTinSP?>
                </div>
                <div>
                    <a href="./index.php" class="btn action-1">Quay lại QL sản phẩm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php' ?>