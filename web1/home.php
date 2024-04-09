<!-- Info boxes -->
<?php
include_once('db_connect.php');
connectdb();

$userID = $_SESSION['login_id'];
$userOfficeID = $_SESSION['login_office_id'];

$numrand = mt_rand(1000, 9999);
$numrand2 = mt_rand(1000, 9999);

// $conn = new mysqli('localhost', 'root', '', 'smc_dms') or die("Could not connect to mysql" . mysqli_error($con));
?>
<div class="container">
  <div class="row ">
    <div class="col-12 col-sm-6 col-md-6">
      <div class="card bg-light mb-3 ">
        <div class="card-header bg-gradient-primary">
          <h5>TRACK DOCUMENT</h5>
        </div>
        <div class="card-body">
          <div class="input-group mb-3">
            <input id="track_input" type="text" class="form-control" value="" placeholder="TRACKING NUMBER" aria-label="TRACKING NUMBER" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button id="track_btn" class="btn btn-outline-secondary bg-gradient-primary"><i class="fas fa-solid fa-location-crosshairs"></i> TRACK</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6">
      <div class="card bg-light mb-3">
        <div class="card-header bg-gradient-maroon">
          <h5>ADD DOCUMENT</h5>
        </div>
        <div class="card-body">
          <div class="input-group mb-3">
            <input type="text" class="form-control" value="<?php echo date("Y") ?>-<?php echo date("md") ?>-<?php echo $numrand ?>-<?php echo $numrand2 ?>" placeholder="TRACKING NUMBER" aria-label="TRACKING NUMBER" aria-describedby="basic-addon2" readonly>
            <div class="input-group-append">
              <a href="./index.php?page=new_document&trackingnumber=<?php echo date("Y") ?>-<?php echo date("md") ?>-<?php echo $numrand ?>-<?php echo $numrand2 ?>" class="btn btn-outline-secondary bg-gradient-maroon">
                <i class="fas fa-sharp fa-solid fa-plus"></i> ADD
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6">
      <div class="card bg-light mb-3">
        <div class="card-header bg-gradient-info">
          <h5>RECEIVE DOCUMENT</h5>
        </div>
        <div class="card-body">
          <div class="input-group mb-3">
            <input id="receive_tracking" type="text" class="form-control" value="" placeholder="TRACKING NUMBER" aria-label="TRACKING NUMBER" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button id="receive" class="btn btn-outline-secondary bg-gradient-info text-white" data-track="<?php echo $row['tracking_number'] ?>"><i class="fa-solid fa-file-import"></i> RECEIVE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6">
      <div class="card bg-light mb-3">
        <div class="card-header bg-gradient-orange text-white">
          <h5>RELEASE DOCUMENT</h5>
        </div>
        <div class="card-body">
          <div class="input-group mb-3">
            <input id="release_tracking" type="text" class="form-control" value="" placeholder="TRACKING NUMBER" aria-label="TRACKING NUMBER" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button id="release" class="btn btn-outline-secondary bg-gradient-orange text-white"><i class="fa-solid fa-file-export"></i> RELEASE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6">
      <div class="card bg-light mb-3">
        <div class="card-header bg-gradient-gray">
          <h5>TAG AS ENDPOINT</h5>
        </div>
        <div class="card-body">

          <div class="input-group mb-3">
            <input id="endpoint_tracking" type="text" class="form-control" value="" placeholder="TRACKING NUMBER" aria-label="TRACKING NUMBER" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button id="endpoint" class="btn btn-outline-secondary bg-gradient-gray" type="button"><i class="fas fa-solid fa-circle-stop"></i> ENDPOINT</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if($user_authority_level == 5) :?>
    <div class="col-12 col-sm-6 col-md-6">
      <div class="card bg-light mb-3">
        <div class="card-header bg-gradient-gray">
          <h5>BACKUP DB</h5>
        </div>
        <div class="card-body">
          <div class="input-group mb-3">
            <form action="" id="backupdb" class="w-100">
              <div class="form-group mb-0">
                <input type="hidden" value="backup" name="backup" class="form-control" id="" aria-describedby="" placeholder="">
              </div>
              <div class="col-lg-12 text-right justify-content-center d-flex">

                <button class="btn btn-outline-secondary bg-gradient-gray w-50 confirmbutton" form="backupdb" onclick="">Backup Database</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    
  </div>
