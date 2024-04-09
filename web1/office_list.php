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
    <button type="button" class="btn btn-primary mr-3 my-3 shadow-sm" data-toggle="modal" data-target="#OfficeModal"><i class="fa-regular fa-square-plus"></i> Add New</button>
    <div class="card card-outline card-primary" style="overflow:auto; white-space: nowrap">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-hover " id="list">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-center" style="width: 5%">#</th>
                            <th style="width: 60%">Office Name</th>
                            <th style="width: 20%">Office Code</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = connectdb()->query("SELECT * FROM office");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><?php echo $row['office_name'] ?></td>
                                <td><?php echo $row['office_code'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary update_office" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['office_id'] ?>" data-id="<?php echo $row['office_id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger delete_office" data-id="<?php echo $row['office_id'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            include 'edit_office.php';
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade" id="OfficeModal" tabindex="-1" role="dialog" aria-labelledby="OfficeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="manage_office">
                <div class="modal-header">
					<h4 class="modal-title text-primary" id="exampleModalLabel"><b>New Office</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <div class="col-lg-12">
                        <input type="hidden" name="id" id="officeId" value="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Office Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="office_name" name="office_name" value="<?php echo isset($office_name) ? $office_name : '' ?>" placeholder="Office Name" required>
                                    </div>
                                </div>
                                <div class="form-group p-2 m-0">
                                    <label class="control-label">Office Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="office_code" name="office_code" value="<?php echo isset($office_code) ? $office_code : '' ?>" placeholder="Office Code" required>
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

    $(document).on("click", ".update_office", function() {
        var officeId = $(this).data('id');
        $('#officeId').val(officeId);
    });

    $('.delete_office').click(function() {
        _conf("Are you sure to delete this office?", "delete_office", [$(this).attr('data-id')])
    })

    function delete_office($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_office',
            method: 'POST',
            data: {
                id: $id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function() {
                        location.reload()
                        location.replace('index.php?page=office_list')
                    }, 800)
                }
            }
        })
    }

    $('#manage_office').submit(function(e) {
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