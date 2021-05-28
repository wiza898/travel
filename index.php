<?php
    session_start();
    include('./db/ketnoi.php');
	?>
<!DOCTYPE html>
<html>
<head>
    <title>Khám Phá Du Lịch</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Andika+New+Basic:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>          
<!-- banner -->
<link rel="stylesheet" href="./css/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="./js/jquery.bxslider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css" rel="stylesheet" />
	<!-- banner -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel='stylesheet' href='https://themify.me/wp-content/themes/themify-v32/themify-icons/themify-icons.css'><link rel="stylesheet" href="./css/footer.css">
<link href="./css/all.css" rel="stylesheet"> <!--load all styles -->




</head>
<body>
<audio autoplay>
        <source src="https://files.slack.com/files-pri/T012H4XEPEZ-F01H3CJTLMC/download/xach_balo_ma_di_-_none.mp3?pub_secret=fd838ac554">
    </audio>

<?php
	include('./include/banner.php');
	include('./include/menu.php');
	if (isset($_GET['quanly'])) {
		$tam = $_GET['quanly'];
	} else {
		$tam = '';
	}
	if ($tam == 'danhmuc') {
		include('./include/danhmuc.php');
	} elseif ($tam == 'chitietsp') {
		include('./include/chitietsp.php');
	}elseif ($tam=='timkiem') {
			include('include/timkiem.php');
	}elseif ($tam=='tintuc') {
		include('include/tintuc.php');
	}elseif ($tam=='chitiettin') {
		include('include/chitiettin.php');
	}elseif ($tam=='xemdonhang') {
		include('include/xemdonhang.php');
	}else{
		include('./include/sp.php');
	}?>
	<div style="color: red; background-color: #2EFEF7">
  <p>Chào mừng bạn <?php echo $_SESSION['dangnhap_home'] ?> đã ghé thăm website của chúng tôi.</p>
</div> 
 <?php include('./include/footer.php'); ?>
    </body>
    </html>