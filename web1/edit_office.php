<div class="modal fade" id="update_modal<?php echo $row['office_id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="" action="" id="update_office">
                <div class="modal-header">
					<h4 class="modal-title text-primary" id="exampleModalLabel"><b>Update Office Info</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="office_id" name="id" value="<?php echo $row['office_id'] ?>" placeholder="Office id" required>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Office Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="office_name" name="office_name" value="<?php echo $row['office_name'] ?>" placeholder="Office Name" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Office Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="office_code" name="office_code" value="<?php echo $row['office_code'] ?>" placeholder="Office Code" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- -------------------------------------------- -->
                </div>
                <div class="modal-footer">
                    <div class="col-lg-12 text-right d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary mr-2">Save</button>
                        <!-- <button class="btn btn-primary mr-2" name="save" type="button" id="button" value="Submit">Save</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#update_modal<?php echo $row['office_id'] ?> .modal-content form').submit(function(e) {
        e.preventDefault()
        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')

        $.ajax({
            url: 'ajax.php?action=save_office',
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
                        location.replace('index.php?page=office_list')
                    }, 800)
                }
            }
        })
    })

</script>