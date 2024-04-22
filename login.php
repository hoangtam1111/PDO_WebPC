<?php
    require './config/connect.php';
    require './class/User.php';
    include './includes/header.php';
    //Header
    //Login
    $userNameLogin=""; $passwordLogin=""; $errUserNameLogin=""; $errPasswordLogin=""; 
    // Register
    $nameReg=""; $emailReg=""; $diaChiReg=""; $userNameReg=""; $passwordReg=""; $confirmPasswordReg=""; 
    $errNameReg=""; $errEmailReg=""; $errDiaChiReg=""; $errUserNameReg=""; $errPasswordReg=""; $errConfirmPasswordReg=""; 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['Process']=="login"){
            $userNameLogin=$_POST['Username'];
            $passwordLogin=$_POST['Password'];
            if(empty($userNameLogin)){
                $errUserNameLogin="Vui lòng nhập username";
            }
            if(empty($passwordLogin)){
                $errPasswordLogin="Vui lòng nhập password";
            }
            if(!empty($userNameLogin)&&!empty($passwordLogin)){
                $sql="SELECT Id,Name,Admin,Password FROM `user` WHERE UserName='$userNameLogin'";
                $account=User::getUsers($sql);
                $num_rows=count($account);
                if($num_rows==1){
                    if(password_verify($passwordLogin, $account[0]->Password)){
                        $_SESSION['Id']=$account[0]->Id;
                        $_SESSION['Name']=$account[0]->Name;
                        
                        if($account[0]->Admin==1){
                            $_SESSION['Admin']=1;
                            header("location: ./admin/home");
                            exit;
                        }
                        else{
                            $_SESSION['Admin']=0;
                            header("location: ./index.php");
                            exit;
                        }
                    }
                }
                $errPasswordLogin="Tài khoản hoặc mật khẩu sai!!!";
            }
        }else if($_POST['Process']=="register"){
            $check=true;
            $nameReg=$_POST['Name'];
            $emailReg=$_POST['Email'];
            $diaChiReg=$_POST['DiaChi'];
            $userNameReg=$_POST['Username'];
            $passwordReg=$_POST['Password'];
            $confirmPasswordReg=$_POST['ConfirmPassword'];
            if(empty($nameReg)){
                $errNameReg= 'Vui lòng nhập tên';
                $check=false;
            }
            if(empty($emailReg)){
                $errEmailReg= 'Vui lòng nhập Email';
                $check=false;
            }else if(!filter_var($emailReg, FILTER_VALIDATE_EMAIL)){
                $errEmailReg= 'Vui lòng nhập đúng định dạng email';
                $check=false;
            }
            if(empty($diaChiReg)){
                $errDiaChiReg= 'Vui lòng nhập Địa chỉ';
                $check=false;
            }
            if(empty($userNameReg)){
                $errUserNameReg= 'Vui lòng nhập tài khoản';
                $check=false;
            }
            if(empty($passwordReg)){
                $errPasswordReg= 'Vui lòng nhập mật khẩu';
                $check=false;
            }else if(strlen($_POST['Password'])<8){
                $errPassword= 'Mật khẩu phải từ 8 kí tự';
                $check=false;
            }
            if(empty($confirmPasswordReg)){
                $errConfirmPasswordReg= 'Vui lòng nhập xác nhận mật khẩu';
                $check=false;
            }else if($passwordReg!=$confirmPasswordReg){
                $errConfirmPasswordReg="Nhập sai mật khẩu. Vui lòng nhập lại!";
            }
            if($check){
                $hashedPassword = password_hash($passwordReg, PASSWORD_DEFAULT);
                User::insert($userNameReg,$hashedPassword,$nameReg,$emailReg,$diaChiReg,0);
                $select="SELECT Id,Name FROM `user` WHERE UserName='$userNameReg' and Password='$passwordReg'";
                $each=User::getUsers($select);
                $_SESSION['Id']=$each[0]->Id;
                $_SESSION['Name']=$each[0]->Name;
                $_SESSION['Admin']=0;
                header("location: ./index.php?success=register successfully");
                exit;
            }
        }
    }
?>


<style>
    .login {
        display: flex;
        flex-direction: column;
    }

        .login input {
            padding: 4px 24px;
            margin-bottom: 12px;
            max-width: 450px;
        }

        .login button {
            border: 0.5px solid #E02207;
            border-radius: 0;
            color: white;
            background-color: #E02207;
            max-width: 450px;
            margin-bottom: 24px;
        }

            .login button:hover {
                background: white;
                color: #E02207;
                border: 0.5px solid #E02207;
            }

    .row {
        margin-bottom: 24px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">

            <form method="post" enctype="multipart/form-data">
                <div class="login">
                    <h2>ĐĂNG NHẬP</h2>
                    <input type="hidden" name="Process" value="login">
                    <input type="text" name="Username" placeholder="Nhập tài khoản" value="<?php echo $userNameLogin ?>" /> <?php echo "<p class='text-danger'>$errUserNameLogin</p>" ?>
                    <input type="password" name="Password" placeholder="Nhập mật khẩu" value="<?php echo $passwordLogin ?>" />  <?php echo "<p class='text-danger'>$errPasswordLogin</p>" ?>
                    <button type="submit" class="btn">Đăng nhập</button>
                    <a style="color: #E02207;" href="./forgot_password.php">Quên mật khẩu</a>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="login">
                    <h2>ĐĂNG KÝ MỚI</h2>
                    <input type="hidden" name="Process" value="register">
                    <input type="text" class="form-control" name="Name" placeholder="Họ Tên" value="<?php echo $nameReg ?>" /><?php echo "<p class='text-danger'>$errNameReg</p>" ?>
                    <input type="email" class="form-control" name="Email" placeholder="Email của bạn" value="<?php echo $emailReg ?>" /><?php echo "<p class='text-danger'>$errEmailReg</p>" ?>
                    <input type="text" class="form-control" name="DiaChi" placeholder="Địa chỉ" value="<?php echo $diaChiReg ?>" /><?php echo "<p class='text-danger'>$errDiaChiReg</p>" ?>
                    <input type="text" class="form-control" name="Username" placeholder="Tài khoản" value="<?php echo $userNameReg ?>" /><?php echo "<p class='text-danger'>$errUserNameReg</p>" ?>
                    <input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu" value="<?php echo $passwordReg?>" /><?php echo "<p class='text-danger'>$errPasswordReg</p>" ?>
                    <input type="password" class="form-control" name="ConfirmPassword" placeholder="Nhập lại mật khẩu" value="<?php echo $confirmPasswordReg ?>" /><?php echo "<p class='text-danger'>$errConfirmPasswordReg</p>" ?>
                    <button type="submit" class="btn">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include './includes/footer.php'?>