<?php
if (isset($_GET['dangxuat'])) {
	$id = $_GET['dangxuat'];
	if ($id == 1) {
		unset($_SESSION['dangnhap_home']);
	}
}
?>
<style>
  
/*----- Phần menu -----*/
.menu {
    width: 1519px;
    margin:0px auto;
    background:#bf5c71;
    height: 37px;
}
.menu li {
    margin:0px;
    list-style:none;
    font-family:'Ek Mukta';
}
.menu a {
    transition:all linear 0.15s;
    color:#919191;
    text-decoration:none;
}
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:#be5b70;
} 
.menu .arrow {
    font-size:11px;
    line-height:0%;
} 
/*----- css cho phần menu cha -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    color:white;
}
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    background:#2e2728;
}
/*----css cho menu con----*/
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
.sub-menu {
    width:160%;
    padding:5px 0px;
    position:absolute;
    top:100%;
    left:0px;
    z-index:-1;
    opacity:0;
    transition:opacity linear 0.15s;
    box-shadow:0px 2px 3px rgba(0,0,0,0.2);
    background:#2e2728;
}
.sub-menu li {
    display:block;
    font-size:16px;
}
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}
</style>
<div class="wrapper">
    <nav class="menu">
        <ul class="clearfix">
            <li>
                <a href="#">Ẩm thực <span class="arrow">&#9660;</span></a>

                <ul class="sub-menu">
                    <li><a href="https://gonatour.vn/tong-hop-nhung-mon-ngon-mien-bac.html">Món ăn miền Bắc</a></li>
                    <li><a href="https://www.banhkhome.com/top-20-dac-san-mien-trung-noi-tieng">Món ăn miền Trung</a></li>
                    <li><a href="https://amthucgiadinh.com.vn/16-mon-ngon-mien-nam-de-lam-mot-lan-la-nho-ca-doi/">Món ăn miền Nam</a></li>
                    <li><a href="https://nld.com.vn/am-thuc-duong-pho.html">Ẩm thực đường phố</a></li>
                </ul>
            </li>
            <?php
			$sql_danhmuctin = mysqli_query($con, "SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC");

			?>
            <li>
                <a href="#">Du lịch <span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">
                <?php
					while ($row_danhmuctin = mysqli_fetch_array($sql_danhmuctin)) {
					?>
                    <li><a href="?quanly=tintuc&id_tin=<?php echo $row_danhmuctin['danhmuctin_id'] ?>"><?php echo $row_danhmuctin['tendanhmuc'] ?></a></li>
                    <?php
					}
					?>
                </ul>
            </li>
            <li class="current-item"><a href="#">Ảnh</a></li>
            <li><a href="https://www.messenger.com">Liên hệ</a></li>
                     
                     <?php
			if (isset($_SESSION['dangnhap_home'])) {

			?>
				<li><a>Xin Chào: <?php echo $_SESSION['dangnhap_home'] ?></a></li>
				</li>
			<?php
			}
            ?>
            <li>
                <a href="#">Đăng Nhập/Đăng Ký<span class="arrow">&#9660;</span></a>
                
                <ul class="sub-menu">
                    <li><a href="./include/dangnhap.php">Đăng Nhập</a></li>
                    <li><a href="./include/dangky.php">Đăng ký</a></li>
        <?php
if (isset($_SESSION['dangnhap_home'])) {

?>
    <li><a href="?dangxuat=1">Đăng xuất</a></li>
    </li>
<?php
}
?>
                </ul>
            </li>

        </ul>
    </nav>
</div>
