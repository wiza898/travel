<?php
if (isset($_GET['dangxuat'])) {
	$id = $_GET['dangxuat'];
	if ($id == 1) {
		unset($_SESSION['dangnhap_home']);
	}
}
?>
<?php
    session_start();
    include('./db/ketnoi.php');
    ?>
<?php
																						//ASC: thêm trước trên xu DESC: đảo tùm lum
		$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id ASC');

	?>
<div class="navbar navbar-inverse">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">SHOPBÁNGIÀY.COM</a></li>
                        <?php
																//ASC: thêm trước trên xu DESC: đảo tùm lum
$sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id ASC');
while($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){					
?>
 
                            <li><a href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>"><?php echo $row_category_danhmuc['category_name'] ?></a></li>
</li>
<?php
}
?>
                         

                         <form class="navbar-form navbar-left" action="index.php?quanly=timkiem" method="POST">
			<div class="input-group">
				<input type="text" class="form-control" name="search_product" placeholder="Tìm Kiếm" name="search">
				<div class="input-group-btn">
					<button class="btn btn-default" name="search_button" type="submit">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</div>
			</div>
		</form>
</button>
</div>
</div>
</form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                        <?php
			if (isset($_SESSION['dangnhap_home'])) {

			?>
             <li><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>"><span class="glyphicon glyphicon-user"></span>Xin Chào : <?php echo $_SESSION['dangnhap_home'] ?></a></li>
			<?php
			}
            ?>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập / Đăng Ký <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../Dangnhap.php">Đăng Nhập</a></li>
                                    <li><a href="../Dangky.php">Đăng Ký</a></li>
                                  
        <?php
if (isset($_SESSION['dangnhap_home'])) {

?>
 <li><a href="?dangxuat=1">Đăng xuất</a></li>
<?php
}
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
