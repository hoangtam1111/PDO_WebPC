<?php 
    require '../../config/connect.php';
    include '../includes/header.php';
    $sql="SELECT * FROM `loaisp`";
    $productType=ProductType::getProductType($sql);
?>


<link rel="stylesheet" href="../../content/css/productIndex.css">
<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="../home">Trang chủ</a> /
            </li>
            <li>
                <a href="../productType">Loại sản phẩm</a> /
            </li>
        </ul>
    </div>
    <a href="./type_insert.php">Thêm loại sản phẩm mới</a>
    <table class="table table-bordered">
        <tr>
            <th>Tên loại SP</th>
            <th>Chỉnh sửa</th>
        </tr>
        <?php foreach($productType as $type){?>
            <tr>
                <td><?php echo $type->TenLoai?></td>
                <td><a href="./type_update.php?id=<?php echo $type->MaLoai?>">Sửa</a> | <a href="./type_delete.php?id=<?php echo $type->MaLoai?>">Xóa</a></td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include '../includes/footer.php'?>