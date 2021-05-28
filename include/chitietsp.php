	<?php
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
		$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_dulich WHERE dulich_id='$id'");
	?>
<?php
	while($row_chitiet = mysqli_fetch_array($sql_chitiet)){
?>
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">

								<li data-thumb=uploads/<?php echo $row_chitiet['dulich_image'] ?>">
									<div class="thumb-image">
										<img src="uploads/<?php echo $row_chitiet['dulich_image'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
						
								
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['dulich_name'] ?></h3>
					<p class="mb-3">
					</p>
					
					<div class="product-single-w3l">
						<p><?php echo $row_chitiet['dulich_chitiet'] ?></p> <br>
						<p><?php echo $row_chitiet['dulich_mota'] ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} 
	?>