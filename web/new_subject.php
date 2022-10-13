<?php
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="" id="new_subject">
                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="row">
                    <div class="col-md-12">
                        <b class="text-muted">Subject Info</b>
                        <div class="form-group">
                            <label class="control-label">Course Code</label>
                            <input type="text" class="form-control form-control-sm" name="course_code">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control form-control-sm" name="title">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Total Units</label>
                            <input type="number" class="form-control form-control-sm" name="total_units" min="1" max="5" value="1">

                        </div>
                        <div class="form-group">
                            <label class="control-label">Lecture Hours/Week</label>
                            <input type="number" class="form-control form-control-sm" name="lecture" min="1" max="5" value="1">

                        </div>
                        <div class="form-group">
                            <label class="control-label">Laboratory hours/Week</label>
                            <input type="number" class="form-control form-control-sm" name="laboratory" min="1" max="5" value="1">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Total Hours/Week</label>
                            <input type="number" class="form-control form-control-sm" name="total_hrs" min="1" max="5" value="1">

                        </div>
                        <div class="form-group">
                            <label class="control-label">Pre-requisite</label>
                            <input type="text" class="form-control form-control-sm" name="pre_requisites" value="none">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="school_year">School Year</label>
                            <input type="number" class="form-control form-control-sm" name="school_year" step="1" min="2022" max="2100" value="2022">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Semester</label>
                            <input type="number" class="form-control form-control-sm" name="semester" min="1" max="2" value="1">
                        </div>
                        <div class="form-group">
                            <label for="department" class="control-label">Department</label>
                            <select class="form-control form-control-primary form-control-sm" data-toggle="tooltip" data-placement="top" data-original-title="Department" name="department" required>
                                <option value="CECS">College of Engineering and Computer Studies</option>
                                <option value="CED">College of Education</option>
                                <option value="COC">College of Criminology</option>
                                <option value="CAS">College of Social Studies</option>
                                <option value="CHRM">College of Home and Restaurant Management</option>
                                <option value="CON">College of Nursing</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2">Save</button>
            		<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=subject_list'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#new_subject').submit(function(e) {
        e.preventDefault()
        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')
        $.ajax({
            url: 'ajax.php?action=save_subject',
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
                        location.replace('index.php?page=subject_list')
                    }, 1500)
                }
            }
        })
    })
</script>