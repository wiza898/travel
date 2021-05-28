<?php include('../db/ketnoi.php'); ?>
<?php
if (isset($_POST['capnhatdonhang'])) {
    $xuly = $_POST['xuly'];
    $mahang = $_POST['mahang_xuly'];
    $sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE mahang='$mahang'");
    header('Location: xulydonhang.php');
} 
//xóa
if(isset($_GET['xoadonhang'])){
    $mahang= $_GET['xoadonhang'];
    $sql_delete = mysqli_query($con,"DELETE FROM tbl_donhang WHERE mahang='$mahang'");
    header('Location: xulydonhang.php');
}

?>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<body>
    <?php include './menutop.php' ?>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['quanly']) == 'xemdonhang') {
                $mahang = $_GET['mahang'];
                $sql_chitiet = mysqli_query($con, "SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id = tbl_sanpham.sanpham_id AND tbl_donhang.mahang = '$mahang'");

            ?>
                <div class="col-md-12">
                    <h3>Xem chi tiết đơn hàng</h3>
                    <form action="" method="POST">
                    <table class="table table-bordered">
                        <tr>
                            <th>Thứ tự</th>
                            <th>Mã hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt</th>
                            <!-- <th>Quản lý</th> -->
                        </tr>
                        <?php
                        $i = 0;
                        while ($row_donhang = mysqli_fetch_array($sql_chitiet)) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row_donhang['sanpham_name'] ?></td>
                                <td><?php echo $row_donhang['mahang'] ?></td>
                                <td><?php echo $row_donhang['soluong'] ?></td>
                                <td><?php echo number_format($row_donhang['soluong'] * $row_donhang['sanpham_gia']) . 'vnđ' ?></td>
                                <td><?php echo $row_donhang['ngaythang'] ?></td>
                                <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <select class="form-control" name="xuly">
                        <option value="1">Đã xử lý</option>
                        <option value="0">Chưa xử lý</option>
                    </select><br>
                    <input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
                    </form>
                </div>
            <?php
            } else {
            ?>

            <?php
            }
            ?>
            <div class="col-md-12">
                <h4>Liệt kê đơn hàng</h4>
                <?php
                $sql_select = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id ORDER BY tbl_donhang.donhang_id ASC");
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Mã hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Ghi chú</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Quản lý</th>
                       
                    </tr>
                    <?php
                    $i = 0;
                    while ($row_donhang = mysqli_fetch_array($sql_select)) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row_donhang['mahang'] ?></td>
                            <td><?php echo $row_donhang['name'] ?></td>
                            <td><?php echo $row_donhang['ngaythang'] ?></td>
                                <td><?php echo $row_donhang['note'] ?></td>
                                <td><?php  
                                    if($row_donhang['tinhtrang']==0){
                                        echo '<span style="color:#FF0000;text-align:center;">Chưa xử lý</span>';
                                    }else{
                                        echo '<span style="color:#AFA;text-align:center;">Đã xử lý</span>';
                                    }
                                ?></td>

                            <td><a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>">Xóa</a>
                                |<a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem đơn hàng</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>