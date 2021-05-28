<?php
if (isset($_POST['search_button'])) {

	$tukhoa = $_POST['search_product'];


	$sql_product = mysqli_query($con, "SELECT * FROM tbl_dulich WHERE dulich_name LIKE '%$tukhoa%' ORDER BY dulich_id DESC");

	$title = $tukhoa;
}
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
<div class="box_left_home">
	<div class="categorysarea">
		<a class="ah2">
			<h2>Từ khóa tìm kiếm : <?php echo $title ?></h2>
		</a>
		<!-- <?php
				$sql_cate_home = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY category_id ASC");
				while ($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
					$id_category = $row_cate_home['category_id'];
				?> -->

		<?php
					while ($row_dulich = mysqli_fetch_array($sql_product)) {
		?>

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
</div>