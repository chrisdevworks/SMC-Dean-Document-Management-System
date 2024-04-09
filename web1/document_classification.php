<?php 
include_once('db_connect.php');
connectdb();
?>
<style>
    table.dataTable td {
		font-size: 1vw;
	}
</style>
<div class="col-lg-12">
    <button type="button" class="btn btn-primary mr-3 my-3 shadow-sm" data-toggle="modal" data-target="#ClassificationModal"><i class="fa-regular fa-square-plus"></i> Add New</button>
    <div class="card card-outline card-primary" style="overflow:auto; white-space: nowrap">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-hover " id="list">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-center" style="width: 5%">#</th>
                            <th style="width: 50%">Classification Document Name</th>
                            <th style="width: 35%">Classification Document Code</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = connectdb()->query("SELECT * FROM document_classification");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><?php echo $row['document_classification_name'] ?></td>
                                <td><?php echo $row['document_classification_code'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary update_classification" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['document_classification_id'] ?>" data-id="<?php echo $row['document_classification_id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger delete_classification" data-id="<?php echo $row['document_classification_id'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            include 'edit_classification.php';
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade" id="ClassificationModal" tabindex="-1" role="dialog" aria-labelledby="classificationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="manage_classification">
                <div class="modal-header">
					<h4 class="modal-title text-primary" id="exampleModalLabel"><b>New Document Classification</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <div class="col-lg-12">
                        <input type="hidden" name="document_classification_id" id="classificationId" value="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Classification Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="classification_name" name="document_classification_name" value="<?php echo isset($classification_name) ? $classification_name : '' ?>" placeholder="Document Classification Name" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Classification Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="classification_code" name="document_classification_code" value="<?php echo isset($classification_code) ? $classification_code : '' ?>" placeholder="Document Classification Code" required>
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // $('#list').dataTable();
        $('#list').DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'rt>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        });
    })

    $(document).on("click", ".update_classification", function() {
        var classificationId = $(this).data('id');
        $('#classificationId').val(classificationId);
    });

    $('.delete_classification').click(function() {
        _conf("Are you sure to delete this document classification?", "delete_classification", [$(this).attr('data-id')])
    })

    function delete_classification($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_classification',
            method: 'POST',
            data: {
                id: $id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function() {
                        location.reload()
                        // location.replace('index.php?page=office_list')
                    }, 800)
                }
            }
        })
    }

    $('#manage_classification').submit(function(e) {
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