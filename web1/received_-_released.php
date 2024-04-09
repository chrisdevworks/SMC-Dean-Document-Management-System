<?php
// include 'db_connect.php';
include_once('db_connect.php');
connectdb();

$userOfficeID = $_SESSION['login_office_id'];

$docutype = array();
$qry = connectdb()->query("SELECT * FROM document_type");
while ($row = $qry->fetch_assoc()) :
    $docutype[] = $row;
endwhile;

$office = array();
$qry = connectdb()->query("SELECT * FROM office");
while ($row = $qry->fetch_assoc()) :
    $office[] = $row;
endwhile;



?>
<style>
    table.dataTable td {
        font-size: 0.8vw;
    }
</style>
<div class="col-lg-12">
    <a role="button" href="./index.php?page=new_document&trackingnumber=<?php echo date("Y") ?>-<?php echo date("md") ?>-<?php echo $numrand ?>-<?php echo $numrand2 ?>" class="text-white btn bg-gradient-green mr-3 my-3 shadow-sm btn-sm">
        <i class="fas fa-sharp fa-solid fa-plus fa-sm"></i> Add a document
    </a>
    <div class="card card-outline card-green" style="overflow:auto; white-space: nowrap">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-hover w-auto small" id="list">
                    <thead>
                        <tr class="table-green bg-gradient-green text-white">
                            <th class="text-center" style="width: 1%">#</th>
                            <th style="width: 5%">ID</th>
                            <th style="width: 10%">Tracking Number</th>
                            <th style="width: 20%">Originating Office</th>
                            <th style="width: 20%">Document</th>
                            <th style="width: 20%">Purpose</th>
                            <th style="width: 20%">Remarks</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = connectdb()->query("SELECT * FROM documents WHERE current_office_id = '{$userOfficeID}' AND recipient_office_id IS NOT NULL AND resource_id IS NOT NULL");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><b><?php echo $row['document_id'] ?></b></td>
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
                                <td><b>
                                        <?php
                                        foreach ($docutype as $items) :
                                            if ($items["document_type_id"] == $row['document_type_id']) {
                                                echo  $items["document_name"];
                                            }
                                        endforeach;
                                        ?>
                                    </b></td>
                                <td><b><?php echo $row['purpose'] ?></b></td>
                                <td><b><?php echo $row['remarks'] ?></b></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="./index.php?page=document_details&trackingnumber=<?php echo $row['tracking_number'] ?>&id=<?php echo $row['document_id'] ?>" class="btn btn-sm btn-outline-secondary bg-gradient-green">VIEW</a>
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

    // $('.receive_docu').click(function() {
    //     _conf("<p class='text-success'>Are you sure you want to receive this document from your office?</p> ", "receive_docu", [$(this).data('id'), $(this).data('track'), $(this).data('origin')])
    // })

    // function receive_docu($id, $track, $origin) {
    //     start_load()
    //     $.ajax({
    //         url: 'ajax.php?action=receive_docs',
    //         method: 'POST',
    //         data: {
    //             document_id: $id,
    //             originating_office_id: $origin,
    //             tracking_number: $track
    //         },
    //         success: function(resp) {
    //             if (resp != 2) {
    //                 alert_toast('Data successfully saved.', "success");
    //                 alert(resp);
    //                 // setTimeout(function() {
    //                 //     location.replace('index.php?page=document_details&trackingnumber=' + resp)
    //                 // }, 750)
    //             }
    //         }
    //     })
    // }

    // =================================================================================================================
    $(".receive").click(function() {
        var $id = $(this).data('id');
        var $track = $(this).data('track');
        var $origin = $(this).data('origin');
        _confreceive("Are you sure you want to receive this document from your office?", function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: 'ajax.php?action=receive_docs',
                    method: 'POST',
                    data: {
                        document_id: $id,
                        originating_office_id: $origin,
                        tracking_number: $track
                    },
                    success: function(resp) {
                        if (resp == 2) {
                            message_toast("Document already in process", "error");
                            setTimeout(function() {
                                location.reload()
                            }, 750)
                        } else if (resp == 3) {
                            message_toast("No document found", "error");
                            setTimeout(function() {
                                location.reload()
                            }, 750)
                        } else {
                            alert_toast('Data successfully saved.', "success");
                            alert(resp);
                            setTimeout(function() {
                                location.replace('index.php?page=document_details&trackingnumber=' + resp)
                            }, 750)
                        }
                    }
                })
            }
        });
    });
</script>