<?php
    if(isset($_POST['trove'])){
        header('Location: dashboard.php');
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thành công</title>
</head>
<body>
    <h1>Đã thêm thành công</h1>
<form action="" method="POST">
                    <input type="submit" value="Trở về" class="btn btn-success" name="trove">
                </form>
</body>
</html>