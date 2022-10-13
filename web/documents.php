<?php
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="" id="manage_documents">
                <?php if ($_SESSION['login_type'] == 'Dean') : ?>
                    <input type="hidden" name="sid" value="<?php echo $_GET['id'] ?>">
                    <input type="hidden" name="fid" value="NULL">
                <?php elseif ($_SESSION['login_type'] == 'Faculty') : ?>
                    <input type="hidden" name="sid" value="NULL">
                    <input type="hidden" name="fid" value="<?php echo $_GET['id'] ?>">
                <?php else : ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <b class="text-muted">Document</b>
                        <?php if ($_SESSION['login_type'] == 'Dean') : ?>
                            <div class="input-group pb-3 pt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-regular fa-file-lines fa-fw"></i></span>
                                </div>
                                <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Title" name="title">
                                    <option value="Assessment">Assessment Form</option>
                                    <option value="Prospectus">Prospectus</option>
                                    <option value="Withdrawal">Withdrawal Slip</option>
                                    <option value="Shift">Shift Slip</option>
                                </select>
                            </div>
                        <?php elseif ($_SESSION['login_type'] == 'Faculty') : ?>
                            <div class="input-group pb-3 pt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-regular fa-file-lines fa-fw"></i></span>
                                </div>
                                <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Document Name" name="title" value="" placeholder="Document Name" required>
                            </div>
                        <?php else : ?>
                        <?php endif; ?>
                        <b class="text-muted">Document Status</b>
                        <div class="input-group pb-3 pt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="fas fa-solid fa-check-double fa-fw"></i></span>
                            </div>
                            <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Docs_status" name="docs_status">
                                <option value="Incomplete">Incomplete</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <b class="text-muted">Upload File</b>
                        <div class="input-group pb-3 pt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="fas fa-solid fa-upload fa-fw"></i></span>
                            </div>
                            <div class="custom-file">
                                <!-- <input type="file" class="custom-file-input" id="exampleInputFile"> -->
                                <input type="file" name="uploaded_files" id="uploaded_files" class="form-control form-control-sm " value="" required>
                                <label class="custom-file-label" for="uploaded_files">Choose File</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2">Save</button>
                    <a class="btn btn-secondary" href="index.php?page=student&id=<?php echo $_GET['id'] ?>">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#manage_documents').submit(function(e) {
        e.preventDefault()
        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')

        $.ajax({
            url: 'ajax.php?action=save_documents',
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
                        // location.reload()
                        history.back()
                        // location.replace('index.php?page=student&id=' + <?php echo $_GET['id'] ?>)
                    }, 750)
                }
            }
        })
    })
</script>