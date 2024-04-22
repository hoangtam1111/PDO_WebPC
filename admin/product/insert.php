<?php 
    require '../../config/connect.php';
    require '../../class/Brand.php';
    require '../../class/Product.php';
    require '../../class/ProductType.php';

    $sql1="SELECT * FROM `loaisp`";
    $sql2="SELECT * FROM `brand`";
    $productType=ProductType::getProductType($sql1);
    $brand=Brand::getBrand($sql2);

    $TenSP = "";
    $Gia = "";
    $ThongTinSP = "";
    $Anh = "";
    $SoLuong = "";
    $MaLoai= "";
    $BrandId= "";
    $errTenSP = "";
    $errGia = "";
    $errThongTinSP = "";
    $errAnh = "";
    $errSoLuong = "";
    $errMaLoai= "";
    $errBrandId= "";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check=true;
        if(empty($_POST['TenSP'])){
            $errTenSP="Vui lòng nhập tên sản phẩm";
            $check=false;
        }

        if(empty($_POST['Gia'])){
            $errGia="Vui lòng nhập giá sản phẩm";
            $check=false;

        }else if(!is_numeric($_POST['Gia'])){
            $errGia="Vui lòng nhập số";
            $check=false;
        }else if(!($_POST['Gia']%1000===0)){
            $errGia="Vui lòng nhập giá chia hết cho 1000";
            $check=false;
        }
        if(empty($_POST['ThongTinSP'])){
            $errThongTinSP="Vui lòng nhập thông tin sản phẩm";
            $check=false;
        }
        var_dump($_FILES['Anh']);
        if(empty($_FILES['Anh']['name']))
        {
            $errAnh="Vui lòng chọn ảnh sản phẩm";
            $check=false;
        }
        if(empty($_POST['SoLuong'])){
            $errSoLuong="Vui lòng nhập số lượng sản phẩm";
            $check=false;
        }else if(!is_numeric($_POST['SoLuong'])){
            $errSoLuong="Vui lòng nhập kiểu số cho số lượng sản phẩm";
            $check=false;
        }
        if(empty($_POST['MaLoai']))
        {
            $errMaLoai="Vui lòng nhập kiểu số cho số lượng sản phẩm";
            $check=false;
        }
        if(empty($_POST['BrandId'])){
            $errBrandId="Vui lòng nhập kiểu số cho số lượng sản phẩm";
            $check=false;
        }
        $TenSP = $_POST['TenSP'];
        $Gia = $_POST['Gia'];
        $ThongTinSP = $_POST['ThongTinSP'];
        $Anh = $_FILES['Anh'];
        $SoLuong = $_POST['SoLuong'];
        $MaLoai= $_POST['MaLoai'];
        $BrandId= $_POST['BrandId'];
        
        if($check){
            
            $folder = '../../content/images/product/';
            $file_extension = explode('.', $Anh["name"])[1];
            $file_name = $Anh["name"];
            $path_file = $folder . $file_name;
        
            move_uploaded_file($Anh["tmp_name"], $path_file);
            var_dump($Anh);
            $sql="INSERT INTO `sanpham`(`TenSP`, `Gia`, `ThongTinSP`, `Anh`, `SoLuong`, `MaLoai`, `BrandId`) 
            VALUES ('$TenSP','$Gia','$ThongTinSP','$file_name','$SoLuong','$MaLoai','$BrandId')";
            mysqli_query($conn,$sql);
            mysqli_close($conn);

            Product::insert($TenSP,$Gia,$ThongTinSP,$Anh,$SoLuong,$MaLoai,$BrandId);
            header("location: ./index.php?insert=Successfully");
        }
    }
?>

<?php include '../includes/header.php'?>
<style>
    .hidden {
        display: none;
    }
</style>
<div class="container">
    <h2>Thêm sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <td><label class="form-label">Tên sản phẩm</label></td>
                <td>
                    <input type="text" class="form-control" id="TenSP" placeholder="Tên" name="TenSP" value="<?php echo $TenSP ?>"/>
                    <?php echo "<p class='text-danger'>$errTenSP</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Giá</label></td>
                <td>
                    <input type="text" class="form-control" id="Gia" placeholder="Giá tiền" name="Gia" value="<?php echo $Gia ?>"/>
                    <?php echo "<p class='text-danger'>$errGia</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Thông tin sản phẩm</label></td>
                <td>
                    <input type="text" class="form-control" id="ThongTinSP" placeholder="Thông tin" name="ThongTinSP" value="<?php echo $ThongTinSP ?>"/>
                    <?php echo "<p class='text-danger'>$errThongTinSP</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Chọn ảnh</label></td>
                <td>
                    <input type="file" class="form-control" id="Anh" name="Anh" />
                    <br />
                    <img id="preview" src="#" width="150" height="100" class="hidden" />
                    <?php echo "<p class='text-danger'>$errAnh</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Số lượng</label></td>
                <td>
                    <input type="text" class="form-control" id="SoLuong" placeholder="Số lượng" name="SoLuong" value="<?php echo $SoLuong ?>" />
                    <?php echo "<p class='text-danger'>$errSoLuong</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Loại sản phẩm</label></td>
                <td>
                    <select class="form-control" id="MaLoai" name="MaLoai">
                        <option value="">Vui lòng chọn loại</option>
                        <?php foreach($productType as $proType){?>
                            <option value="<?php echo $proType->MaLoai?>"><?php echo $proType->TenLoai?></option>
                        <?php } ?>
                    </select>
                    <?php echo "<p class='text-danger'>$errMaLoai</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Thương hiệu</label></td>
                <td>
                    <select class="form-control" id="BrandId" name="BrandId">
                        <option value="">Vui lòng chọn thương hiệu</option>
                        <?php foreach($brand as $each){?>
                            <option value="<?php echo $each->BrandId?>">
                                <?php echo $each->BrandName?>
                            </option>
                        <?php }?>
                    </select>
                    <?php echo "<p class='text-danger'>$errBrandId</p>" ?>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn action-1">Thêm</button>
        <a href="./index.php" class="btn action-2">Huỷ</a>
    </form>
</div>
<script>
    Anh.onchange = evt => {
        const [file] = Anh.files
        if (file) {
            preview.src = URL.createObjectURL(file);
            $("#preview").removeClass("hidden");
        }
    }
</script>
<?php include '../includes/footer.php'?>