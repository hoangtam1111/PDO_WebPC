<?php 
    require '../../config/connect.php';
    require '../../class/Order.php';
    require '../../class/User.php';
    $sql="SELECT * FROM `donhang`";
    $result=Order::getOrder($sql);

?>

<?php include '../includes/header.php'; ?>

<link href="../../content/css/Users.css" rel="stylesheet" />
<link href="../../content/css/productIndex.css" rel="stylesheet" />

<div class="container">
    <div class="insBreadcrumbs">
        <ul>
            <li>
                <a href="../home/">Trang chủ</a> /
            </li>
            <li>
                <a href="./index.php">Đơn hàng</a> /
            </li>
        </ul>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tài khoản</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th></th>
        </tr>
        <?php foreach($result as $order){?>
            <tr>
                <td><a href="./order_detail.php?id=<?php echo $order->MaDH?>"><?php echo $order->MaDH?></a></td>
                <td><a href="<?php echo $order->MaUser?>"><?php echo User::getById($order->MaUser)->UserName ?></a></td>
                <td><?php echo $order->NgayDat ?></td>
                <td><?php echo number_format($order->TongTien, 0, ".", ",")?> đ</td>
                <td>
                    <form action="./order_success.php" method="post">
                        <input type="hidden" name="MaDH" value="<?php echo $order->MaDH?>">
                        <button class="btn" type="submit">Giao thành công</button>
                    </form>
                </td>
            </tr>
        <?php }?>
    </table>
</div>

<?php include '../includes/footer.php'; ?>