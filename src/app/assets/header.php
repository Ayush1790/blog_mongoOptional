<!-- header page -->
<!-- navber -->
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand ms-4" href="#">Blog's</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
    <ul class="nav ">
      <li class="nav-item">
        <a class="nav-link active" href="userdashboard?msg=all">Home</a>
      </li>
      
      <?php
      session_start();
      if (!isset($_SESSION['isLogin'])) {
        
        echo "  <li class='nav-item'></li>
        <a class='nav-link ' href='login' >Login</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='userdashboard?msg=myBlog'>My Blogs</a>
      </li>";
        echo "<li class='nav-item'>
        <a class='nav-link' href='./addBlog.php'>Add Blog</a>
      </li>  <li class='nav-item'></li>
      <a class='nav-link ' href='logout' >LogOut</a>
    </li>";
      }
      ?>
    </ul>
  </div>
</nav>