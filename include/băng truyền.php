	<!-- menu phải -->
    <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Tìm Kiếm..</h3>
							<form action="#" method="post">
								<input type="search" placeholder="sản phẩm..." name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- Giá -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giá</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Dưới 1 triệu</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- reviews -->
						<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Khách Hàng Review</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5.0</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- //reviews -->

						<!-- Danh mục sản phẩm -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
							<?php
							//ASC: thêm trước trên xu DESC: đảo tùm lum
							$sql_category_sidebar = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id ASC');
							while ($row_category_sidebar = mysqli_fetch_array($sql_category_sidebar)) {
							?>

								<ul>
									<li>

										<span class="span"><a href="danhmucsanpham.php?id=<?php echo $row_category_sidebar['category_id'] ?>"><?php echo $row_category_sidebar['category_name'] ?></a></span>
									</li>
								</ul>
							<?php
							}
							?>
						</div>
						<!-- //Danh mục sản phẩm -->

						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
							<div class="box-scroll">
								<div class="scroll">

									<?php
									$sql_product_sidebar = mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE sanpham_hot='0' ORDER BY sanpham_id ASC");
									while ($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)) {
										//if($row_sanpham['category_id']==$id_category){
									?>
										<div class="row">
											<div class="col-lg-3 col-sm-2 col-3 left-mar">
												<img src="images/<?php echo $row_sanpham_sidebar['sanpham_image'] ?>" alt="" class="img-fluid">
											</div>
											<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
												<a href=""><?php echo $row_sanpham_sidebar['sanpham_name'] ?></a>
												<a href="" class="price-mar mt-2"><?php echo number_format($row_sanpham_sidebar['sanpham_gia']) . 'vnđ' ?></a>
												<del><?php echo number_format($row_sanpham_sidebar['sanpham_giakhuyenmai']) . 'vnđ' ?></del>
											</div>
										</div>
									<?php
									}
									?>


								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
					<!-- //product right -->
				</div>
			</div>
	</div>
</div>
<!-- menu phải -->