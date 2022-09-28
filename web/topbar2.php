<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark d-flex justify-content-between">

  <!-- Left navbar links -->
  <div class="dropdown navbar-nav">
    <a href="javascript:void(0)" class="" data-toggle="dropdown" aria-expanded="true" style="font-size: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
      <i class="fas fa-solid fa-gears"></i>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_id'] ?>">Manage Account</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
    </div>
  </div>



  <!-- Center navbar links -->
  <div class="navbar-nav">
    <a class="nav-link text-white" href="mainpage.php" role="button">
      <large><b>SMC Dean's Document Management System</b></large>
    </a>
  </div>


  <!-- Right navbar links -->
  <div class="navbar-nav">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-solid fa-maximize"></i>
    </a>
  </div>
</nav>

<script>
  $(document).ready(function() {
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active')
      console.log($('.nav-link.nav-' + page).hasClass('tree-item'))
      if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open')
      }

    }
    $('.manage_account').click(function() {
      uni_modal('Manage Account', 'manage_user.php?id=' + $(this).attr('data-id'))
    })
  })
</script>
<!-- /.navbar -->