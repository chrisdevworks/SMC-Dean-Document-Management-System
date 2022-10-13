<!-- Info boxes -->
<?php if ($_SESSION['login_type'] == 'Admin') : ?>
  <?php
  $conn = new mysqli('localhost', 'root', '', 'document_management_db') or die("Could not connect to mysql" . mysqli_error($con));
  ?>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>

<?php elseif ($_SESSION['login_type'] == 'Dean') :  ?>
  <?php
  $conn = new mysqli('localhost', 'root', '', 'document_management_db') or die("Could not connect to mysql" . mysqli_error($con));
  ?>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>

<?php elseif ($_SESSION['login_type'] == 'Faculty') :  ?>
  <?php
  $conn = new mysqli('localhost', 'root', '', 'document_management_db') or die("Could not connect to mysql" . mysqli_error($con));

  $loginid = $_SESSION["login_id"];
  $check = $conn->query("SELECT * FROM faculty WHERE userid = " . $loginid);

  if (mysqli_num_rows($check) > 0) {
    include('faculty.php');
  } else {
    include('new_faculty.php');
  }
  ?>

<?php else : ?>


<?php endif; ?>

<script>
  $('#personalCRUD').submit(function(e) {
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $('#msg').html('')
    $.ajax({
      url: 'ajax.php?action=save_personal',
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(resp) {
        if (resp == 1) {
          alert_toast('Data successfully saved.', "success");
          setTimeout(function() {
            location.replace('index.php?page=home')
          }, 1500)
        }
      }
    })
  })

  $(document).ready(function() {
    $("#edit-btn").click(function() {
      $(".edit-info").toggle();
      $(".view-info").toggle();
      $(".this-image").toggle();
      $(".img-upload").toggle();
    });


    $("#edit-btn-educ").click(function() {
      $(".view-info-educ").toggle();
      $(".edit-info-educ").toggle();
    });

    $("#edit-btn-fam").click(function() {
      $(".edit-info-fam").toggle();
      $(".view-info-fam").toggle();
    });

  });
</script>