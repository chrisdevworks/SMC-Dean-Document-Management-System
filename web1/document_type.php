<?php 
include_once('db_connect.php');
connectdb();
$data = array();
$qry = connectdb()->query("SELECT * FROM document_classification");
while ($row = $qry->fetch_assoc()) :
    $data[] = $row;
endwhile;
?>
<style>
    table.dataTable td {
        font-size: 1vw;
    }
</style>
<div class="col-lg-12">
    <button type="button" class="btn btn-primary mr-3 my-3 shadow-sm" data-toggle="modal" data-target="#TypeModal"><i class="fa-regular fa-square-plus"></i> Add New</button>
    <div class="card card-outline card-primary" style="overflow:auto; white-space: nowrap">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-hover " id="list">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-center" style="width: 5%">#</th>
                            <th style="width: 40%">Document Type Name</th>
                            <th style="width: 20%">Document Type Code</th>
                            <th style="width: 40%">Document Classification</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = connectdb()->query("SELECT * FROM document_type LEFT JOIN document_classification ON document_type.document_classification_id = document_classification.document_classification_id");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><?php echo $row['document_name'] ?></td>
                                <td><?php echo $row['document_code'] ?></td>
                                <td><?php echo $row['document_classification_name'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary update_type" name="update_type" data-toggle="modal" type="submit" data-target="#update_modal<?php echo $row['document_type_id'] ?>" data-id="<?php echo $row['document_type_id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger delete_type" data-id="<?php echo $row['document_type_id'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            include 'edit_type.php';
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade" id="TypeModal" tabindex="-1" role="dialog" aria-labelledby="typeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="manage_type">
                <div class="modal-header">
                    <h4 class="modal-title text-primary" id="exampleModalLabel"><b>New Document Type</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <div class="col-lg-12">
                        <input type="hidden" name="document_type_id" id="typeId" value="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Type</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_name" name="document_name" value="<?php echo isset($trackingnumber) ? $document_name : '' ?>" placeholder="Document Type Name" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_code" name="document_code" value="<?php echo isset($trackingnumber) ? $document_code : '' ?>" placeholder="Document Type Code" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label for="document_classification" class="control-label">Document Classification</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <select id="document_classification" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="document_classification" name="document_classification_id" required>
                                            <option value="" disabled selected hidden>Please Choose...</option>
                                            <?php
                                                foreach ($data as $items):
                                                echo ' <option value="' . $items["document_classification_id"] . '">' . $items["document_classification_name"] . '</option> ';
                                                endforeach;
                                            ?>
                                        </select>
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

    $(document).on("click", ".update_type", function() {
        var classificationId = $(this).data('id');
        $('#typeId').val(classificationId);
    });

    $('.delete_type').click(function() {
        _conf("Are you sure to delete this document classification?", "delete_type", [$(this).attr('data-id')])
    })

    function delete_type($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_type',
            method: 'POST',
            data: {
                id: $id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function() {
                        location.reload()
                    }, 800)
                }
            }
        })
    }

    $('#manage_type').submit(function(e) {
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