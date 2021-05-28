<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="danhmuc.php">Danh mục</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dulich.php">Sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="thanhvien.php">Thành viên</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="danhmucbaiviet.php">Danh mục bài viết</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
      </li>
      <li lass="nav-item">
        <a class="nav-link" href="../index.php" target="_blank">
          <script>
            var myVar = setInterval(function() {
              myTimer()
            }, 1000);

            function myTimer() {
              var d = new Date();
              var t = d.toLocaleTimeString();
              document.getElementById("h").innerHTML = t;
            }
          </script>
          <span id="h"></span>
          <script type="text/javascript">
            n = new Date();
            if (n.getTimezoneOffset() == 0) t = n.getTime() + (7 * 60 * 60 * 1000);
            else t = n.getTime();
            n.setTime(t);
            var dn = new Array("Chủ nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7");
            d = n.getDay();
            m = n.getMonth() + 1;
            y = n.getFullYear()
            document.write(dn[d] + ", " + (n.getDate() < 10 ? "0" : "") + n.getDate() + "/" + (m < 10 ? "0" : "") + m + "/" + y)
          </script>
        </a>
      </li>

    </ul>
  </div>
</nav>