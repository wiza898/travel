<?php include('../db/ketnoi.php'); ?>
<?php
//Thêm Sản phẩm
    if(isset($_POST['themsanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $soluong = $_POST['soluong'];
        $gia = $_POST['giasanpham'];
        $giakhuyenmai = $_POST['giakhuyenmai'];
        $danhmuc = $_POST['danhmuc'];
        $chitiet = $_POST['chitiet'];
        $mota = $_POST['mota'];
        $path = '../uploads/';

        //var_dump("tbl_sanpham(sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,category_id) values ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");Exit;
       $sql_insert_product = mysqli_query($con,"INSERT INTO tbl_sanpham(sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,category_id) values ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");
        move_uploaded_file($path,$hinhanh_tmp);
        header('Location: sanpham.php');
    }

?>
<?php
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($con,"DELETE FROM tbl_sanpham WHERE sanpham_id ='$id'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<?php include './menutop.php' ?>
    <div class="container">
        <div class="row">
            <?php
                if(isset($_GET['quanly'])=='capnhat'){
                    $id_capnhat = $_GET['capnhat_id'];
                    $sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    $id_category_1 = $row_capnhat['category_id'];
                   ?>
                      <div class="col-md-3">
                <h4>Cập nhật sản phẩm</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name'] ?>"><br>
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh" ><br>
                    <img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="240" width="240"><span>ảnh góc</span><br>
                    <label>Giá</label>
                    <input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia'] ?>"><br>
                    <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>"><br>
                    <label>Số lượng</label>
                    <input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong'] ?>"><br>
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['sanpham_mota'] ?></textarea><br>
                    <label>Chi tiết</label>
                    <textarea class="form-control" name="chitiet"><?php echo $row_capnhat['sanpham_chitiet'] ?></textarea><br>
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
                    <input type="submit" value="Cập nhật sản phẩm" class="btn btn-success" name="themsanpham">
                </form>
            </div>
                    <?php   
                }else{
                    ?>
                         <div class="col-md-3">
                <h4>Thêm sản phẩm</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh" ><br>
                    <label>Giá</label>
                    <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
                    <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>
                    <label>Số lượng</label>
                    <input type="text" class="form-control" value="" name="soluong" placeholder="Số lượng"><br>
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
                    <input type="submit" value="Thêm sản phẩm" class="btn btn-success" name="themsanpham">
                </form>
            </div>
                <?php
                }
                ?>
            <div class="col-md-8">
                <h4>Liệt kê Sản phẩm</h4>
                <?php
                $sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.category_id = tbl_category.category_id ORDER BY tbl_sanpham.sanpham_id ASC");
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <th>Quản lý</th>                        
                    </tr>
                <?php
                    $i = 0;
                    while($row_sp = mysqli_fetch_array($sql_select_sp)){
                    $i++;
                ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row_sp['sanpham_name'] ?></td>                            
                            <td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" alt="" height="200" width="200"></td>
                            <td><?php echo $row_sp['sanpham_soluong'] ?></td>
                            <td><?php echo $row_sp['category_name'] ?></td>
                            <td><?php echo number_format($row_sp['sanpham_gia']).'vnđ'?></td>
                            <td><?php echo number_format($row_sp['sanpham_giakhuyenmai']).'vnđ'?></td>
                            <td><a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">Xóa</a>||<a href="sanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">Sửa</a></td>
                        </tr>
                        <?php
                    }
                    ?>
        </table>
            </div>
        </div>
    </div>
<