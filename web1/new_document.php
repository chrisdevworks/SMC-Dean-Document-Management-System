<?php
include_once('db_connect.php');
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



?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="" id="manage_document" enctype="multipart/form-data">
                <!-- <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>"> -->
                <div class="row">
                    <div class="col-md-12">
                        <b class="text-muted">Document Info</b>
                        <input type="hidden" name="user_id" value="<?php echo $userID ?>">
                        <input type="hidden" name="originating_office_id" value="<?php echo $userOfficeID ?>">
                        <div class="form-group">
                            <label class="control-label">Tracking Number</label>
                            <input type="text" class="form-control form-control-primary" name="tracking_number" value="<?php echo $_GET['trackingnumber'] ?>" readonly>
                            <p class="text-muted">Please make sure to attach the correct tracking number to the actual document.</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control form-control-primary" name="title" value="" maxlength="250" placeholder="Document name" required>
                            <p class="text-muted">Max Length: 250 characters. </p>
                        </div>
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
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="purpose" rows="2" maxlength="250" placeholder="Your purpose"></textarea>
                            <p class="text-muted">Max Length: 250 characters. </p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Remarks</label>
                            <input type="text" class="form-control form-control-primary" name="remarks" value="" maxlength="250" required>
                            <p class="text-muted">Max Length: 250 characters. </p>
                        </div>
                        <label class="control-label">File <span class="text-muted">(optional)</span></label>
                        <div class="form-group">
                            <div class="input-group pb-3 py-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-solid fa-upload fa-fw"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="uploaded_files" id="uploaded_files" class="form-control form-control-sm " value="" required>
                                    <label class="custom-file-label" for="uploaded_files">Choose File</label>
                                </div>
                            </div>
                            <p class="text-muted m-0">- Allowed Formats: PDF, GIF, JPG, PNG, ZIP, DOC, DOCX, PPTX, TXT</p>
                            <p class="text-muted m-0">- Maximum Size: 50 MB</p>
                            <p class="text-muted m-0">- You can upload larger files via <a href="https://drive.google.com/" target="_blank">Google Drive</a> and then include the link in the remarks.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=home'">Cancel</button>
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

        $.ajax({
            url: 'ajax.php?action=save_documents',
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
                        // location.replace('index.php?page=home')
                        location.replace('index.php?page=document_details&trackingnumber=<?php echo $_GET['trackingnumber'] ?>')
                    }, 800)
                }
            }
        })
    })
</script>