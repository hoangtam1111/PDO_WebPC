<?php 
    require '../../config/connect.php';
    require '../../class/Brand.php';
    $BrandName="";
    $BrandLogo="";
    $errName="";
    $errLogo="";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty($_POST['BrandName'])||empty($_POST['BrandLogo'])){
            if(empty($_POST['BrandName']))
                $errName="Vui lòng nhập tên hãng";
            if(empty($_POST['BrandLogo']))
                $errLogo="Vui lòng nhập link logo";
        }
        else{
            $BrandName=$_POST['BrandName'];
            $BrandLogo=$_POST['BrandLogo'];
            Brand::insert($BrandName,$BrandLogo);
            header("location: ./index.php?insert=Successfully");
        }
    }
?>

<?php include '../includes/header.php'?>

<div class="container">
    <h2>Insert</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <td><label class="form-label">Tên thương hiệu</label></td>
                <td>
                    <input type="text" class="form-control" id="BrandName" placeholder="Tên thương hiệu" value="<?php echo $BrandName?>" name="BrandName" />
                    <?php echo "<p class='text-danger'>$errName</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Logo thương hiệu</label></td>
                <td>
                    <input type="text" class="form-control" id="BrandLogo" placeholder="Link logo" value="<?php echo $BrandLogo ?>" name="BrandLogo" />
                    <?php echo "<p class='text-danger'>$errLogo</p>"?>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn action-1">Thêm</button>
        <a href="./index.php" class="btn action-2">Huỷ</a>
    </form>
</div>

<?php include '../includes/footer.php'?>