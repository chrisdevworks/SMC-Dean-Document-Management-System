<?php
include_once('db_connect.php');
connectdb();

$office = array();
$qry = connectdb()->query("SELECT * FROM office");
while ($row = $qry->fetch_assoc()) :
    $office[] = $row;
endwhile;

$docutype = array();
$qry2 = connectdb()->query("SELECT * FROM document_type");
while ($row = $qry2->fetch_assoc()) :
    $docutype[] = $row;
endwhile;
?>
<style>
    table.dataTable td {
        font-size: 1vw;
    }

    /* th {
        width: 15%;
    } */

    #trails tbody tr:nth-of-type(odd) {
        background-color: #f5deb3;
    }

    /* #trails tbody tr:nth-of-type(even) {
        background-color: #f5deb3;
        filter: brightness(95%);
    } */


    .transit {
        background-color: wheat;
    }
</style>
<div class="col-lg-12">

    <?php
    if (isset($_SERVER['HTTP_REFERER'])) {
        if (stripos($_SERVER['HTTP_REFERER'], "list_for_releasing") !== false) :
    ?>
            <div class="btn-group m-3">
                <a href="./index.php?page=endpoint_document&trackingnumber=<?php echo $_GET['trackingnumber'] ?>" class="p-2 btn btn-sm btn-outline-secondary bg-gradient-dark">
                    <i class="nav-icon fas fa-solid fa-check-to-slot text-black"></i> Tag as Endpoint</a>
                <a href="./index.php?page=release_document&trackingnumber=<?php echo $_GET['trackingnumber'] ?>&id=<?php echo $_GET['id'] ?>" class="p-2 btn btn-sm btn-outline-secondary bg-gradient-green">
                    <i class="fa-solid fa-arrow-up"></i> Release</a>
            </div>
    <?php
        endif;
    }
    ?>

    <!-- ============================================================================================ -->

    <div class="card card-outline card-primary" style="overflow:auto; white-space: nowrap">
        <h5 class="text-danger card-header">Overview</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="overview">
                    <tbody>
                        <?php
                        $i = 0;
                        // $qry = $conn->query("SELECT * FROM document_type LEFT JOIN document_classification ON document_type.document_classification_id = document_classification.document_classification_id");
                        // $j = array("Tracking Number", "Title", "Type", "For", "Remarks", "Originating Office", "Current Office", "Current Recipient Office", "Status");
                        $z =  $_GET["trackingnumber"];
                        $qry = connectdb()->query("SELECT * FROM documents LEFT JOIN document_type ON documents.document_type_id = document_type.document_type_id RIGHT JOIN office ON documents.originating_office_id = office.office_id WHERE tracking_number = '{$_GET["trackingnumber"]}' ORDER BY document_id DESC LIMIT 1");

                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th style="width: 15%">Tracking Number</th>
                                <td><?php echo $row['document_id'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 15%">Tracking Number</th>
                                <td><?php echo $row['tracking_number'] ?></td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><?php echo $row['title'] ?></td>
                            </tr>
                            <tr>
                                <th>Document</th>
                                <td><?php
                                    foreach ($docutype as $items) :
                                        if ($items["document_type_id"] == $row['document_type_id']) {
                                            echo $items["document_code"];
                                        }
                                    endforeach;
                                    ?></td>
                            </tr>
                            <tr>
                                <th>Remarks</th>
                                <td><?php echo $row['purpose'] ?></td>
                            </tr>
                            <tr>
                                <th>Originating Office</th>
                                <td><?php
                                    foreach ($office as $items) :
                                        if ($items["office_id"] == $row['originating_office_id']) {
                                            echo $items["office_name"];
                                        }
                                    endforeach;
                                    ?></td>
                            </tr>
                            <tr>
                                <th>Current Office</th>
                                <td><?php
                                    foreach ($office as $items) :
                                        if ($items["office_id"] == $row['current_office_id']) {
                                            echo $items["office_name"];
                                        }
                                    endforeach;
                                    ?></td>
                            </tr>
                            <tr>
                                <th>Current Recipient Office</th>
                                <td><?php
                                    foreach ($office as $items) :
                                        if ($items["office_id"] == $row['recipient_office_id']) {
                                            echo $items["office_name"];
                                        }
                                    endforeach;
                                    ?></td>
                            </tr>

                            <tr>
                                <th>Remarks</th>
                                <td><?php echo $row['purpose'] ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td class="text-success"><b><?php echo $row['doc_status'] ?></b></td>
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

    <!-- =========================================DOCUMENT TRAILS=================================================== -->
    <div class="card card-outline card-primary" style="overflow:auto; white-space: nowrap">
        <h5 class="text-danger card-header">Paper Trail</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped w-auto small table-hover" data-toggle="table" data-sort-name="date" data-sort-order="asc" id="trails">
                    <thead>
                        <tr class="table-primary">
                            <th style="width: 1%">#</th>
                            <th style="width: 1%">ID</th>
                            <th style="width: 8%">From</th>
                            <th style="width: 8%">To</th>
                            <th style="width: 10%">IN</th>
                            <th style="width: 10%">OUT</th>
                            <th style="width: 8%">Elapse Time</th>
                            <th style="width: 8%">Transit Time</th>
                            <th style="width: 8%">Type</th>
                            <th style="width: 30%">Purpose</th>
                            <th style="width: 30%">Remarks</th>
                            <th style="width: 30%">Status</th>
                            <th style="width: 5%">Attachment</th>
                        </tr>
                    </thead>
                    <tbody id="trailsbody">
                        <?php
                        $index = 0;
                        $i = 1;
                        $y = 0;
                        // $z =  ;
                        $trc2 = 0;
                        $trs2 = 0;
                        $oldv = 0;
                        $qry = connectdb()->query("SELECT document_id, user_id, tracking_number, title, originating_office_id,current_office_id,recipient_office_id, document_type_id, purpose,remarks,uploaded_files, time_receive,time_release,resource_id, doc_status, TIME_FORMAT(TIMEDIFF(time_receive, LAG(time_release) OVER (ORDER BY document_id)), '%Hh %im %ss')   AS transit  FROM documents WHERE tracking_number = '{$_GET["trackingnumber"]}'");
                        // $qry = connectdb()->query("SELECT *  FROM documents WHERE tracking_number = '{$_GET["trackingnumber"]}' ORDER BY document_id ASC");
                        $rowcount = $qry->num_rows;

                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i ?></th>
                                <th class="text-center"><?php echo $row['document_id'] ?></th>
                                <td class="text-center">
                                    <?php
                                    if ($i == 1) {
                                        foreach ($office as $items) :
                                            if ($items["office_id"] == $row['originating_office_id']) {
                                                echo $items["office_code"];
                                            }
                                        endforeach;
                                    } else {
                                        foreach ($office as $items) :
                                            if ($items["office_id"] == $row['current_office_id']) {
                                                echo $items["office_code"];
                                            }
                                        endforeach;
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    foreach ($office as $items) :
                                        if ($items["office_id"] == $row['recipient_office_id']) {
                                            echo $items["office_code"];
                                        }
                                    endforeach;
                                    ?>
                                </td>
                                <td class="text-center"><?php echo $row['time_receive'] ?></td>
                                <td class="text-center"><?php echo $row['time_release'] ?></td>
                                <td class="text-center"><i>
                                        <?php
                                        // ELAPSE TIME
                                        // IF RELEASE IS PRESENT THEN RELEASE - RECEIVE
                                        if ($row['time_release']) {
                                            $trc = $row['time_receive'];
                                            $trs = $row['time_release'];
                                            $diff = abs(strtotime($trs) - strtotime($trc));
                                            if ($diff > 86400) {
                                                echo gmdate("j\d H\h i\m s\s", $diff - 86400);
                                            } else {
                                                echo gmdate("H\h i\m s\s", $diff);
                                            }
                                        }
                                        // IF NO RELEASE YET THEN RECEIVE - CURRENT TIME
                                        else {
                                            $transr = strtotime($row['time_receive']);
                                            $current = time(); // current time
                                            $diff = $current - $transr;
                                            if ($diff > 86400) {
                                                echo gmdate("j\d H\h i\m s\s", $diff - 86400);
                                            } else {
                                                echo gmdate("H\h i\m s\s", $diff);
                                            }
                                        }
                                        ?>
                                    </i></td>
                                <?php if ($i != 1) { ?>
                                    <td class="text-center"><i><?php echo $row['transit']; ?></i></td>
                                <?php } else { ?>
                                    <td class="text-center"></td>
                                <?php }; ?>
                                <td class="text-center">
                                    <?php
                                    foreach ($docutype as $items) :
                                        echo ' <option value="' . $items["document_type_id"] . '">' . $items["document_name"] . '</option> ';
                                    endforeach;
                                    ?>
                                </td>

                                <td class="text-center"><?php echo $row['purpose'] ?></td>
                                <td class="text-center"><?php echo $row['remarks'] ?></td>
                                <td class="text-center"> <?php echo $row['doc_status'] ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($row['uploaded_files']) : ?>
                                        <a href="<?php echo $row['uploaded_files'] ?>" target="_blank"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>


                            <!-- ============================================= -->
                        <?php
                            $i++;
                            include 'edit_office.php';
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var tbody = document.getElementById('trailsbody'),
            n, row, cell;

        // var tbody = $('#trails').DataTable();

        var d = new Date();

        row = tbody.insertRow();

        var releasedata = tbody.rows[0].cells[3].innerHTML; // CORRECT
        var receivedata = tbody.rows[2].cells[2].innerHTML; // CORRECT

        var myrelease = new Date(Date.parse(releasedata.replace(/-/g, '/')));
        var myreceive = new Date(Date.parse(receivedata.replace(/-/g, '/')));

        // var con_release = myrelease.getTime(); //method to convert the Date to the number of milliseconds
        // var con_receive = myreceive.getTime(); //method to convert the Date to the number of milliseconds

        var daterelease = new Date(myrelease); // create Date object
        var datereceive = new Date(myreceive); // create Date object


        // tbody.rows[1].cells[4].innerHTML = date2.diff(date1, 'day') + "d " + date2.diff(date1, 'hour') + "h " + date2.diff(date1, 'minute') + "m " + date2.diff(date1, 'second') + "s ";
        // tbody.rows[1].cells[4].innerHTML = date2.diff(date1, 'minute');


        // cell0 = row.insertCell(0);
        // cell0.innerHTML = "<th class='text-center'> <b><i>IN TRANSIT</i></b></th>";
        // cell1 = row.insertCell(1);
        // cell2 = row.insertCell(2);
        // cell3 = row.insertCell(3);
        // cell4 = row.insertCell(4);
        // cell4.innerHTML = d.toLocaleString(); //convert the number back to the Date
        // cell5 = row.insertCell(5);
        // cell6 = row.insertCell(6);
        // cell7 = row.insertCell(7);

        for (var i = 0, row; row = tbody.rows[i]; i++) {
            for (var j = 0, col; col = row.cells[j]; j++) {

                if (i % 2 == 1 && j == 3) {
                    var myrel = tbody.rows[i].cells[j].innerHTML; // CORRECT
                    var myrelease = new Date(Date.parse(releasedata.replace(/-/g, '/')));

                }
                if (i % 2 == 1 && j == 2) {
                    var myrec = tbody.rows[i].cells[j].innerHTML; // CORRECT
                    var myreceive = new Date(Date.parse(receivedata.replace(/-/g, '/')));
                }
                if (i % 2 == 1) {
                    // tbody.rows[i].cells[4].innerHTML = "adsadsads";
                    // showDiff(myrel, myrec);
                    // tbody.rows[i].cells[4].innerHTML = showDiff(myrel, myrec);

                }
            }
        }
        // showDiff();


        function showDiff() {

            var myrelease = new Date(Date.parse(releasedata.replace(/-/g, '/')));
            var myreceive = new Date(Date.parse(receivedata.replace(/-/g, '/')));

            // var con_release = myrelease.getTime(); //method to convert the Date to the number of milliseconds
            // var con_receive = myreceive.getTime(); //method to convert the Date to the number of milliseconds

            var date1 = new Date(myrelease); // create Date object
            var date2 = new Date(myreceive); // create Date object

            var diff = (date2 - date1) / 1000;
            diff = Math.abs(Math.floor(diff));

            var days = Math.floor(diff / (24 * 60 * 60));
            var leftSec = diff - days * 24 * 60 * 60;

            var hrs = Math.floor(leftSec / (60 * 60));
            var leftSec = leftSec - hrs * 60 * 60;

            var min = Math.floor(leftSec / (60));
            var leftSec = leftSec - min * 60;

            // tbody.rows[1].cells[4].innerHTML = days + "d " + hrs + ":" + min + ":" + leftSec;
            var ret = days + "d " + hrs + ":" + min + ":" + leftSec;
            return ret;

            // for (var i = 0, row; row = tbody.rows[i]; i++) {
            //     for (var j = 0, col; col = row.cells[j]; j++) {
            //         if (i % 2 == 1) {
            //             tbody.rows[i].cells[4].innerHTML = days + "d " + hrs + ":" + min + ":" + leftSec;
            //         }
            //     }
            // }

            // setTimeout(showDiff, 1000);
        }


    });
</script>