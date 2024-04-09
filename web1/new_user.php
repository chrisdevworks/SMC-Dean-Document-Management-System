<?php
?>
<style>
	#select2 {
		display: none;
	}
</style>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-12">
						<b class="text-muted border-bottom border-gray ">User Info</b>

						<div class="form-group p-2 m-0">
							<label class="control-label">Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary"><i class="fa-solid fa-envelope fa-fw"></i></span>
								</div>
								<input type="username" class="form-control form-control-primary" name="username" required value="<?php echo isset($username) ? $username : '' ?>">
								<small id="#msg"></small>
							</div>
						</div>
						<div class="form-group p-2 m-0">
							<label class="control-label">Password</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary"><i class="fa-solid fa-key fa-fw"></i></span>
								</div>
								<input type="text" class="form-control form-control-primary" name="password" <?php echo isset($id) ? "" : 'required' ?>>
								<!-- <small><i><?php echo isset($id) ? "Leave this blank if you dont want to change you password" : '' ?></i></small> -->
							</div>
						</div>
						<div class="form-group p-2 m-0">
							<label class="label control-label">Confirm Password</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary"><i class="fa-solid fa-key fa-fw"></i></span>
								</div>
								<input type="text" class="form-control form-control-primary" name="cpass" <?php echo isset($id) ? 'required' : '' ?>>
								<small id="pass_match" data-status=''></small>
							</div>
						</div>

						<div class="form-group p-2 m-0">
							<label class="control-label">First Name</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
								</div>
								<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="First Name" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>" placeholder="First Name" required>
							</div>
						</div>
						<div class="form-group p-2 m-0">
							<label class="control-label">Middle Name</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
								</div>
								<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Middle Name" name="middlename" value="<?php echo isset($firstname) ? $firstname : '' ?>" placeholder="First Name" required>
							</div>
						</div>
						<div class="form-group p-2 m-0">
							<label class="control-label">Last Name</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
								</div>
								<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Last Name" name="lastname" value="<?php echo isset($firstname) ? $firstname : '' ?>" placeholder="First Name" required>
							</div>
						</div>

						<div class="form-group p-2 m-0">
							<label for="" class="control-label">Position</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary"><i class="fa-solid fa-users-gear fa-fw"></i></span>
								</div>
								<select id="position" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="position" name="position" required>
									<option value="" disabled selected hidden>Please Choose...</option>
									<option value="Quality Assurance Management Director" <?php echo isset($type) && $type == 'Quality Assurance Management Director' ? 'selected' : '' ?>>Quality Assurance Management Director</option>
									<option value="Central Administration" <?php echo isset($type) && $type == 'Central Administration' ? 'selected' : '' ?>>Central Administration</option>
									<option value="Service Head" <?php echo isset($type) && $type == 'Service Head' ? 'selected' : '' ?>>Service Head</option>
									<option value="Dean" <?php echo isset($type) && $type == 'Deans/Coordinator' ? 'selected' : '' ?>>Deans/Coordinator</option>
									<option value="Faculty" <?php echo isset($type) && $type == 'Faculty' ? 'selected' : '' ?>>Faculty</option>
									<option value="Staff" <?php echo isset($type) && $type == 'Staff' ? 'selected' : '' ?>>Staff</option>
									<option value="Student" <?php echo isset($type) && $type == 'Student' ? 'selected' : '' ?>>Student</option>
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
									<optgroup label="Deans Office">
										<option value="CAS">College of Arts and Sciences</option>
										<option value="CED">College of Education</option>
										<option value="CECS">College of Engineering & Computer Studies</option>
										<option value="CBAA">College of Business Administration and Accountancy</option>
										<option value="CHM">College of Hospitality Management</option>
										<option value="CON">College of Nursing</option>
										<option value="COC">College of Criminology</option>
										<option value="GS">Graduate School</option>
									</optgroup>
									<!-- <option disabled>──────────</option> -->
									<optgroup label="Other Offices">
										<option value="VPAcad">VP Academic's Office</option>
										<option value="GCOff">Guidance Office</option>
										<option value="RegOff">Registrar's Office</option>
										<option value="FinOff">Finance Office</option>
										<option value="ResOff">Research Office</option>
										<option value="DSAOff">Student Affair's Office</option>
										<option value="DSAOff">Faculty Office</option>
										<option value="Clinic">Clinic</option>
										<option value="Lib">Library</option>
										<option value="Lab">Laboratory</option>
										<option value="ITC">ITC</option>
									</optgroup>
								</select>
							</div>
						</div>

					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=user_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('#manage_user').submit(function(e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		// if ($('#pass_match').attr('data-status') != 1) {
		// 	if ($("[name='password']").val() != '') {
		// 		$('[name="password"],[name="cpass"]').addClass("border-danger")
		// 		end_load()
		// 		return false;
		// 	}
		// }
		$.ajax({
			url: 'ajax.php?action=save_user',
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
					}, 750)
				} else if (resp == 2) {
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>