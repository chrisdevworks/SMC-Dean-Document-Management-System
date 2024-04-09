<div class="modal fade" id="update_modal<?php echo $row['id'] ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="" action="" id="update_user">
				<div class="modal-header">
					<h4 class="modal-title text-primary" id="exampleModalLabel"><b>Update User Info</b></h4>
				</div>
				<div class="modal-body">
					<!-- ------------------------------------------------------------- -->
					<input type="hidden" name="id" id="userId" value="<?php echo $row['id'] ?>">
					<div class="row">
						<div class="col-md-12">
							<b class="text-muted border-bottom border-gray ">User Info</b>

							<div class="form-group p-2 m-0">
								<label class="control-label">Username</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-envelope fa-fw"></i></span>
									</div>
									<input type="username" class="form-control form-control-primary" name="username" required value="<?php echo $row['username'] ?>" required>
									<small id="#msg"></small>
								</div>
							</div>
							<div class="form-group p-2 m-0">
								<label class="control-label">Password</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-key fa-fw"></i></span>
									</div>
									<input type="text" class="form-control form-control-primary" name="password" value="<?php echo $row['password'] ?>" required>
									<small><i><?php echo isset($id) ? "Leave this blank if you dont want to change you password" : '' ?></i></small>
								</div>
							</div>
							<div class="form-group p-2 m-0">
								<label class="control-label">First Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
									</div>
									<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="First Name" name="firstname" value="<?php echo $row['firstname'] ?>" placeholder="First Name" required>
								</div>
							</div>
							<div class="form-group p-2 m-0">
								<label class="control-label">Middle Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
									</div>
									<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Middle Name" name="middlename" value="<?php echo $row['middlename'] ?>" placeholder="Middle Name" required>
								</div>
							</div>
							<div class="form-group p-2 m-0">
								<label class="control-label">Last Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
									</div>
									<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Last Name" name="lastname" value="<?php echo $row['lastname'] ?>" placeholder="Last Name" required>
								</div>
							</div>

							<div class="form-group p-2 m-0">
								<label for="" class="control-label">Position</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-users-gear fa-fw"></i></span>
									</div>
									<select id="position" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="position" name="position" required>
										<option value="Quality Assurance Management Director" <?php echo $row['position'] === 'Quality Assurance Management Director' ? 'selected' : '' ?>>Quality Assurance Management Director</option>
										<option value="Central Administration" <?php echo $row['position'] === 'Central Administration' ? 'selected' : '' ?>>Central Administration</option>
										<option value="Service Head" <?php echo $row['position'] === 'Service Head' ? 'selected' : '' ?>>Service Head</option>
										<option value="Dean" <?php echo $row['position'] === 'Deans/Coordinator' ? 'selected' : '' ?>>Deans/Coordinator</option>
										<option value="Faculty" <?php echo $row['position'] === 'Faculty' ? 'selected' : '' ?>>Faculty</option>
										<option value="Staff" <?php echo $row['position'] === 'Staff' ? 'selected' : '' ?>>Staff</option>
										<option value="Student" <?php echo $row['position'] === 'Student' ? 'selected' : '' ?>>Student</option>
									</select>
								</div>
							</div>

							<div class="form-group p-2 m-0">
								<label for="office" class="control-label">Office</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-building-user fa-fw"></i></span>
									</div>
									<select id="office" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Office" name="office_id" required>
										<option value="" disabled selected hidden>Please Choose...</option>
										<?php
                                        $office_id = $row['office_id'];
                                        
                                        $newqry = "SELECT * FROM office";
                                        $resultInner = connectdb()->query($newqry);
                                        if ($resultInner->num_rows > 0) {
                                            while($rowInner = $resultInner->fetch_assoc()) :
                                                echo ' <option value="' . $rowInner["office_id"] . '"  ' . ($rowInner["office_id"] == $office_id	 ? "selected" : "") .'>' . $rowInner["office_name"] . '</option> ';
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
						<!-- <button class="btn btn-primary mr-2" name="save" type="button" id="button" value="Submit">Save</button> -->
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('#update_modal<?php echo $row['id'] ?> .modal-content form').submit(function(e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')

		$.ajax({
			url: 'ajax.php?action=edit_user',
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
						location.replace('index.php?page=user_list')
					}, 800)
				}
			}
		})
	})
</script>