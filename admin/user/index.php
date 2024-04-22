<?php 
    require '../../config/connect.php';
    require '../../class/User.php';
    $sql="SELECT * FROM `user`";
    $result=User::getUsers($sql);
?>

<?php include '../includes/header.php' ?>

<link href="../..//content/css/Users.css" rel="stylesheet" />
<link href="../..//content/css/productIndex.css" rel="stylesheet" />

<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="../home/">Trang chủ</a> /
            </li>
            <li>
                <a href="./index.php">user</a> /
            </li>
        </ul>
    </div>
    <a href="./user_insert.php" style="color: #E02207;">Thêm tài khoản mới</a>
    <table class="table table-bordered">
        <tr>
            <th>Tài khoản</th>
            <th>Họ Tên</th>
            <th>Chỉnh sửa</th>
        </tr>
        <?php foreach($result as $user){?>
            <tr>
                <td><a href="./user_detail.php?id=<?php echo $user->Id ?>"><?php echo $user->UserName ?></a></td>
                <td><?php echo $user->Name ?></td>
                <td><a href="./user_update.php?id=<?php echo $user->Id ?>">Sửa</a> | <a href="./user_delete.php?id=<?php echo $user->Id ?>">Xóa</a></td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include '../includes/footer.php' ?>