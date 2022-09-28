<?php include('db_connect.php') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form id="manage_student" action="">
                <div class="row ">
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
                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="First Name" name="firstname" value="" placeholder="First Name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Middle Name" name="middlename" value="" placeholder="Middle Name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Last Name" name="lastname" value="" placeholder="Last Name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-arrow-up-right-dots fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Year Level" name="year_level" value="" placeholder="Year Level" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-id-card fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="SMC ID" name="smc_id" value="" placeholder="SMC ID" required>
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
                                                            <option value="CED">College of Education</option>
                                                            <option value="COC">College of Criminology</option>
                                                            <option value="CECS">College of Engineering and Computer Studies</option>
                                                            <option value="CAS"></option>
                                                            <option value="CHM"></option>
                                                            <option value=""></option>
                                                            <option value=""></option>
                                                            <option value=""></option>
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
                                                        <textarea rows="1" class="form-control form-control-primary" name="paddress" placeholder="Permanent Address" data-toggle="tooltip" data-placement="top" data-original-title="Permanent Address" required></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-screen fa-fw"></i></span>
                                                        </div>
                                                        <input type="tel" id="cphone" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Contact" name="contact" value="" placeholder="09XXXXXYYYY" pattern="[0-9]{11}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-envelope fa-fw"></i></span>
                                                        </div>
                                                        <input type="email" id="email" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Email" name="email" value="" placeholder="Email" required>
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
                                                        <input type="date" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Birth Date" id="date" name="birthdate" placeholder="Birthday" value="" required>
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
                                                            <option value="Male" selected>Male</option>
                                                            <option value="Female">Female</option>
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
                                                            <option value="Single" selected>Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widow">Widow</option>
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
                                                            <option value="Roman Catholic" selected>Roman Catholic</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Seventh Day Adventist">Seventh Day Adventist</option>
                                                            <option value="Baptist">Baptist</option>
                                                            <option value="Mormons">Mormons</option>
                                                            <option value="Iglesia ni Kristo">Iglesia ni Kristo</option>
                                                            <option value="Protestant">Protestant</option>
                                                            <option value="Born Again">Born Again</option>
                                                            <option value="Jehova`s Witness">Jehova`s Witness</option>
                                                            <option value="IFI">IFI</option>
                                                            <option value="Evangelism">Evangelism</option>
                                                            <option value="Christian Alliance">Christian Alliance</option>
                                                            <option value="Others">Others</option>
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
                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Mother's Name" name="mothersname" value="" placeholder="Mother's Name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-person fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Father's Name" name="fathersname" value="" placeholder="Father's Name" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-location-dot fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parent's Address" name="parents_address" value="" placeholder="Parent's Address" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-retro fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parents's Contact No." name="parents_contact" value="" placeholder="Parents's Contact No." required>
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
                                                            <input type="file" name="profile_pic" id="profile_pic" class="form-control form-control-sm " required value="">
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
                <!-- <input type="hidden" name="_token" value="ngkpbM3vRxXpmB74CxlxQ7sv2bNya6YQp4vKiRMq"> -->
            </form>
        </div>
    </div>
</div>
<script>
    function displayImg(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#manage_student').submit(function(e) {
        e.preventDefault()
        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')

        $.ajax({
            url: 'ajax.php?action=save_student',
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
                        location.replace('index.php?page=student_list')
                    }, 1500)
                }
            }
        })
    })
</script>