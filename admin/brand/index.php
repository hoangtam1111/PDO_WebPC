<?php 
    require '../../config/connect.php';
    require '../../class/Brand.php';
    $sql="SELECT `BrandId`, `BrandName`, `BrandLogo` FROM `brand`";
    $result=Brand::getBrand($sql);
?>

<?php include '../includes/header.php'?>

<link rel="stylesheet" href="../../content/css/productIndex.css">
<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="../home">Trang chủ</a> /
            </li>
            <li>
                <a href="../brand">Thương hiệu</a> /
            </li>
        </ul>
    </div>
    <a href="./brand_insert.php">Thêm thương hiệu mới</a>
    <table class="table table-bordered">
        <tr>
            <th>Tên thương hiệu</th>
            <th>Logo</th>
            <th>Chỉnh sửa</th>
        </tr>
        <?php foreach($result as $each){?>
            <tr>
                <td><?php echo $each->BrandName?> </td>
                <td><img src="<?php echo $each->BrandLogo?>" alt="Alternate Text" style="width:50px" /></td>
                <td><a href="./brand_update.php?id=<?php echo $each->BrandId?>">Sửa</a> | <a href="./brand_delete.php?id=<?php echo $each->BrandId?>">Xóa</a></td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php include '../includes/footer.php'?>