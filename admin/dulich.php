<?php include('../db/ketnoi.php'); ?>
<?php
//Thêm Địa Danh
    if(isset($_POST['themdulich'])){
        $tendulich = $_POST['tendulich'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $danhmuc = $_POST['danhmuc'];
        $chitiet = $_POST['chitiet'];
        $mota = $_POST['mota'];
        $path = '../uploads/';

        //var_dump("tbl_dulich(dulich_name,dulich_chitiet,dulich_mota,dulich_gia,dulich_giakhuyenmai,dulich_soluong,dulich_image,category_id) values ('$tendulich','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");Exit;
       $sql_insert_product = mysqli_query($con,"INSERT INTO tbl_dulich(dulich_name,dulich_chitiet,dulich_mota,dulich_image,category_id) values ('$tendulich','$chitiet','$mota','$hinhanh','$danhmuc')");
        move_uploaded_file($path,$hinhanh_tmp);
        header('Location: dulich.php');
    }

?>
<?php
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($con,"DELETE FROM tbl_dulich WHERE dulich_id ='$id'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý Địa Danh</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<?php include './menutop.php' ?>
    <div class="container">
        <div class="row">
            <?php
                if(isset($_GET['quanly'])=='capnhat'){
                    $id_capnhat = $_GET['capnhat_id'];
                    $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_dulich WHERE dulich_id = '$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    $id_category_1 = $row_capnhat['category_id'];
                   ?>
                      <div class="col-md-3">
                <h4>Cập nhật Địa Danh</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên Địa Danh</label>
                    <input type="text" class="form-control" name="tendulich" value="<?php echo $row_capnhat['dulich_name'] ?>"><br>
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh" ><br>
                    <img src="../uploads/<?php echo $row_capnhat['dulich_image'] ?>" height="240" width="240"><span>ảnh góc</span><br>
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['dulich_mota'] ?></textarea><br>
                    <label>Chi tiết</label>
                    <textarea class="form-control" name="chitiet"><?php echo $row_capnhat['dulich_chitiet'] ?></textarea><br>
                    <label>Danh mục</label>
                    <?php
                        $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id ASC");
                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">   Danh mục chọn</option>
                    <?php
                        while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                            if($id_category_1 == $row_danhmuc['category_id']){
                    ?>
                        <option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                        <?php 
                        }else{

                        }
                        ?>
                        <?php
                        }
                        
                        
                        ?>
                    </select><br>
                    <input type="submit" value="Cập nhật Địa Danh" class="btn btn-success" name="themdulich">
                </form>
            </div>
                    <?php   
                }else{
                    ?>
                         <div class="col-md-3">
                <h4>Thêm Địa Danh</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên Địa Danh</label>
                    <input type="text" class="form-control" name="tendulich" placeholder="Tên Địa Danh"><br>
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh" ><br>
                    <label>Mô tả</label>
                    <textarea class="form-control" name="mota"> </textarea><br>
                    <label>Chi tiết</label>
                    <textarea class="form-control" name="chitiet"> </textarea><br>
                    <label>Danh mục</label>
                    <?php
                        $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">Danh mục chọn</option>
                        <?php
                        while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                            if($id_category_1 == $row_danhmuc['category_id']){
                            ?>
    <option  selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                            <?php
                                    }else{
                                        ?>
   <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                                        <?php
                                    }
                                }
                    ?>
                    </select><br>
                    <input type="submit" value="Thêm Địa Danh" class="btn btn-success" name="themdulich">
                </form>
            </div>
                <?php
                }
                ?>
            <div class="col-md-8">
                <h4>Liệt kê Địa Danh</h4>
                <?php
                $sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_dulich,tbl_category WHERE tbl_dulich.category_id = tbl_category.category_id ORDER BY tbl_dulich.dulich_id ASC");
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên Địa Danh</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>Quản lý</th>                        
                    </tr>
                <?php
                    $i = 0;
                    while($row_sp = mysqli_fetch_array($sql_select_sp)){
                    $i++;
                ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row_sp['dulich_name'] ?></td>                            
                            <td><img src="../uploads/<?php echo $row_sp['dulich_image'] ?>" alt="" height="200" width="200"></td>
                            <td><?php echo $row_sp['category_name'] ?></td>
                            <td><a href="?xoa=<?php echo $row_sp['dulich_id'] ?>">Xóa</a>||<a href="dulich.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['dulich_id'] ?>">Sửa</a></td>
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