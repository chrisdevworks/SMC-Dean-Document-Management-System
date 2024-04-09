<?php
// include 'db_connect.php';
include_once('db_connect.php');
connectdb();

$data = array();
$userOfficeID = $_SESSION['login_office_id'];

$office = array();
$qry = connectdb()->query("SELECT * FROM office");
while ($row = $qry->fetch_assoc()) :
    $office[] = $row;
endwhile;

$data = array();
$qry = connectdb()->query("SELECT * FROM document_type");
while ($row = $qry->fetch_assoc()) :
    $data[] = $row;
endwhile;



?>
<style>
    table.dataTable td {
        font-size: 0.8vw;
    }
</style>
<div class="col-lg-12">
    <a role="button" href="./index.php?page=new_document&trackingnumber=<?php echo date("Y") ?>-<?php echo date("md") ?>-<?php echo $numrand ?>-<?php echo $numrand2 ?>" class="text-white btn bg-gradient-orange mr-3 my-3 shadow-sm btn-sm">
        <i class="fas fa-sharp fa-solid fa-plus fa-sm"></i> Add a document
    </a>
    <div class="card card-outline card-orange" style="overflow:auto; white-space: nowrap">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-hover w-auto small" id="list">
                    <thead>
                        <tr class="table-orange bg-gradient-orange text-white">
                            <th class="text-center" style="width: 1%">#</th>
                            <th style="width: 1%">ID</th>
                            <th style="width: 20%">Title</th>
                            <th style="width: 10%">Tracking Number</th>
                            <th style="width: 15%">Originating Office</th>
                            <th style="width: 15%">Document</th>
                            <th style="width: 20%">Purpose</th>
                            <th style="width: 20%">Remarks</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = connectdb()->query("SELECT * FROM documents WHERE current_office_id = '{$userOfficeID}' AND recipient_office_id IS NULL");
                        while ($row = $qry->fetch_assoc()) :
                            $_SESSION['document_id'] = $row['document_id'];
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><b><?php echo $row['document_id'] ?></b></td>
                                <td><b><?php echo $row['title'] ?></b></td>
                                <td><b><?php echo $row['tracking_number'] ?></b></td>
                                <td><b><?php
                                        foreach ($office as $items) :
                                            if ($items["office_id"] == $row['originating_office_id']) {
                                                echo  $items["office_name"];
                                            }
                                        endforeach;
                                        ?></b>
                                    <?php
                                    echo '<br>';
                                    echo $row['time_release'];
                                    ?>
                                </td>
                                <?php
                                $qry2 = connectdb()->query("SELECT * FROM documents WHERE document_id = '{$row['resource_id']}'");
                                while ($row2 = $qry2->fetch_assoc()) :
                                ?>
                                    <td><b>
                                            <?php
                                            foreach ($data as $items) :
                                                if ($items["document_type_id"] == $row2['document_type_id']) {
                                                    echo  $items["document_name"];
                                                }
                                            endforeach;
                                            ?>
                                        </b></td>
                                    <td><b><?php echo $row2['purpose'] ?></b></td>
                                    <td><b><?php echo $row2['remarks'] ?></b></td>
                                <?php
                                endwhile;
                                ?>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="./index.php?page=document_details&trackingnumber=<?php echo $row['tracking_number'] ?>&id=<?php echo $row['document_id'] ?>" class="btn btn-sm btn-outline-secondary bg-gradient-orange">VIEW</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            include 'edit_user.php';
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->


<script>
    // $('[name="password"],[name="cpass"]').keyup(function() {
    // 	var pass = $('[name="password"]').val()
    // 	var cpass = $('[name="cpass"]').val()
    // 	if (cpass == '' || pass == '') {
    // 		$('#pass_match').attr('data-status', '')
    // 	} else {
    // 		if (cpass == pass) {
    // 			$('#pass_match').attr('data-status', '1').html('<i class="text-success">Password Matched.</i>')
    // 		} else {
    // 			$('#pass_match').attr('data-status', '2').html('<i class="text-danger">Password does not match.</i>')
    // 		}
    // 	}
    // })

    $(document).ready(function() {
        // $('#list').dataTable();
        $('#list').DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'rt>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        });
    })

    // =================================================================================================================

    $('.delete_user').click(function() {
        _conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')])
    })


    function delete_user($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_user',
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

    // =================================================================================================================

    // $('.receive_docu').click(function () {
    //     if(confirm('Are you sure') == true){
    //         receive_docu($(this).attr('data-id'),$(this).attr('data-track'),$(this).attr('data-origin'));
    //     }
    // });

    $('.receive_docu').click(function() {
        _conf("<p class='text-success'>Are you sure you want to receive this document from your office?</p> ", "receive_docu", [$(this).attr('data-id'), $(this).attr('data-track'), $(this).attr('data-origin')])
    })

    function receive_docu($id, $track, $originating_office_id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=receive_docs',
            method: 'POST',
            data: {
                document_id: $id,
                originating_office_id: $originating_office_id,
                tracking_number: $track
            },
            success: function(resp) {
                if (resp != 2) {
                    alert_toast('Data successfully saved.', "success");
                    alert(resp);
                    setTimeout(function() {
                        location.replace('index.php?page=document_details&trackingnumber=' + resp)
                    }, 750)
                }
            }
        })
    }

    // =================================================================================================================================

    // $(".receive").click(function() {
    //     var $id = $(this).data('id');
    //     var $track =  $(this).data('track');
    //     var $origin = $(this).data('origin');
    //     _confreceive("Are you sure you want to receive this document from your office?", function(confirmed) {
    //         if (confirmed) {
    //             $.ajax({
    //                 url: 'ajax.php?action=receive_docs',
    //                 method: 'POST',
    //                 data: {
    //                     document_id: $id,
    //                     originating_office_id: $origin,
    //                     tracking_number: $track
    //                 },
    //                 success: function(resp) {
    //                     if (resp == 2) {
    //                         message_toast("Document already in process", "error");
    //                         setTimeout(function() {
    //                             location.reload()
    //                         }, 750)
    //                     } else if (resp == 3) {
    //                         message_toast("No document found", "error");
    //                         setTimeout(function() {
    //                             location.reload()
    //                         }, 750)
    //                     } else {
    //                         alert_toast('Data successfully saved.', "success");
    //                         alert(resp);
    //                         setTimeout(function() {
    //                             location.replace('index.php?page=document_details&trackingnumber=' + resp)
    //                         }, 750)
    //                     }
    //                 }
    //             })
    //         }
    //     });
    // });
</script>