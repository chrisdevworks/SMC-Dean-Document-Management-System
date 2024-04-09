<?php 
include_once('db_connect.php');
connectdb();

$userOfficeID = $_SESSION['login_office_id'];

$data = array();
$qry = connectdb()->query("SELECT * FROM document_type");
while ($row = $qry->fetch_assoc()) :
    $data[] = $row;
endwhile;

$office = array();
$qry = connectdb()->query("SELECT * FROM office");
while ($row = $qry->fetch_assoc()) :
    $office[] = $row;
endwhile;

$docutype = array();
$qry = connectdb()->query("SELECT * FROM document_type");
while ($row = $qry->fetch_assoc()) :
    $docutype[] = $row;
endwhile;

$docutype = array();
$qry = connectdb()->query("SELECT * FROM users");
while ($row = $qry->fetch_assoc()) :
    $user[] = $row;
endwhile;
?>
<style>
    table.dataTable td {
        font-size: 1vw;
    }

    table tbody,
    td {
        font-size: 14px !important;
    }

    table {
        width: 200px;
        max-width: 200px;
        overflow-x: scroll;
    }
</style>
<div class="col-lg-12">
    <button type="button" class="btn bg-gradient-indigo mr-3 my-3 shadow-sm btn-sm" data-toggle="modal" data-target="#userdocumentsModal"><i class="fa-regular fa-square-plus"></i> Add New</button>
    <div class="card card-outline card-indigo" style="overflow:auto; white-space: nowrap">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-hover w-auto text- small" id="list">
                    <thead>
                        <tr class="table-indigo bg-gradient-indigo text-white">
                            <th class="text-center" style="width: 5%">#</th>
                            <th style="width: 25%">Submitter</th>
                            <th style="width: 10%">Tracking Number</th>
                            <th style="width: 20%">Title</th>
                            <th style="width: 10%">Recipient Office</th>
                            <th style="width: 20%">Type</th>
                            <th style="width: 20%">Purpose</th>
                            <th style="width: 20%">Remarks</th>
                            <th style="width: 15%">Attachments</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = connectdb()->query("SELECT * FROM documents LEFT JOIN document_type ON documents.document_type_id = document_type.document_type_id RIGHT JOIN office ON documents.originating_office_id = office.office_id WHERE originating_office_id = '{$userOfficeID}'");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><?php
                                    foreach ($user as $items) :
                                        if ($items["id"] == $row['user_id']) {
                                            echo $items["firstname"];
                                            echo " ";
                                            echo $items["middlename"];
                                            echo " ";
                                            echo $items["lastname"];
                                        }
                                    endforeach;
                                    ?>
                                </td>
                                <td><?php echo $row['tracking_number'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php
                                    foreach ($office as $items) :
                                        if ($items["office_id"] == $row['recipient_office_id']) {
                                            echo $items["office_name"];
                                        }
                                    endforeach;
                                    ?>
                                </td>
                                <td><?php
                                    foreach ($docutype as $items) :
                                        if ($items["document_type_id"] == $row['document_type_id']) {
                                            echo $items["document_code"];
                                        }
                                    endforeach;
                                    ?>
                                </td>
                                <td><?php echo $row['purpose'] ?></td>
                                <td><?php echo $row['remarks'] ?></td>
                                <td><a href="<?php echo $row['uploaded_files'] ?>" target="_blank"><i class="fa-solid fa-magnifying-glass"></i> View Attachment </a></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm update_type" name="update_type" data-toggle="modal" type="submit" data-target="#update_modal<?php echo $row['document_type_id'] ?>" data-id="<?php echo $row['document_id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm delete_type" data-id="<?php echo $row['document_type_id'] ?>">
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

<div class="modal fade" id="userdocumentsModal" tabindex="-1" role="dialog" aria-labelledby="typeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="manage_type">
                <div class="modal-header">
                    <h4 class="modal-title text-indigo" id="exampleModalLabel"><b>New Document Type</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <div class="col-lg-12">
                        <input type="hidden" name="document_id" id="typeId" value="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Type</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-indigo"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_name" name="document_name" value="<?php echo isset($document_name) ? $document_name : '' ?>" placeholder="Document Type Name" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Document Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-indigo"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="document_code" name="document_code" value="<?php echo isset($document_code) ? $document_code : '' ?>" placeholder="Document Type Code" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label for="document_classification" class="control-label">Document Classification</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-indigo"><i class="fa-solid fa-file fa-fw"></i></span>
                                        </div>
                                        <select id="document_classification" class="form-control form-control-indigo" data-toggle="tooltip" data-placement="top" data-original-title="document_classification" name="document_classification_id" required>
                                            <option value="" disabled selected hidden>Please Choose...</option>
                                            <?php
                                            foreach ($data as $items) :
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
                        <button class="btn bg-gradient-indigo mr-2">Save</button>
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