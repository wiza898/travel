<?php include('../db/ketnoi.php'); ?>

<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
<?php include'./menutop.php' ?>
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-16">
                    <h4>Khách hàng</h4>
                    <?php
                    $sql_select_khachhang = mysqli_query($con, "SELECT * FROM tbl_khachhang,tbl_giaodich WHERE tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id ORDER BY tbl_khachhang.khachhang_id DESC");
                   ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên khách hàng</th>                         
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Ngày mua</th>
                            <th>Mã giao dịch</th>
                            <th>Quản lý</th>
                        </tr>

                        <?php
                        $i = 0;
                        while ($row_khachhang = mysqli_fetch_array($sql_select_khachhang)) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row_khachhang['name'] ?></td>
                                <td><?php echo $row_khachhang['phone'] ?></td>
                                <td><?php echo $row_khachhang['address'] ?></td>
                                <td><?php echo $row_khachhang['email'] ?></td>
                                <td><?php echo $row_khachhang['ngaythang'] ?></td>
                                <td><?php echo $row_khachhang['magiaodich'] ?></td>
                                <td><a href="?quanly=xemgiaodich&khachhang=<?php echo $row_khachhang['magiaodich'] ?>">Xem lịch sử mua hàng</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
    <div class="col-md-12">
        <h4>Liệt kê lịch sử đơn hàng</h4>
        <?php
        if(isset($_GET['khachhang'])){
            $magiaodich = $_GET['khachhang'];
        }else{
            $magiaodich = '';
        }
        $sql_select = mysqli_query($con, "SELECT * FROM tbl_giaodich,tbl_khachhang,tbl_sanpham WHERE tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id AND tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id AND tbl_giaodich.magiaodich='$magiaodich' ORDER BY tbl_giaodich.giaodich_id ASC");
        ?>
        <table class="table table-bordered">
            <tr>
                <th>Thứ tự</th>
                <th>Mã giao dịch</th>
                <th>Tên sản phẩm</th>
                <th>Ngày đặt</th>
                
            </tr>
            <?php
            $i = 0;
            while ($row_khachhang_donhang = mysqli_fetch_array($sql_select)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row_khachhang_donhang['magiaodich'] ?></td>
                    <td><?php echo $row_khachhang_donhang['sanpham_name'] ?></td>
                    <td><?php echo $row_khachhang_donhang['ngaythang'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
        </div>
    </div>
    </div>
</body>

</html>