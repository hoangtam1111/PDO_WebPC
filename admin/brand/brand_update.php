<?php 
    require '../../config/connect.php';
    require '../../class/Brand.php';
    $id=$_GET['id'];
    $name="";
    $logo="";

    $brand=Brand::getById($id);
    if(empty($id) || empty($brand))
    {
        header('location: ../includes/404.php');
    }
    $errName="";
    $errLogo="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['BrandName'])||empty($_POST['BrandLogo']))
        {
            if(empty($_POST['BrandName']))
                $errName="Vui lòng nhập tên hãng";
            if(empty($_POST['BrandLogo']))
                $errLogo="Vui lòng nhập link logo";
        }else{
            $id=$_POST['BrandId'];
            $name=$_POST['BrandName'];
            $logo=$_POST['BrandLogo'];
            var_dump($id,$name,$logo);
            Brand::update($id,$name,$logo);
            header("location: ./index.php?update=Successfully");
        }
    }
    else{
        $id=$brand->BrandId;
        $name=$brand->BrandName;
        $logo=$brand->BrandLogo;
    }
    
?>
<?php include '../includes/header.php'?>

<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="BrandId" value="<?php echo $id?>" />
            <tr>
                <td><label class="form-label">Tên thương hiệu</label></td>
                <td>
                    <input type="text" value="<?php echo $name?>" class="form-control" id="BrandName" placeholder="Tên thương hiệu" name="BrandName" />
                    <?php echo "<p class='text-danger'>$errName</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Logo thương hiệu</label></td>
                <td>
                    <input type="text" value="<?php echo $logo?>" class="form-control" id="BrandLogo" placeholder="Link logo" name="BrandLogo" />
                    <?php echo "<p class='text-danger'>$errLogo</p>" ?>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn action-1">Sửa</button>
        <a href="./index.php" class="btn action-2">Huỷ</a>
    </form>
</div>

<?php include '../includes/footer.php'?>