<?php 
    require '../../config/connect.php';
    require '../../class/Brand.php';
    require '../../class/Product.php';
    require '../../class/ProductType.php';

    $errTenSP = "";
    $errGia = "";
    $errThongTinSP = "";
    $errAnh = "";
    $errSoLuong = "";
    $errMaLoai= "";
    $errBrandId= "";
    
    $TenSP = "";
    $Gia = "";
    $ThongTinSP = "";
    $Anh = "";
    $SoLuong = "";
    $MaLoai= "";
    $BrandId= "";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        var_dump($_POST);
        $check=true;
        if(empty($_POST['TenSP'])){
            $errTenSP="Vui lòng nhập tên sản phẩm";
            $check=false;
        }

        if(empty($_POST['Gia'])){
            $errGia="Vui lòng nhập giá sản phẩm";
            $check=false;

        }
        else if(!is_numeric($_POST['Gia'])){
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
        if($check){
            $MaSP = $_POST['MaSP'];
            $TenSP = $_POST['TenSP'];
            $Gia = $_POST['Gia'];
            $ThongTinSP = $_POST['ThongTinSP'];
            $Anh = $_FILES['Anh'];
            $SoLuong = $_POST['SoLuong'];
            $MaLoai= $_POST['MaLoai'];
            $BrandId= $_POST['BrandId'];
            $ImgOld=$_POST['img_old'];
            $file_name = $Anh["name"];

            Product::update($MaSP,$TenSP,$Gia,$ThongTinSP,$Anh,$SoLuong,$MaLoai,$BrandId,$ImgOld);
            header("location: ./index.php?update=Successfully");
        }
    }
    else{
        $id=$_GET['id'];
   
        $sql1="SELECT * FROM `loaisp`";
        $sql2="SELECT * FROM `brand`";
        $productType=ProductType::getProductType($sql1);
        $brand=Brand::getBrand($sql2);

        $pro=Product::getById($id);
        if(empty($id) || empty($pro)){
            header('location: ../includes/404.php');
        }
        echo "succ";
        $MaSP = $pro->MaSP;
        $TenSP = $pro->TenSP;
        $Gia = $pro->Gia;
        $ThongTinSP = $pro->ThongTinSP;
        $Anh = $pro->Anh;
        $SoLuong = $pro->SoLuong;
        $MaLoai= $pro->MaLoai;
        $BrandId= $pro->BrandId;
        
    }
    var_dump($Anh);
?>

<?php include '../includes/header.php'?>
<style>
    .hidden {
        display: none;
    }
</style>
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="MaSP" value="<?php echo $id?>" />
            <tr>
                <td><label class="form-label">Tên sản phẩm</label></td>
                <td>
                    <input type="text" value="<?php echo $TenSP; ?>" class="form-control" id="TenSP" placeholder="Tên sản phẩm" name="TenSP" />
                    <?php echo "<p class='text-danger'>$errTenSP</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Giá</label></td>
                <td>
                    <input type="text" value="<?php echo $Gia?>" class="form-control" id="Gia" placeholder="Giá tiền" name="Gia" />
                    <?php echo "<p class='text-danger'>$errGia</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Thông tin sản phẩm</label></td>
                <td>
                    <input type="text" value="<?php echo $ThongTinSP?>" class="form-control" id="ThongTinSP" placeholder="Thông tin" name="ThongTinSP" />
                    <?php echo "<p class='text-danger'>$errThongTinSP</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Chọn ảnh</label></td>
                <td>
                    <input type="file" class="form-control" id="Anh" name="Anh"/>
                    <br />
                    
                    <input type="hidden" name="img_old" value="<?php echo $Anh?>">
                    <img id="preview" src="../../content/images/product/<?php echo $Anh?>" width="150" height="100" />
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Số lượng</label></td>
                <td>
                    <input type="text" value="<?php echo $SoLuong?>" class="form-control" id="SoLuong" placeholder="Số lượng" name="SoLuong" />
                    <?php echo "<p class='text-danger'>$errSoLuong</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Loại sản phẩm</label></td>
                <td>
                    <select class="form-control" id="MaLoai" name="MaLoai">
                        <option value="<?php echo $MaLoai?>"><?php echo ProductType::getById($pro->MaLoai)->TenLoai?></option>
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
                        <option value="<?php echo $BrandId?>"><?php echo Brand::getById($pro->BrandId)->BrandName?></option>
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
        <button type="submit" class="btn action-1">Sửa</button>
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