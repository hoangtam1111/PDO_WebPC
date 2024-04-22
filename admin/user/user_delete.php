<?php 
    require '../../config/connect.php';
    require '../../class/User.php';
    require '../../class/Cart.php';
    $id=$_GET['id'];
    $user=User::getById($id);
    if(empty($user) || empty($id))
        header('location: ../includes/404.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id=$_POST['Id'];
        $cart="SELECT * FROM `cart` WHERE IdUser=$id";
        $result=Cart::getCart($cart);
        if(count($result)>0){
            header("location: ../index.php?delete=Error: user included in the cart");
        }
        User::delete($id);
        mysqli_close($conn);
        header("location: ../index.php?delete=Successfully");
        
    }
?>

<?php include '../includes/header.php' ?>

<link rel="stylesheet" href="../../content/css/Users.css">
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="login">
            <h2>Xóa tài khoản</h2>
            <table class="table table-bordered">
                <input type="hidden" name="Id" value="<?php echo $id?>" />
                <tr>
                    <td>Tài khoản</td>
                    <td><?php echo $user->UserName?></td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td><?php echo $user->Name?>e</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user->Email?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?php echo $user->Address?></td>
                </tr>
            </table>
            <div class="action">
                <button type="submit" class="btn action-1">Xóa</button>
                <a href="./index.php" class="btn action-2">Quay lại trang user</a>
            </div>
        </div>
    </form>
</div>
<?php include '../includes/footer.php' ?>