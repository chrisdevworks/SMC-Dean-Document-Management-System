<?php 
include_once('db_connect.php');
connectdb();
$data = array();
$qry = connectdb()->query("SELECT * FROM office");
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
	<button type="button" class="btn btn-info mr-3 my-3 shadow-sm" data-toggle="modal" data-target="#UserModal"><i class="fa-regular fa-square-plus"></i> Add New</button>
	<div class="card card-outline card-info" style="overflow:auto; white-space: nowrap">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-hover w-auto small" id="list">
					<thead>
						<tr class="table-info">
							<th class="text-center" style="width: 1%">#</th>
							<th style="width: 35%">Full Name</th>
							<th style="width: 20%">Position</th>
							<th style="width: 20%">Office/Department</th>
							<th style="width: 15%">Username</th>
							<th style="width: 10%">Password</th>
							<th style="width: 10%">Date Created</th>
							<th style="width: 10%">Date Updated</th>
							<th style="width: 10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$qry = connectdb()->query("SELECT * FROM users LEFT JOIN office ON users.office_id = office.office_id");
						while ($row = $qry->fetch_assoc()) :
						?>
							<tr>
								<th class="text-center"><?php echo $i++ ?></th>
								<td><b><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></b></td>
								<td><b><?php echo $row['position'] ?></b></td>
								<td><b><?php echo $row['office_name'] ?></b></td>
								<td><b><?php echo $row['username'] ?></b></td>
								<td><b><?php echo $row['password'] ?></b></td>
								<td><b><?php echo $row['date_created'] ?></b></td>
								<td><b><?php echo $row['date_updated'] ?></b></td>
								<td class="text-center">
									<div class="btn-group">
										<button class="btn btn-primary update_user" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['id'] ?>" data-id="<?php echo $row['office_id'] ?>">
											<i class="fas fa-edit"></i>
										</button>
										<button type="button" class="btn btn-danger delete_user" data-id="<?php echo $row['id'] ?>">
											<i class="fas fa-trash"></i>
										</button>
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

<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="newUser" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content p-4">
			<form action="" id="manage_user">
				<div class="modal-header">
					<h4 class="modal-title text-primary" id="exampleModalLabel"><b>New User</b></h4>
				</div>
				<div class="modal-body">
					<!-- ------------------------------------------------------------- -->
					<input type="hidden" name="id" id="userId" value="<?php echo isset($id) ? $id : '' ?>">
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
								<label class="control-label">Authority Level</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
									</div>
									<input type="number" min="1" max="5" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="authority_level" name="authority_level" value="<?php echo isset($authority_level) ? $authority_level : '' ?>" placeholder="Level (between 1 and 5):" required>
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
										foreach ($data as $items) :
											echo ' <option value="' . $items["office_id"] . '">' . $items["office_name"] . '</option> ';
										endforeach;
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
					</div>
				</div>
				<hr>
			</form>
		</div>
	</div>
</div>



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

	$(document).on("click", ".update_user", function() {
		var userId = $(this).data('id');
		$('#userId').val(userId);
	});


	$('.delete_user').click(function() {
		_conf("<h5 class='text-danger'>Are you sure you want to delete this user?</h5> ", "delete_user", [$(this).attr('data-id')])
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