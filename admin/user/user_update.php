<?php 
    require '../../class/User.php';
    require '../../config/connect.php';
    $id=$_GET['id'];
    $user=User::getById($id);
    if(empty($user) || empty($id))
        header('location: ../includes/404.php');

    $errName="";
    $errEmail="";
    $errDiaChi="";
    
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

        if(empty($_POST['Admin']))
                $Admin=0;
            else
                $Admin=1;
        $Name=$_POST['Name'];
        $Email=$_POST['Email'];
        $DiaChi=$_POST['DiaChi'];

        if($check){
            User::update($Name, $Email, $Address,$Id);
            header("location: ./index.php?update=Successfully");
        }
    }
    else{
        if(empty($user->Admin))
                $Admin=0;
            else
                $Admin=1;
        $Name=$user->Name;
        $Email=$user->Email;
        $DiaChi=$user->Address;
    }
?>

<?php include '../includes/header.php' ?>

<link rel="stylesheet" href="../../content/css/Users.css">
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="login">
            <h2>Chỉnh sửa thông tin tài khoản</h2>
            <input type="hidden" name="Id" value="<?php echo $id?>" />
            <input type="text" class="form-control" name="Name" placeholder="Họ Tên" value="<?php echo $Name?>" />
            <?php echo "<p class='text-danger'>$errName</p>" ?>

            <input type="email" class="form-control" name="Email" placeholder="Email của bạn" value="<?php echo $Email?>" />
            <?php echo "<p class='text-danger'>$errEmail</p>" ?>
            
            <input type="text" class="form-control" name="DiaChi" placeholder="Địa chỉ" value="<?php echo $DiaChi?>" />
            <?php echo "<p class='text-danger'>$errDiaChi</p>" ?>
            
            <?php if($Admin==1){?>
                <div>Admin <input type="checkbox" name="Admin" id="" checked></div>
            <?php } else{?>
                <div>Admin <input type="checkbox" name="Admin" id="" ></div>
            <?php }?>
            <div class="action">
                <button type="submit" class="btn action-1">Lưu</button>
                <a href="./index.php" class="btn action-2">Quay lại trang user</a>
            </div>
        </div>
    </form>
</div>
<?php include '../includes/footer.php' ?>