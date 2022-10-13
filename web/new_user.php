<?php
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-12">
						<b class="text-muted">User Info</b>
						<?php if ($_SESSION['login_type'] == 'Dean') : ?>
							<div class="form-group">
								<label for="" class="control-label">User Role</label>
								<select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Role" name="type" required>
									<option value="Dean" <?php echo isset($type) && $type == 'Dean' ? 'selected' : '' ?>>Dean</option>
									<option value="Faculty" <?php echo isset($type) && $type == 'Faculty' ? 'selected' : '' ?>>Faculty</option>
								</select>
							</div>
						<?php else : ?>
							<input type="hidden" name="type" value="Faculty">
						<?php endif; ?>
						<div class="form-group">
							<label for="department" class="control-label">Department</label>
							<select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Department" name="department" required>
                                <option value="CAS">College of Arts and Sciences</option>
                                <option value="CED">College of Education</option>
                                <option value="CECS">College of Engineering & Computer Studies</option>
                                <option value="CBAA">College of Business Administration and Accountancy</option>
                                <option value="CHM">College of Hospitality Management</option>
                                <option value="CON">College of Nursing</option>
                                <option value="COC">College of Criminology</option>
                                <option value="GS">Graduate School</option>
                            </select>
						</div>
						<div class="form-group">
							<label class="control-label">Email</label>
							<input type="email" class="form-control form-control-primary" name="email" required value="<?php echo isset($email) ? $email : '' ?>">
							<small id="#msg"></small>
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="text" class="form-control form-control-primary" name="password" <?php echo isset($id) ? "" : 'required' ?>>
							<small><i><?php echo isset($id) ? "Leave this blank if you dont want to change you password" : '' ?></i></small>
						</div>
						<div class="form-group">
							<label class="label control-label">Confirm Password</label>
							<input type="text" class="form-control form-control-primary" name="cpass" <?php echo isset($id) ? 'required' : '' ?>>
							<small id="pass_match" data-status=''></small>
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
	$('[name="password"],[name="cpass"]').keyup(function() {
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if (cpass == '' || pass == '') {
			$('#pass_match').attr('data-status', '')
		} else {
			if (cpass == pass) {
				$('#pass_match').attr('data-status', '1').html('<i class="text-success">Password Matched.</i>')
			} else {
				$('#pass_match').attr('data-status', '2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})

	$('#manage_user').submit(function(e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		if ($('#pass_match').attr('data-status') != 1) {
			if ($("[name='password']").val() != '') {
				$('[name="password"],[name="cpass"]').addClass("border-danger")
				end_load()
				return false;
			}
		}
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