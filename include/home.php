<?php
						$sql_cate_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id ASC");
						while ($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
							$id_category = $row_cate_home['category_id'];
						?>
  <!--Sản phẩm khuyến mãi nổi bật-->				
  <div  class="box_left_home">
        <div class="categorysarea">
                <a class="ah2"><h2><?php echo $row_cate_home['category_name'] ?></h2></a>
                                <class class="productsarea"><ul>
<!--  Bắt đầu dòng lặp sản phẩm -->
    <?php
        $sql_product = mysqli_query($con, "SELECT * FROM tbl_sanpham ORDER BY sanpham_id	ASC");
        while ($row_sanpham = mysqli_fetch_array($sql_product)) {
            if ($row_sanpham['category_id'] == $id_category) {
        ?>
<!--Bắt đầu 1 sản phẩm-->	
</li><li class=""><span class="badge_nphantram"><strong>21%</strong>off</span>
<div class="images"><img class="lazy" src="uploads/<?php echo $row_sanpham['sanpham_image'] ?>" alt="Tên hình ảnh" /></div>
<h3><?php echo $row_sanpham['sanpham_name'] ?></h3>
<h4>Ghi chú nhỏ</h4>
<p class="price"><s><?php echo number_format($row_sanpham['sanpham_gia']) . 'vnđ' ?></s><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) . 'vnđ' ?></p><class class="bginfodiv" data-link="sp1">
<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="bginfo">
<span class="nameinfo"><?php echo $row_sanpham['sanpham_name'] ?></span>
<span class="priceinfo"><s><?php echo number_format($row_sanpham['sanpham_gia']) . 'vnđ' ?></s><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) . 'vnđ' ?></span>
<p><?php echo $row_sanpham['sanpham_name'] ?>
<br>mô tả nhỏs
<br>kích thước
<br>muốn có ghi chú nhiều thêm br xuống dòng
<br>Bạn muốn đặt Size vào chăm sóc khách khách hàng để biết thêm chi tiết
<br>Trọng lượng: 1,2 g</p>
</a>
<?php
										} // đóng while cho sản phẩm
									}
									?>
        </div>
<!--Kết thúc 1 sản phẩm-->	


<?php
						}
						?>