</div>







<!-- ----------------------------------------------------------------------------------- -->
<div style='text-align: center;' class="container mt-4">
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=
       <?php echo date("Y") ?>-<?php echo date("md") ?>-<?php echo $numrand ?>-<?php echo $numrand2 ?>
       &code=Code128&translate-esc=on' />
</div>



<script>
  // $(function() {
  //   $('button.confirmbutton').confirmButton({
  //     confirm: "Are you really sure?"
  //   });
  // });

  // function keeptrack() {
  //   var action_src = "./index.php?page=document_details&trackingnumber=" + document.getElementsByName("keeptrack")[0].value;
  //   var your_form = document.getElementById('track_docs');
  //   your_form.action = action_src;
  //   location.replace('index.php?page=user_list')
  // }

  // function keeptrack() {
  //   var action_src = $("keeptrack").val();
  //   var your_form = $('track_docs').val();
  //   var urlLink = "./index.php?page=document_details&trackingnumber=";
  //   urlLink = urlLink + action_src;
  //   your_form.action = urlLink;
  //   location.replace('index.php?page=user_list')
  // }

  // =================================================================================================================

  $("#track_btn").click(function() {
    var userInput = $('#track_input').val().trim();
    location.replace("./index.php?page=document_details&trackingnumber=" + encodeURIComponent(userInput));
  });


  // =================================================================================================================

  $("#release").click(function() {
    // var userInput = document.getElementById('release_tracking').value.trim();
    var userInput = $('#release_tracking').val().trim();
    location.replace("./index.php?page=release_document&trackingnumber=" + encodeURIComponent(userInput));
  });




  // $('#track_docs').submit(function(e) {
  //   e.preventDefault();
  //   var action_src = "./index.php?page=document_details&trackingnumber=" + document.getElementsByName("keeptrack")[0].value;
  //   location.replace(action_src);
  // })




  // =========================================================================

  $("#receive").click(function() {
    var $track = $('#receive_tracking').val().trim();
    _confreceive("Are you sure you want to receive this document from your office?", function(confirmed) {
      if (confirmed) {
        $.ajax({
          url: 'ajax.php?action=receive_docs_home',
          method: 'POST',
          data: {
            tracking_number: $track
          },
          success: function(resp) {
            if (resp == 2) {
              message_toast("Document already in process", "error");
              // setTimeout(function() {
              //   location.reload()
              // }, 750)
            } else if (resp == 3) {
              message_toast("No document found", "error");
              // setTimeout(function() {
              //   location.reload()
              // }, 750)
            } else {
              alert_toast('Data successfully saved.', "success");
              alert(resp);
              // setTimeout(function() {
              //   location.replace('index.php?page=document_details&trackingnumber=' + resp)
              // }, 750)
            }
          }
        })
      }
    });
  });

  // =================================================================================================================

  $("#endpoint").click(function() {
    // var userInput = document.getElementById('release_tracking').value.trim();
    var userInput = $('#endpoint_tracking').val().trim();
    location.replace("./index.php?page=endpoint_document&trackingnumber=" + encodeURIComponent(userInput));
  });

  // =================================================================================================================================

  $('#backupdb').submit(function(e) {
    e.preventDefault()

    $('input').removeClass("border-danger")
    start_load()
    $('#msg').html('')
    $('#deletemodel').modal('show');

    var con = confirm("Click OK to continue?");
    if (con == true) {
      $.ajax({
        url: 'ajax.php?action=backupdb',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
          if (resp == 1) {
            alert_toast('Database successfully backed up.', "success");
            setTimeout(function() {
              location.replace('index.php?page=home')
            }, 1500)
          }
        }
      })
    }
  })
</script>