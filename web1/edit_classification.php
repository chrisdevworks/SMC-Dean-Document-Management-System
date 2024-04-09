<div class="modal fade" id="update_modal<?php echo $row['document_classification_id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="" action="" id="update_classification">
                <div class="modal-header">
					<h4 class="modal-title text-primary" id="exampleModalLabel"><b>Update Document Classification Info</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_classification_id" name="id" value="<?php echo $row['document_classification_id'] ?>" placeholder="document classification id" required>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Classification Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_classification_name" name="document_classification_name" value="<?php echo $row['document_classification_name'] ?>" placeholder="Document Classification Name" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Classification Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_classification_code" name="document_classification_code" value="<?php echo $row['document_classification_code'] ?>" placeholder="Document Classification Code" required>
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
    $('#update_modal<?php echo $row['document_classification_id'] ?> .modal-content form').submit(function(e) {
        e.preventDefault()
        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')

        $.ajax({
            url: 'ajax.php?action=save_classification',
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
                        location.replace('index.php?page=document_classification')
                    }, 800)
                }
            }
        })
    })

</script>