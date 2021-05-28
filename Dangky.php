<?php
    session_start();
    include('./db/ketnoi.php');
    ?>
<?php
if(isset($_POST['dangky'])){
    $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $password = md5($_POST['password']);
     $note = $_POST['note'];
     $address = $_POST['address'];
     //var_dump("tbl_khachhang(name,phone,email,address,note,password) values ('$name','$phone','$email','$address','$note','$password')");Exit;
     $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,password) values ('$name','$phone','$email','$address','$note','$password')");
     $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
     $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
     $_SESSION['dangnhap_home'] = $name;
    $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
    
     header('Location:index.php?quanly=giohang');
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!doctype html>
<html lang="en">
<head>
<?php
if(isset($_POST['dangky'])){
		$name = $_POST['name'];
	 	$phone = $_POST['phone'];
	 	$email = $_POST['email'];
	 	$password = md5($_POST['password']);
	 	$address = $_POST['address'];
 
 		$sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,password) values ('$name','$phone','$email','$address','$password')");
 		$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
 		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);
 		$_SESSION['dangnhap_home'] = $name;
		$_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
		
 		header('Location:index.php?quanly=giohang');
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Đăng ký</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="index.php">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Dangnhap.php">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Dangky.php">Đăng ký</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Đăng ký</div>
                        <div class="card-body">
                            <form action="" method="POST">

                            <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Tên tài khoản</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="name" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Số điện thoại</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="phone" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="address" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Ghi chú</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="note" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>


                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="dangky" class="btn btn-primary">
                                       Đăng ký
                                    </button>
                                    <a href="Dangnhap.php" class="btn btn-link">
                                        Có tài khoản ?
                                    </a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>







</body>
</html>
    
</body>
</html>