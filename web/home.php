<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if ($_SESSION['login_type'] == 'Dean') : ?>
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

<?php else : ?>

  <style>
    div.slide {
      display: none;
    }

    .md-tabs .nav-item .nav-link.active~.slide {
      border-bottom: 10px blue solid;
      display: block !important;
    }

    a {
      color: inherit;
      text-decoration: none;
      cursor: pointer;
    }

    [aria-expanded=true] {
      cursor: default;
    }

    .bg-head {
      /* background-image: url("assets/dist/img/ojt/blue.jpg"); */
      /* background-color: #cccccc;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover; */
    }

    .widget-user .widget-user-header {
      border-top-left-radius: 0.25rem;
      border-top-right-radius: 0.25rem;
      height: 100px;
      padding: 0;
      padding-bottom: 1rem;
      text-align: center;
    }

    .widget-user .widget-user-image {
      top: 15px;
    }

    .widget-user .widget-user-username {
      font-size: 35px;
      font-weight: 400;
    }

    .widget-user .widget-user-desc {
      font-size: 35px;
      font-weight: 300;
    }

    .nav-item:hover a {
      background-color: gray;
      color: white;
    }
  </style>


  <div class="pcoded-content">
    <div class="pcoded-inner-content">
      <div class="main-body">
        <div class="page-wrapper">
          <div class="page-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="card card-widget widget-user">
                  <div class="widget-user-header bg-gradient-primary">
                    <?php
                    $loginid = $_SESSION["login_id"];
                    $appointment = $conn->query("SELECT * FROM student WHERE id = 8");
                    while ($row = $appointment->fetch_assoc()) :
                    ?>
                      <div class="widget-user justify-content-around d-flex">
                        <h5 class="widget-user-username my-4"><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h5>
                        <h5 class="widget-user-desc my-4"><?php echo $row['smc_id'] ?></h5>
                      </div>
                  </div>
                  <div class="widget-user-image">
                    <!-- <div class="circle "> -->
                    <img style="width:150px;height:150px;" class="elevation-3 img-circle text-center card-img-top this-image img-fluid img-thumbnail profile-user-img" src="<?php echo $row['profile_pic'] ?>" alt="..." />
                    <!-- </div> -->
                    <!-- <img class="img-circle elevation-2" src="<?php echo $row['nupload'] ?>" alt="User Avatar"> -->
                  <?php endwhile; ?>
                  </div>

                  <div class="card-footer p-0">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Documents <span class="float-right badge bg-primary"><i class="fa-regular fa-folder-open fa-lg m-1"></i></span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Prospectus <span class="float-right badge bg-info"><i class="fa-solid fa-users-rectangle fa-lg m-1"></i></span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Class Schedule <span class="float-right badge bg-success"><i class="fa-solid fa-chalkboard-user fa-lg m-1"></i></span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          Request <span class="float-right badge bg-danger"><i class="fa-solid fa-file-pen fa-lg m-1"></i></span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <!-- PERSONAL -->
                <div class="tab-content shadow">
                  <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                    <div class="card">
                      <div class="card-header border-0 d-flex">
                        <!-- <h5 class="card-header-text">About Me</h5> -->
                        <button id="edit-btn" type="button" class="btn btn-sm btn-primary ml-auto">
                          <i class="fa-solid fa-pen-to-square"></i> Edit
                        </button>
                      </div>
                      <div class="card-block">
                        <div class="view-info">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="general-info">
                                <?php
                                $loginid = $_SESSION["login_id"];
                                $appointment = $conn->query("SELECT * FROM student WHERE id = '8'");
                                while ($row = $appointment->fetch_assoc()) :
                                ?>
                                  <div class="row">
                                    <div class="col-lg-12 col-xl-6">
                                      <div class="table-responsive">
                                        <table class="table m-0">
                                          <tbody>
                                            <tr>
                                              <th scope="row">Full Name</th>
                                              <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Gender</th>
                                              <td><?php echo $row['gender'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">SMC - ID</th>
                                              <td><?php echo $row['smc_id'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Year Level</th>
                                              <td><?php echo $row['year_level'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Address</th>
                                              <td><?php echo $row['paddress'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Email</th>
                                              <td><?php echo $row['email'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Mother's Name</th>
                                              <td><?php echo $row['mothersname'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Father's Name</th>
                                              <td><?php echo $row['fathersname'] ?></td>
                                            </tr>

                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                      <div class="table-responsive">
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <th scope="row">Birth Date</th>
                                              <td><?php echo $row['birthdate'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Civil Status</th>
                                              <td><?php echo $row['civilstatus'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Department</th>
                                              <td><?php echo $row['department'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Course</th>
                                              <td><?php echo $row['course'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Religion</th>
                                              <td><?php echo $row['religion'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Contact No.</th>
                                              <td><?php echo $row['contact'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Parents Address</th>
                                              <td><?php echo $row['parents_address'] ?></td>
                                            </tr>
                                            <tr>
                                              <th scope="row">Parents Contact No.</th>
                                              <td><?php echo $row['parents_contact'] ?></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                <?php endwhile; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <form id="personalCRUD" action="">
                          <div class="edit-info" style="display: none;">
                            <?php
                            $loginid = $_SESSION["login_id"];
                            $appointment = $conn->query("SELECT * FROM student WHERE id = '8'");
                            while ($row = $appointment->fetch_assoc()) :
                            ?>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="general-info">
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                  </div>
                                                  <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="First Name" name="fname" value="<?php echo $row['firstname'] ?>" placeholder="First Name" required>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                  </div>
                                                  <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Middle Name" name="mname" value="<?php echo $row['middlename'] ?>" placeholder="Middle Name" required>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                  </div>
                                                  <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Last Name" name="lname" value="<?php echo $row['lastname'] ?>" placeholder="Last Name" required>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-venus-mars fa-fw"></i></span>
                                                  </div>
                                                  <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Gender" name="gender">
                                                    <option value="Male" <?php if ($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                                                    <option value="Female" <?php if ($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                                                  </select>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-id-card fa-fw"></i></i></span>
                                                  </div>
                                                  <input type="text" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="SMC ID" name="smcid" value="<?php echo $row['smc_id'] ?>" placeholder="SMC ID">
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-location-dot fa-fw"></i></span>
                                                  </div>
                                                  <textarea rows="1" class="form-control form-control-primary" name="paddress" placeholder="Permanent Address" data-toggle="tooltip" data-placement="top" data-original-title="Permanent Address" required=""><?php echo $row['paddress'] ?></textarea>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-person-dress fa-fw"></i></span>
                                                  </div>
                                                  <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Mother's Name" name="mother" value="<?php echo $row['mothersname'] ?>" placeholder="Mother's Name" required>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-person fa-fw"></i></span>
                                                  </div>
                                                  <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Father's Name" name="father" value="<?php echo $row['fathersname'] ?>" placeholder="Father's Name" required>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                              				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                                      <div class="col-lg-6">
                                        <table class="table">
                                          <tbody>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-cake-candles fa-fw"></i></span>
                                                  </div>
                                                  <input type="date" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Birth Date" id="date" name="bday" placeholder="Birthday" value="<?php echo $row['birthdate'] ?>">
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-hand-holding-heart fa-fw"></i></span>
                                                  </div>
                                                  <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Civil Status" name="civilstat">
                                                    <option value="Single" <?php if ($row['civilstatus'] == "Single") echo "selected"; ?>>Single</option>
                                                    <option value="Married" <?php if ($row['civilstatus'] == "Married") echo "selected"; ?>>Married</option>
                                                    <option value="Widow" <?php if ($row['civilstatus'] == "Widow") echo "selected"; ?>>Widow</option>
                                                  </select>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-place-of-worship fa-fw"></i></span>
                                                  </div>
                                                  <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Religion" name="religion">
                                                    <option value="Roman Catholic" <?php if ($row['religion'] == "Roman Catholic") echo "selected"; ?>>Roman Catholic</option>
                                                    <option value="Islam" <?php if ($row['religion'] == "Islam") echo "selected"; ?>>Islam</option>
                                                    <option value="Seventh Day Adventist" <?php if ($row['civilstatus'] == "Seventh Day Adventist") echo "selected"; ?>>Seventh Day Adventist</option>
                                                    <option value="Baptist" <?php if ($row['religion'] == "Baptist") echo "selected"; ?>>Baptist</option>
                                                    <option value="Mormons" <?php if ($row['religion'] == "Mormons") echo "selected"; ?>>Mormons</option>
                                                    <option value="Iglesia ni Kristo" <?php if ($row['religion'] == "Iglesia ni Kristo") echo "selected"; ?>>Iglesia ni Kristo</option>
                                                    <option value="Protestant" <?php if ($row['religion'] == "Protestant") echo "selected"; ?>>Protestant</option>
                                                    <option value="Born Again" <?php if ($row['religion'] == "Born Again") echo "selected"; ?>>Born Again</option>
                                                    <option value="Jehova`s Witness" <?php if ($row['religion'] == "Jehova`s Witness") echo "selected"; ?>>Jehova`s Witness</option>
                                                    <option value="IFI" <?php if ($row['religion'] == "IFI") echo "selected"; ?>>IFI</option>
                                                    <option value="Evangelism" <?php if ($row['religion'] == "Evangelism") echo "selected"; ?>>Evangelism</option>
                                                    <option value="Christian Alliance" <?php if ($row['religion'] == "Christian Alliance") echo "selected"; ?>>Christian Alliance</option>
                                                    <option value="Others" <?php if ($row['religion'] == "Others") echo "selected"; ?>>Others</option>
                                                  </select>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-screen fa-fw"></i></span>
                                                  </div>
                                                  <input type="tel" id="cphone" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Contact" name="cphone" value="<?php echo $row['contact'] ?>" placeholder="09XXXXXYYYY" pattern="[0-9]{11}" required>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-location-dot fa-fw"></i></span>
                                                  </div>
                                                  <textarea rows="1" class="form-control form-control-primary" name="pa_addr" placeholder="Parent's Address" data-toggle="tooltip" data-placement="top" data-original-title="Parent's Address" required=""><?php echo $row['parents_address'] ?></textarea>

                                                  <!-- <input type="text" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Parent's Address" name="pa_addr" value="<?php echo $row['parents_address'] ?>" placeholder="Parent's Address" required> -->
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-retro fa-fw"></i></span>
                                                  </div>
                                                  <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parent's Contact No." name="pa_cont" value="<?php echo $row['parents_contact'] ?>" placeholder="Parents's Contact No." required>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary"><i class="fa-sharp fa-solid fa-file-image fa-fw"></i></span>
                                                  </div>
                                                  <div class="custom-file">
                                                    <!-- <input type="file" class="custom-file-input" id="exampleInputFile"> -->
                                                    <input form="personalCRUD" type="file" name="profile_pic" id="profile_pic" class="form-control form-control-sm " required value="<?php echo isset($profile_pic) ? $profile_pic : '' ?>">
                                                    <label class="custom-file-label" for="profile_pic">Upload Profile Picture</label>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="col-lg-12 text-right justify-content-center d-flex mb-4">
                                      <button class="btn btn-primary mr-2">Save</button>
                                      <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=home'">Cancel</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php endwhile; ?>
                          </div>
                          <!-- <input type="hidden" name="_token" value="ngkpbM3vRxXpmB74CxlxQ7sv2bNya6YQp4vKiRMq"> -->
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- END -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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