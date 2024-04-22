<?php 
    require '../../config/connect.php';
    require '../../class/OrderDetail.php';
    require '../../class/Product.php';
    $id=$_GET['id'];
    $sql="SELECT * FROM `ctdh` WHERE MaDH=$id";
    $result=OrderDetail::getOrderDetail($sql);
?>

<?php include '../includes/header.php'; ?>

<link href="../..//content/css/Users.css" rel="stylesheet" />
<link href="../..//content/css/productIndex.css" rel="stylesheet" />

<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="../home/">Trang chủ</a> /
            </li>
            <li>
                <a href="./index.php">Đơn hàng</a> /
            </li>
            <li>
                <a href="./order_detail.php?id=<?php echo $id?>">Chi tiết đơn hàng</a> /
            </li>
        </ul>
    </div>
    <table class="table table-bordered">
            <tr>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php foreach($result as $product){?>
                <tr>
                    <td>
                        <img src="../../content/images/product/<?php echo Product::getById($product->MaSP)->Anh?>" style="height: 50px" class="card-img-top" alt="">
                    </td>
                    <td><a href="detail.php?id=<?php echo $product->MaSP?>"><?php echo Product::getById($product->MaSP)->TenSP?></a></td>
                    <td><?php echo number_format(Product::getById($product->MaSP)->Gia, 0, ".", ",")?> đ</td>
                    <td><?php echo $product->SoLuong?></td>
                    <td><?php echo number_format(Product::getById($product->MaSP)->Gia*$product->SoLuong, 0, ".", ",")?> đ</td>
                </tr>
            <?php } ?>
        </table>
</div>

<?php include '../includes/footer.php'; ?>