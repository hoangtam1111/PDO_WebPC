<?php require '../../config/connect.php';?>
<?php include '../includes/header.php'?>

<div class="container">
    <h2>Xin chào admin</h2>
    <table class="table table-bordered">
        <tr>
            <td>Quản lý thương hiệu</td>
            <td><a href="../brand/">Brand</a></td>
        </tr>
        <tr>
            <td>Quản lý loại sản phẩm</td>
            <td><a href="../productType/">LoaiSP</a></td>
        </tr>
        <tr>
            <td>Quản lý sản phẩm</td>
            <td><a href="../product/">SanPham</a></td>
        </tr>
        <tr>
            <td>Quản lý user</td>
            <td><a href="../user/">Users</a></td>
        </tr>
    </table>
</div>

<?php include '../includes/footer.php' ?>