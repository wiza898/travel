<?php
						$sql_cate_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id ASC");
						while ($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
							$id_category = $row_cate_home['category_id'];
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
  <div  class="box_left_home">
        <div class="categorysarea">
        <a class="ah2"><h2><?php echo $row_cate_home['category_name'] ?></h2></a>
        
                                <class class="productsarea"><ul>
<!--  Bắt đầu dòng lặp sản phẩm -->
    <?php
        $sql_product = mysqli_query($con, "SELECT * FROM tbl_dulich ORDER BY dulich_id	ASC");
        while ($row_dulich = mysqli_fetch_array($sql_product)) {
            if ($row_dulich['category_id'] == $id_category) {
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
<?php
    } // đóng while cho sản phẩm
}
?>
        </div>
<!--Kết thúc 1 sản phẩm-->	


<?php
}
?>