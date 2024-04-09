<?php
include_once('db_connect.php');
connectdb();

$userID = $_SESSION['login_id'];
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

$document = array();
$qry = connectdb()->query("SELECT * FROM documents WHERE tracking_number = '{$_GET["trackingnumber"]}' ORDER BY time_receive DESC LIMIT 1");
while ($row = $qry->fetch_assoc()) :
    $document[] = $row;
endwhile;



?>
<div class="col-lg-12">
    <div class="card card-outline card-primary" style="overflow:auto; white-space: nowrap">
        <h5 class="text-danger card-header">Overview</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="list">
                    <tbody>
                        <?php
                        $i = 0;
                        // $qry = $conn->query("SELECT * FROM document_type LEFT JOIN document_classification ON document_type.document_classification_id = document_classification.document_classification_id");
                        // $j = array("Tracking Number", "Title", "Type", "For", "Remarks", "Originating Office", "Current Office", "Current Recipient Office", "Status");
                        $y =  $_GET["trackingnumber"];
                        $qry = connectdb()->query("SELECT * FROM documents WHERE tracking_number = '{$y}' ORDER BY time_receive DESC LIMIT 1");

                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th>ID</th>
                                <td><?php echo $row['document_id'] ?></td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><?php echo $row['title'] ?></td>
                            </tr>
                            <tr>
                                <th style="width: 15%">Tracking Number</th>
                                <td><?php echo $row['tracking_number'] ?></td>
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
                        <?php
                            include 'edit_office.php';
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" id="manage_document" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <b class="text-muted">Document Info</b>
                        <?php
                        if (isset($_GET["id"])) {
                        ?>
                            <input type="hidden" name="document_id" value=" 
                        <?php
                            echo $_GET["id"];
                        ?>">
                        <?php } else { ?>
                            <input type="hidden" name="document_id" value="
                        <?php
                            foreach ($document as $items) :
                                echo $items["document_id"];
                            endforeach;
                        ?>">
                        <?php } ?>
                        <input type="hidden" name="tracking_number" value="<?php echo $_GET["trackingnumber"]; ?>">
                        <div class="form-group">
                            <label for="office" class="control-label">Recipient Office</label>
                            <select id="office" class="form-control form-control-primary" name="recipient_office_id" data-toggle="tooltip" data-placement="top" data-original-title="recipient_office_id" required>
                                <option value="" disabled selected hidden>Please Choose...</option>
                                <?php
                                foreach ($office as $items) :
                                    if ($items["office_id"] != $userOfficeID) {
                                        echo ' <option value="' . $items["office_id"] . '">' . $items["office_name"] . '</option> ';
                                    }
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="document" class="control-label">Document Type</label>
                            <select id="document" class="form-control form-control-primary" name="document_type_id" data-toggle="tooltip" data-placement="top" data-original-title="document_type_id" required>
                                <option value="" disabled selected hidden>Please Choose...</option>
                                <?php
                                foreach ($data as $items) :
                                    echo ' <option value="' . $items["document_type_id"] . '">' . $items["document_name"] . '</option> ';
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Purpose </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="purpose" rows="2" maxlength="250" placeholder="Your purpose" required></textarea>
                            <p class="text-muted">Max Length: 250 characters. </p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Remarks</label>
                            <input type="text" class="form-control form-control-primary" name="remarks" value="" maxlength="250" required>
                            <p class="text-muted">Max Length: 250 characters. </p>
                        </div>
                        <label class="control-label">File <span class="text-muted">(optional)</span></label>
                        <div class="input-group pb-3 pt-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="fas fa-solid fa-upload fa-fw"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="uploaded_files" id="uploaded_files" class="form-control form-control-sm " value="">
                                <label class="custom-file-label" for="uploaded_files">Choose File</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2" type="submit">Save</button>
                    <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=list_for_releasing'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#manage_document').submit(function(e) {
        e.preventDefault()
        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')

        _confrelease("Are you sure you want to release this document from your office?", data = new FormData($(this)[0]), function(confirmed) {
            if (confirmed) {
                $.ajax({
                    url: 'ajax.php?action=release_docs',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success: function(resp) {
                        if (resp == 2) {
                            message_toast('<p>Document too large.</p><br><p>File size must be less than 15 MB</p>', "warning");
                            setTimeout(function() {
                                location.reload()
                            }, 800)
                        } else if (resp == 3) {
                            message_toast("No document found", "error");
                            setTimeout(function() {
                                location.reload()
                            }, 750)
                        } else {
                            alert_toast('Data successfully saved.', "success");
                            setTimeout(function() {
                                location.replace('index.php?page=document_details&trackingnumber=' + resp)
                            }, 750)
                        }
                    }
                })
            }
        });
    })
</script>