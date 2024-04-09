  <?php
  include_once('db_connect.php');
  connectdb();
  $userOfficeID = $_SESSION['login_office_id'];
  $user_authority_level = $_SESSION['login_authority_level'];

  ?>
  <style>
    li a:hover {
      filter: brightness(85%) !important;
    }

    .officename {
      font-size: 1vw;
    }

  </style>
  <aside class="main-sidebar sidebar-light-primary elevation-1">
    <div class="dropdown">
      <a href="javascript:void(0)" class="brand-link bg-light " data-toggle="dropdown" aria-expanded="true" style="font-size: 100%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
        <?php
        $i = 1;
        // $conn = new mysqli('localhost', 'root', '', 'smc_dms') or die("Could not connect to mysql" . mysqli_error($con));
        $qry = connectdb()->query("SELECT * FROM users LEFT JOIN office ON users.office_id = office.office_id where id = " . $_SESSION["login_id"]);
        while ($row = $qry->fetch_assoc()) :
        ?>
          <?php if ($row['office_id'] === 'CECS') : ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/CECS.png" alt="">
            <span class="brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_id'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php elseif ($row['office_code'] === 'CAS') :  ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/CAS.png" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php elseif ($row['office_code'] === 'CSD') :  ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/CCON.png" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php elseif ($row['office_code'] === 'CED') :  ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/CED.png" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php elseif ($row['office_code'] === 'CBA') :  ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/CBA.png" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php elseif ($row['office_code'] === 'COC') :  ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/COC.png" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php elseif ($row['office_code'] === 'CHM') :  ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/CHRM.png" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php elseif ($row['office_code'] === 'GS') :  ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/GSCH.png" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php else : ?>
            <img class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" src="assets/dist/img/smc/logo.jpg" alt="">
            <span class="officename brand-text h6 text-uppercase d-flex justify-content-between m-0 py-1 mr-2" title="<?php echo $row['office_name'] ?>" >
              <?php echo $row['office_code'] ?>
              <i class="fa-solid fa-circle-chevron-down text-primary mr-2"></i>
            </span>
          <?php endif; ?>
        <?php
        // $conn->close();
        endwhile;
        ?>
      </a>
      <div class="dropdown-menu w-100">
        <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_id'] ?>">Manage Account</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
      </div>
    </div>
    <div class="sidebar" id="topheader">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- <li class="nav-item active">
            <a href="./" class="nav-link nav-home active">
              <i class="nav-icon fas fa-solid fa-folder"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="./" class="nav-link bg-primary">
              <!-- <i class="nav-icon fas fa-solid fa-folder"></i> -->
              <!-- <i class="nav-icon bi bi-speedometer2"></i> -->
              <i class="nav-icon fa-solid fa-gauge"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./index.php?page=list_for_receiving" class="nav-link" title="List of documents sent to your office for receiving">
              <!-- <i class="nav-icon fas fa-angle-right nav-icon"></i> -->
              <!-- <i class="nav-icon fa-solid fa-boxes-packing text-info"></i> -->
              <div class="d-flex justify-content-between">
                <span>
                  <i class="nav-icon fa-solid fa-file-import text-info"></i>
                  <span>
                    For Receiving
                  </span>
                </span>
                <!-- <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span> -->
                <?php
                $resqry = connectdb()->query("SELECT * FROM documents WHERE recipient_office_id = '{$userOfficeID}' AND doc_status = 'ongoing' AND time_release IN (SELECT max(time_release) FROM documents GROUP BY tracking_number) ")->num_rows;
                if ($resqry > 0) { ?>
                  <span class="pull-right badge rounded bg-gradient-green px-2 shadow animate__animated animate__headShake animate__infinite animate__slow" style="font-size: 15px;">+<?php echo $resqry; ?>
                  </span>
                <?php } ?>
              </div>
            </a>
          </li>
          <li class="nav-item d-flex justify-content-between">
            <a href="./index.php?page=list_for_releasing" class="nav-link" title="List of documents still pending in your office">
              <!-- <i class="nav-icon fas fa-angle-right"></i> -->
              <div class="d-flex justify-content-between">
                <span>
                  <i class="nav-icon fas fa-regular fa-file-export text-orange"></i>
                  <span>
                    For Release
                  </span>
                </span>
                <?php
                $relqry = connectdb()->query("SELECT * FROM documents WHERE current_office_id = '{$userOfficeID}' AND recipient_office_id IS NULL")->num_rows;
                if ($relqry > 0) { ?>
                  <span class="rounded bg-gradient-orange px-2 text-white shadow animate__animated animate__headShake animate__infinite animate__slow" style="font-size: 15px;">+<?php echo $relqry; ?>
                  </span>
                <?php } ?>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=office_documents" class="nav-link" title="List of documents created by any registered user in your office.">
              <!-- <i class="nav-icon fas fa-angle-right nav-icon"></i> -->
              <i class="nav-icon fas fa-solid fa-school text-indigo"></i>
              <p>
                Office Documents
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=user_documents" class="nav-link" title="List of documents that you own.">
              <!-- <i class="nav-icon fas fa-angle-right nav-icon"></i> -->
              <!-- <i class="nav-icon fa-solid fa-laptop-file text-danger"></i> -->
              <i class="nav-icon fa-solid fa-briefcase text-danger"></i>
              <p>
                My Documents
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=received_-_released" class="nav-link" title="List of documents processed by your office.">
              <!-- <i class="nav-icon fas fa-angle-right nav-icon"></i> -->
              <i class="nav-icon fa-solid fa-arrow-right-arrow-left text-teal"></i>
              <p>
                Received / Released
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=tagged_as_endpoint" class="nav-link" title="List of documents tagged as endpoint by your office.">
              <!-- <i class="nav-icon fas fa-angle-right nav-icon"></i> -->
              <i class="nav-icon fas fa-solid fa-check-to-slot text-black"></i>
              <p>
                Tagged as Endpoint
              </p>
            </a>
          </li>

          <?php if ($user_authority_level >= 3) : ?>
            <li class="nav-item">
              <a href="#" class="nav-link bg-secondary">
                <i class="nav-icon fas fa-solid fa-folder text-yellow"></i>
                <p>Document Setting</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.php?page=document_classification" class="nav-link nav-new_news tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Document Classification</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.php?page=document_type" class="nav-link nav-new_news tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Document Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index.php?page=office_list" class="nav-link nav-new_news tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Office Source</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>

          <?php if ($user_authority_level == 5) : ?>
            <li class="nav-item">
              <a href="./index.php?page=user_list" class="nav-link nav-edit_user bg-info">
                <i class="nav-icon fas fa-users "></i>
                <p>
                  Users
                </p>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
    $(document).ready(function() {
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      if ($('.nav-link.nav-' + page)) {
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