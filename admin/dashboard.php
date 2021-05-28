<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location: index.php');
    }
    if(isset($_GET['login'])){
        $dangxuat = $_GET['login'];
    }else{
        $dangxuat = '';
    }
    if($dangxuat == 'dangxuat'){
        session_destroy(['dangnhap']);
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
            <!-- Custom-Files -->
            <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
        <p>Xin chào:<?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">đăng xuất</a></p>
        <?php include'./menutop.php' ?>

</body>
</html>