<?php
if (isset($_GET['dangxuat'])) {
	$id = $_GET['dangxuat'];
	if ($id == 1) {
		unset($_SESSION['dangnhap_home']);
	}
}
?>
       <style>
       body,ul,p{
           margin:0; padding:0;
       }
       ul{
           list-style-type:none;
       }
       html,body{
           height:100%;
       }
       #wrap{
           position:relative;
           width:100%;
           min-width:1200px;
           height:100%;
           overflow:hidden;
       }
       .main-body{
           position:absolute;
           top: 0;
           width:100%;
           height:100%;
       }
       .main-header{
           width:100%;
           height:100px;
       }
       .logo{
           float:left;
           width:300px;
           text-align:center;
           line-height:100px;
           margin-top:25px;
       }
       .nav{
           float:right;
           width:460px;
           height:100px;
       }
       .item{
           float:left;
           line-height:100px;
           color:#fff;
           margin-left:30px;
           cursor:pointer;
       }
       .main-content{
           position:relative;
           width:100%;
           height:65%;
       }
       .line{
           position:absolute;
           right:150px;
           bottom:140px;
       }
       .main-footer{
           margin-top:50px;
           width:100%;
           height:300px;
           text-align:center;
           font-size:14px;
           color:#fff;
       }
       </style>   
</head>
<body>
    <div id="wrap">

        <div bg-video loop>
            <video src="http://s3.bytecdn.cn/aweme/resource/web/static/image/index/new-tvc_889b57b.mp4" width="100%" height="110%" autoplay="autoplay" loop
                muted="muted" cue-before:none;></video>
        </div>
    
        <div class="main-body">
            <div class="main-header">
                <div class="logo">
                <a href="./index.php" target="_self"> 
                <img src="images/logo.png" alt="" border="0"/> 
                </div>
                <div class="nav">
                    <ul>
                        <li class="item"><a href="./index.php" >Trang chủ </a></li>
                        <?php
			//ASC: thêm trước trên xu DESC: đảo tùm lum
			$sql_category = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id ASC');
			?>
			<?php
			//ASC: thêm trước trên xu DESC: đảo tùm lum
			$sql_category_danhmuc = mysqli_query($con, 'SELECT * FROM tbl_category ORDER BY category_id ASC');
			while ($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)) {
			?>
                       <li class="item"><a href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>" ><?php echo $row_category_danhmuc['category_name'] ?> </a></li>
                        <?php
			}
            ?>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <img src="images/sachbalo.png" width="460px" alt="" class="line" />
            </div>
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
        </div>
    </div>
