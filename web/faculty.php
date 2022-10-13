<?php include('db_connect.php') ?>

<?php if ($_SESSION['login_type'] == 'Faculty') : ?>

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

        .nav-stud a:hover {
            background-color: #e9ecef;
            color: black;
        }
    </style>


    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-widget widget-user collapsed-card">
                                    <div class="widget-user-header bg-gradient-primary">
                                        <?php
                                        $loginid = $_SESSION["login_id"];
                                        $appointment = $conn->query("SELECT * FROM faculty WHERE userid = " . $loginid);
                                        while ($row = $appointment->fetch_assoc()) :
                                        ?>
                                            <div class="widget-user justify-content-around d-flex">
                                                <h5 class="widget-user-username my-4"><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></h5>
                                                <h5 class="widget-user-desc my-4"><?php echo $row['smc_id'] ?></h5>
                                            </div>
                                    </div>
                                    <div class="widget-user-image">
                                        <!-- <div class="circle "> -->
                                        <img style="width:150px;height:150px;" class="elevation-3 img-circle text-center card-img-top this-image2 img-fluid img-thumbnail profile-user-img" src="<?php echo $row['profile_pic'] ?>" alt="..." />
                                        <!-- </div> -->
                                        <!-- <img class="img-circle elevation-2" src="<?php echo $row['nupload'] ?>" alt="User Avatar"> -->
                                    </div>
                                    <div class="card-header">
                                        <!-- <h3 class="card-title">Documents</h3> -->
                                        <a class="btn btn-primary btn-sm" href="./index.php?page=documents&id=<?php echo $row['id'] ?>"><i class="fas fa-upload"></i>Upload Document</a>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool btn-secondary btn-sm" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <div class="card-body p-0" style="display: none;">
                                        <div class="table-responsive">
                                            <table class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 1%">#</th>
                                                        <th style="width: 40%">Document</th>
                                                        <th style="width: 20%">Date Uploaded</th>
                                                        <th style="width: 8%">Status</th>
                                                        <th style="width: 20%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    // $type = array('', "Admin", "Staff", "Student");
                                                    $qry = $conn->query("SELECT * FROM documents where faculty_id = (SELECT id FROM faculty WHERE userid =  '" . $loginid . "') order by id asc");
                                                    while ($row = $qry->fetch_assoc()) :
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $row['title'] ?></td>
                                                            <td class="document-state"><?php echo $row['date_uploaded'] ?></td>
                                                            <td class="document-state">
                                                                <?php if ($row['docs_status'] == 'Completed') : ?>
                                                                    <span class="badge badge-success"><?php echo $row['docs_status'] ?></span>
                                                                <?php else : ?>
                                                                    <span class="badge badge-danger"><?php echo $row['docs_status'] ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="document-actions text-right">
                                                                <a class="btn btn-primary btn-sm" target="_blank" href="<?php echo $row['uploaded_files'] ?>"><i class="fas fa-upload"></i> View</a>
                                                                <!-- <a class="btn btn-info btn-sm" href="./index.php?page=edit_documents&did=<?php echo $row['id'] ?>"><i class="fas fa-folder"></i> Edit</a> -->
                                                                <!-- <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Delete</a> -->
                                                                <button type="button" class="btn btn-danger btn-sm delete_documents" data-id="<?php echo $row['id'] ?>">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
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
                                                <div class="view-info2">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="general-info">
                                                                <?php
                                                                $loginid = $_SESSION["login_id"];
                                                                $appointment = $conn->query("SELECT * FROM faculty WHERE userid = " . $loginid);
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
                                                                                            <th scope="row">Department</th>
                                                                                            <td><?php echo $row['department'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Course</th>
                                                                                            <td><?php echo $row['course'] ?></td>
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
                                                                                            <th scope="row">Contact No.</th>
                                                                                            <td><?php echo $row['contact'] ?></td>
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
                                                                                            <th scope="row">Religion</th>
                                                                                            <td><?php echo $row['religion'] ?></td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <th scope="row">Mother's Name</th>
                                                                                            <td><?php echo $row['mothersname'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">Father's Name</th>
                                                                                            <td><?php echo $row['fathersname'] ?></td>
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
                                                <form id="facultyCRUD" action="">
                                                    <div class="edit-info2" style="display: none;">
                                                        <?php
                                                        $loginid = $_SESSION["login_id"];
                                                        $appointment = $conn->query("SELECT * FROM faculty WHERE userid = " . $loginid);
                                                        while ($row = $appointment->fetch_assoc()) :
                                                        ?>
                                                            <input type="hidden" name="sid" value="<?php echo $row['id'] ?>">
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
                                                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="First Name" name="firstname" value="<?php echo $row['firstname'] ?>" placeholder="First Name" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Middle Name" name="middlename" value="<?php echo $row['middlename'] ?>" placeholder="Middle Name" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Last Name" name="lastname" value="<?php echo $row['lastname'] ?>" placeholder="Last Name" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-id-card fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="SMC ID" name="smc_id" value="<?php echo $row['smc_id'] ?>" placeholder="SMC ID" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-graduation-cap fa-fw"></i></span>
                                                                                        </div>
                                                                                        <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Course" name="course" required>
                                                                                            <option value="BACHELOR OF ARTS IN ENGLISH LANGUAGE">BACHELOR OF ARTS IN ENGLISH LANGUAGE (BAEL)</option>
                                                                                            <option value="BACHELOR OF ARTS IN PHILOSOPHY">BACHELOR OF ARTS IN PHILOSOPHY</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN PSYCHOLOGY">BACHELOR OF SCIENCE IN PSYCHOLOGY</option>
                                                                                            <option value="BACHELOR OF EARLY CHILDHOOD EDUCATION">BACHELOR OF EARLY CHILDHOOD EDUCATION (BECEd)</option>
                                                                                            <option value="BACHELOR OF ELEMENTARY EDUCATION">BACHELOR OF ELEMENTARY EDUCATION (BEEd)</option>
                                                                                            <option value="BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH">BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH (BSEd - ENGLISH)</option>
                                                                                            <option value="BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS">BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS (BSEd-MATH)</option>
                                                                                            <option value="BACHELOR OF SPECIAL NEEDS EDUCATION">BACHELOR OF SPECIAL NEEDS EDUCATION (BSNEd)(Generalist)</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN ACCOUNTANCY">BACHELOR OF SCIENCE IN ACCOUNTANCY</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT">BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE MANAGEMENT">BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE MANAGEMENT</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT">BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN OPERATIONS MANAGEMENT">BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN OPERATIONS MANAGEMENT</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN CIVIL ENGINEERING">BACHELOR OF SCIENCE IN CIVIL ENGINEERING (BSCE)</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN COMPUTER ENGINEERING">BACHELOR OF SCIENCE IN COMPUTER ENGINEERING (BSCpE)</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN COMPUTER SCIENCE">BACHELOR OF SCIENCE IN COMPUTER SCIENCE (BSCS)</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN CRIMINOLOGY">BACHELOR OF SCIENCE IN CRIMINOLOGY</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING">BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING (BSECE)</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN INFORMATION SYSTEMS">BACHELOR OF SCIENCE IN INFORMATION SYSTEMS (BSIS)</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY (BSIT)</option>
                                                                                            <option value="BACHELOR OF SCIENCE IN NURSING">BACHELOR OF SCIENCE IN NURSING</option>
                                                                                            <option value="MASTER OF ARTS IN EDUCATION MAJOR IN EDUCATIONAL MANAGEMENT">MASTER OF ARTS IN EDUCATION MAJOR IN EDUCATIONAL MANAGEMENT</option>
                                                                                            <option value="MASTER OF ARTS IN EDUCATION MAJOR IN ENGLISH LANGUAGE TEACHING">MASTER OF ARTS IN EDUCATION MAJOR IN ENGLISH LANGUAGE TEACHING</option>
                                                                                            <option value="MASTER OF ARTS IN EDUCATION MAJOR IN FILIPINO">MASTER OF ARTS IN EDUCATION MAJOR IN FILIPINO</option>
                                                                                            <option value="MASTER OF ARTS IN EDUCATION MAJOR IN GUIDANCE & COUNSELING">MASTER OF ARTS IN EDUCATION MAJOR IN GUIDANCE & COUNSELING</option>
                                                                                            <option value="MASTER IN BUSINESS ADMINISTRATION (MBA)">MASTER IN BUSINESS ADMINISTRATION (MBA)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-school-flag fa-fw"></i></span>
                                                                                        </div>
                                                                                        <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Department" name="department" required>
                                                                                            <option value="CAS">College of Arts and Sciences</option>
                                                                                            <option value="CED">College of Education</option>
                                                                                            <option value="CECS">College of Engineering & Computer Studies</option>
                                                                                            <option value="CBAA">College of Business Administration and Accountancy</option>
                                                                                            <option value="CHM">College of Hospitality Management</option>
                                                                                            <option value="CON">College of Nursing</option>
                                                                                            <option value="COC">College of Criminology</option>
                                                                                            <option value="GS">Graduate School</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-location-dot fa-fw"></i></span>
                                                                                        </div>
                                                                                        <textarea rows="1" class="form-control form-control-primary" name="paddress" placeholder="Permanent Address" data-toggle="tooltip" data-placement="top" data-original-title="Permanent Address" required><?php echo $row['paddress'] ?></textarea>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-screen fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="tel" id="cphone" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Contact" name="contact" value="<?php echo $row['contact'] ?>" placeholder="09XXXXXYYYY" pattern="[0-9]{11}" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-envelope fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="email" id="email" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Email" name="email" value="<?php echo $row['email'] ?>" placeholder="Email" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-cake-candles fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="date" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Birth Date" id="date" name="birthdate" placeholder="Birthday" value="<?php echo $row['birthdate'] ?>" required>
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
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-hand-holding-heart fa-fw"></i></span>
                                                                                        </div>
                                                                                        <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Civil Status" name="civilstatus">
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
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-person-dress fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Mother's Name" name="mothersname" value="<?php echo $row['mothersname'] ?>" placeholder="Mother's Name" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-person fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Father's Name" name="fathersname" value="<?php echo $row['fathersname'] ?>" placeholder="Father's Name" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-location-dot fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parent's Address" name="parents_address" value="<?php echo $row['parents_address'] ?>" placeholder="Parent's Address" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-retro fa-fw"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parents's Contact No." name="parents_contact" value="<?php echo $row['parents_contact'] ?>" placeholder="Parents's Contact No." required>
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
                                                                                            <input type="file" name="profile_pic" id="profile_pic" class="form-control form-control-sm " value="">
                                                                                            <label class="custom-file-label" for="profile_pic">Upload Profile Picture <i class="fas fa-upload"></i></label>
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

    <script>
        $(document).ready(function() {
            $("#edit-btn").click(function() {
                $(".edit-info2").toggle();
                $(".view-info2").toggle();
                $(".this-image2").toggle();
                $(".img-upload").toggle();
            });
        });

        $('#facultyCRUD').submit(function(e) {
            e.preventDefault()
            $('input').removeClass("border-danger")
            start_load()
            $('#msg').html('')
            $.ajax({
                url: 'ajax.php?action=save_faculty',
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
                            location['reload']()
                        }, 1500)
                    }
                }
            })
        })

        $('.delete_documents').click(function() {
            _conf("Are you sure you want to delete this document?", "delete_documents", [$(this).attr('data-id')])
        })

        function delete_documents($id) {
            start_load()
            $.ajax({
                url: 'ajax.php?action=delete_documents',
                method: 'POST',
                data: {
                    id: $id
                },
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Data successfully deleted", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 1500)

                    }
                }
            })
        }

        
    </script>
<?php else : ?>
    <meta http-equiv="Refresh" content="0; url='index.php'" />
<?php endif; ?>