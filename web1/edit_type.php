<div class="modal fade" id="update_modal<?php echo $row['document_id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="" action="" id="update_type">
                <div class="modal-header">
                    <h4 class="modal-title text-primary" id="exampleModalLabel"><b>Update Document Info</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <input type="hidden" name="document_id" id="userId" value="<?php echo isset($id) ? $id : '' ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <b class="text-muted border-bottom border-gray ">Document Info</b>
                            <div class="form-group p-2 m-0">
                                <label class="control-label">Document Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-file fa-fw"></i></span>
                                    </div>
                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_name" name="document_name" value="<?php echo $row['document_name'] ?>" placeholder="Document Type Name" required>
                                </div>
                            </div>

                            <div class="form-group p-2 m-0">
                                <label class="control-label">Document Code</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-file fa-fw"></i></span>
                                    </div>
                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_code" name="document_code" value="<?php echo $row['document_code'] ?>" placeholder="Document Type Code" required>
                                </div>
                            </div>

                            <div class="form-group p-2 m-0">
                                <label for="" class="control-label">Document Classification</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-users-gear fa-fw"></i></span>
                                    </div>
                                    <select id="" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="document_classification" name="document_classification_id" required>
                                        <option value="" disabled selected hidden>Please Choose...</option>
                                        <?php
                                        $class_id = $row['document_classification_id'];
                                        
                                        $newqry = "SELECT * FROM document_classification";
                                        $resultInner = connectdb()->query($newqry);
                                        if ($resultInner->num_rows > 0) {
                                            while($rowInner = $resultInner->fetch_assoc()) :
                                                echo ' <option value="' . $rowInner["document_classification_id"] . '"  ' . ($rowInner["document_classification_id"] == $class_id ? "selected" : "") .'>' . $rowInner["document_classification_name"] . '</option> ';
                                            endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-lg-12 text-right d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary mr-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#update_modal<?php echo $row['document_id'] ?> .modal-content form').submit(function(e) {
        e.preventDefault()
        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')

        $.ajax({
            url: 'ajax.php?action=save_type',
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
                        location.replace('index.php?page=document_type')
                    }, 800)
                }
            }
        })
    })
</script>