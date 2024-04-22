<?php 
    require '../../config/connect.php';
    require '../../class/User.php';
    $Name="";
    $Email="";
    $DiaChi="";
    $Username="";
    $Password="";
    $Admin="";
    $errName="";
    $errEmail="";
    $errDiaChi="";
    $errUsername="";
    $errPassword="";
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check=true;
        if(empty($_POST['Name'])){
            $errName= 'Vui lòng nhập tên';
            $check=false;
        }
        if(empty($_POST['Email'])){
            $errEmail= 'Vui lòng nhập Email';
            $check=false;
        }else if(!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
            $errEmail= 'Vui lòng nhập đúng định dạng email';
            $check=false;
        }
        if(empty($_POST['DiaChi'])){
            $errDiaChi= 'Vui lòng nhập Địa chỉ';
            $check=false;
        }
        if(empty($_POST['Username'])){
            $errUsername= 'Vui lòng nhập tài khoản';
            $check=false;
        }
        if(empty($_POST['Password'])){
            $errPassword= 'Vui lòng nhập mật khẩu';
            $check=false;
        }else if(strlen($_POST['Password'])<8){
            $errPassword= 'Mật khẩu phải từ 8 kí tự';
            $check=false;
        }
        if(empty($_POST['Admin']))
                $Admin=0;
            else
                $Admin=1;
        $Name=$_POST['Name'];
        $Email=$_POST['Email'];
        $DiaChi=$_POST['DiaChi'];
        $Username=$_POST['Username'];
        $Password=$_POST['Password'];
        if($check){
            User::insert($UserName, $Password, $Name, $Email, $Address, $Admin);
            header("location: ./index.php?insert=Successfully");
        }
    }
?>

<?php include '../includes/header.php' ?>

<link rel="stylesheet" href="../../content/css/Users.css">
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="login">
            <h2>Tạo mới tài khoản</h2>
            <input type="text" class="form-control" name="Name" placeholder="Họ Tên" value="<?php echo $Name ?>"/>
            <?php echo "<p class='text-danger'>$errName</p>" ?>

            <input type="email" class="form-control" name="Email" placeholder="Email của bạn" value="<?php echo $Email ?>" />
            <?php echo "<p class='text-danger'>$errEmail</p>" ?>

            <input type="text" class="form-control" name="DiaChi" placeholder="Địa chỉ" value="<?php echo $DiaChi ?>" />
            <?php echo "<p class='text-danger'>$errDiaChi</p>" ?>

            <input type="text" class="form-control" name="Username" placeholder="Tài khoản" value="<?php echo $Username ?>" />
            <?php echo "<p class='text-danger'>$errUsername</p>" ?>

            <input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu" value="<?php echo $Password ?>" />
            <?php echo "<p class='text-danger'>$errPassword</p>" ?>
            
            <div>
                Admin<?php if($Admin==1){ ?>
                        <input type="checkbox" name="Admin" id="" checked>
                    <?php } else{?>
                        <input type="checkbox" name="Admin" id="">
                    <?php }?>

            </div>
            <div class="action">
                <button type="submit" class="btn action-1">Lưu</button>
                <a href="./index.php" class="btn action-2">Quay lại trang user</a>
            </div>
        </div>
    </form>
</div>
<?php include '../includes/footer.php' ?>