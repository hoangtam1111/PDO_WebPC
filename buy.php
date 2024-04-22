<?php require './config/connect.php';
    require './class/Order.php';
    require './class/Product.php';
    include './includes/header.php';

?>

<style>
    img {
        width:100px;
    }
    strong {
        color: #E02207;
    }
</style>

<?php 
    $id=$_GET['MaDH'];
    $sql="SELECT ctdh.SoLuong,sanpham.Gia,sanpham.Anh,sanpham.TenSP FROM `ctdh`,sanpham WHERE sanpham.MaSP=ctdh.MaSP and MaDH=$id";
    $product=Product::getProductsBuy($sql);
    if(count($product)>0){
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div style="text-align: center;"><img src="./content/images/layout/logo.jpg" alt="Alternate Text" style="max-width: 300px;" /></div>
                <h2>Phiếu hóa đơn TINHOCNGOISAO.COM</h2>
                <table class="table table-bordered">
                    <?php 
                        $total=0;
                    ?>
                    <?php foreach($product as $each) {?>
                        <tr>
                            <td>
                                <img src="./content/images/product/<?php echo $each->Anh?>" style="height: 50px" class="card-img-top" alt="">
                            </td>
                            <td>
                                <h5><?php echo $each->TenSP?></h5>
                                <span>Giá: <strong><?php echo number_format($each->Gia, 0, ".", ",") ?> đ</strong></span>
                                <span>Số lượng: <strong><?php echo $each->SoLuong ?></strong></span>
                                <?php $total+=$each->Gia*$each->SoLuong; ?>
                                <span>Thành tiền: <strong><?php echo number_format($each->Gia*$each->SoLuong, 0, ".", ",") ?> đ</strong></span>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <h4>Tổng tiền: <strong><?php echo number_format($total, 0, ".", ",") ?> đ</strong></h4>
                <?php
                    // update total price
                    Order::updatePrice($id,$total);
                ?>
            </div>
        </div>
    </div>
<?php }else{?>
<?php }?>

<?php include './includes/footer.php' ?>


