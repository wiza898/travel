<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
} else {
$id = '';
}
$sql_cate = mysqli_query($con, "SELECT * FROM tbl_category,tbl_dulich WHERE tbl_category.category_id=tbl_dulich.category_id AND tbl_dulich.category_id='$id' ORDER BY tbl_dulich.dulich_id ASC");
$sql_category = mysqli_query($con, "SELECT * FROM tbl_category,tbl_dulich WHERE tbl_category.category_id=tbl_dulich.category_id AND tbl_dulich.category_id='$id' ORDER BY tbl_dulich.dulich_id ASC");
$row_title = mysqli_fetch_array($sql_cate);
$title = $row_title['category_name'];
?>
 <style type="text/css">
		.card-group {
            text-align: center; 
            display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
        }

	</style>
<!--Sản phẩm khuyến mãi nổi bật-->
<div class="box_left_home">
<div class="categorysarea">
<a class="ah2">
        <h2><?php echo $title ?></h2>
</a>

<class class="productsarea">
        <ul>
                <!--  Bắt đầu dòng lặp sản phẩm -->
                <?php
                while ($row_dulich = mysqli_fetch_array($sql_category)) {
                ?>
                        <!--Bắt đầu 1 sản phẩm-->
                        <div class="card-group">
                                <div class="card">
                                        <img class="card-img-top" src="uploads/<?php echo $row_dulich['dulich_image'] ?>" alt="">
                                        <div class="card-body">
                                                <h5 class="card-title"><?php echo $row_dulich['dulich_name'] ?></h5>
                                                <a href="?quanly=chitietsp&id=<?php echo $row_dulich['dulich_id'] ?>" class="btn btn-primary">Xem chi tiết</a>
                                        </div>
                                </div>
                        </div>
                </div>
                <?php
                } // đóng while cho sản phẩm
                ?>