<?php
    require '../../config/connect.php';
    include '../includes/header.php';
    $id=$_GET['id'];
    $MaLoai="";
    $TenLoai="";
    $type=ProductType::getById($id);
    
    if(empty($type) || empty($id))
    {
        header('location: ../includes/404.php');
    }
    $errTenLoai="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['TenLoai']))
        {
            if(empty($_POST['TenLoai']))
                $errTenLoai="Vui lòng nhập tên loại";
        }else{
            $MaLoai=$_POST['MaLoai'];
            $TenLoai=$_POST['TenLoai'];
            ProductType::update($MaLoai,$TenLoai);
            header("location: ./index.php?update=Successfully");
        }
    }
    else{
        $MaLoai=$type->MaLoai;
        $TenLoai=$type->TenLoai;
    }
?>

<div class="container">
    <h2>Chỉnh sửa loại sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="MaLoai" value="<?php echo $id?>" />
            <tr>
                <td><label class="form-label">Tên Loại</label></td>
                <td>
                    <input type="text" value="<?php echo $TenLoai?>" class="form-control" id="TenLoai" placeholder="Tên Loại" name="TenLoai" />
                    <?php echo "<p class='text-danger'>$errTenLoai</p>" ?>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn action-1">Sửa</button>
        <a href="./index.php" class="btn action-2">Huỷ</a>
    </form>
</div>

<?php include '../includes/footer.php'?>