<?php 
    require '../../config/connect.php';
    $id=$_GET['id'];
    $pro=Product::getById($id);
    if(empty($id) || empty($pro)){
        header('location: ../includes/404.php');
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['MaSP']))
        {
            $MaSP=$_POST['MaSP'];
            Product::delete($MaSP);
            header("location: ./index.php?delete=Successfully");
        }
    }
?>

<?php include '../includes/header.php' ?>

<link href="../../content/css/productDetail.css" rel="stylesheet" />

<div class="container">
    <form  method="post" enctype="multipart/form-data" class="d-flex">
        <div class="product">
            <input type="hidden" name="MaSP" value="<?php echo $pro->MaSP?>" />
            <div class="row">
                <h2>Tên sản phẩm: <?php echo $pro->TenSP?></h2>
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="../../content/images/product/<?php echo $pro->Anh?>" />
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="product__price">
                        Giá tiền:<?php echo number_format($pro->Gia, 0, ".", ",")?> đ
                    </h3>
                    <h3 class="product__price">
                        Số lượng: <?php echo $pro->SoLuong?>
                    </h3>
                    <div class="product__info">
                        <h4>Thông tin sản phẩm</h4>
                        <?php echo $pro->ThongTinSP?>
                    </div>
                    <h2>Bạn có muốn xoá ?</h2>
                    <ul class="list-action">
                        <li>
                            <button class="btn buy action-1" type="submit">Xoá</button>
                        </li>
                        <li>
                            <a href="./index.php" class="btn action-2">Huỷ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include '../includes/footer.php';