<?php 
    require '../../config/connect.php';
    require '../../class/Product.php';
    include '../includes/header.php';
    $id=$_GET['id'];
    $type=ProductType::getById($id);
    if(empty($id) ||empty($type)){
        header('location: ../includes/404.php');
    }
    $errTenLoai="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['MaLoai']))
        {
            header("location: ./index.php?delete=Error");
        }else{
            $id=$_POST['MaLoai'];
            $product="SELECT * FROM `sanpham` WHERE MaLoai=$id";
            $result=Product::getProducts($product);
            if(count($result)>0){
                header("location: ./index.php?delete=Error: product type included in the product");
            }
            ProductType::delete($id);
            header("location: ./index.php");
        }
    }
?>

<div class="container">
    <h2>Bạn có muốn xóa loại sản phẩm này</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="MaLoai" value="<?php echo $type->MaLoai?>" />
            <tr>
                <td><label class="form-label">Tên Loại</label></td>
                <td><?php echo $type->TenLoai?></td>
            </tr>
        </table>
        <button type="submit" class="btn action-1">Xóa</button>
        <a href="./index.php" class="btn action-2">Huỷ</a>
    </form>
</div>

<?php require '../includes/footer.php'?>