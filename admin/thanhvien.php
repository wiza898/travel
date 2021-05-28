<?php include('../db/ketnoi.php'); ?>

<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý khách hàng</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <script src="./tim.js"></script>
</head>
<body>
<?php include'./menutop.php' ?>
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-16">
                    <h4>Thành viên</h4>
                    <?php
                    $sql_select_khachhang = mysqli_query($con, "SELECT * FROM tbl_khachhang");
                   ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên thành viên</th>                         
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Mật khẩu đã mã hóa MD5</th>
                            <th>Email</th>
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
                                <td><?php echo $row_khachhang['password'] ?></td>
                                <td><?php echo $row_khachhang['email'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
    </div>
        </div>
    </div>
    </div>
</body>

</html>