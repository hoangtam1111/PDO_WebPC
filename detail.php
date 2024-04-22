<?php require './config/connect.php';?>
<!-- Header -->
<?php include './includes/header.php';
    require './class/Product.php';
?>

<?php
    $id= $_GET['id'];
    $each=Product::getById($id);
?>
<!-- Product -->
<link href="./content/css/productDetail.css" rel="stylesheet" />
<div class="container">
    <div class="product mb-5">
        <div class="row">
            <h2 class="mt-5 mb-5 bg-secondary p-3 text-white"><?php echo $each->TenSP?></h2>
            <div class="col-lg-6 col-md-6 col-12">
            <img class="p-3" style="border:solid 1px #cdcdcd; box-shadow: 2px 2px 1px 2px #cdcdcd; border-radius: 5px; width: 50%;" src="./content/images/product/<?php echo $each->Anh; ?>" />
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <h3 class="product__price mt-2 pt-3 pd-bottom-12">
                    Giá: <?php echo number_format($each->Gia, 0, ".", ",") ?> đ
                </h3>
                <hr />
                <div class="product__info">
                    <h4>Thông tin sản phẩm</h4>
                    <?php echo $each->ThongTinSP?>
                </div>
                <ul class="list-action">
                    <li>
                        <form action="/product/buy" class="d-flex">
                            <button class="btn buy action-1" type="submit">Mua ngay</i></button>
                        </form>
                    </li>
                    <li>
                        <form action="./handlers/insert_cart.php" method="post" enctype="multipart/form-data" class="d-flex">
                            <input type="hidden" name="MaSP" value="<?php echo $each->MaSP ?>">
                        <button class="btn action-2" type="submit">Thêm vào giỏ hàng</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Footer --> 
<?php include './includes/footer.php'?>