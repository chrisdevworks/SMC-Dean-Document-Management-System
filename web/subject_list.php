<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success" style="overflow:auto; white-space: nowrap">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_student"><i class="fa fa-plus"></i> Add New Student</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-hover " id="list">
					<thead>
						<tr class="table-primary">
							<th class="text-center">#</th>
							<th>Course Code</th>
							<th>Title</th>
                            <th>Lecture Hours/Week</th>
							<th>Lab Hours/Week</th>
							<th>Total Units</th>
							<th>Total Hours/Week</th>
							<th>Pre-requisite</th>

							<th>School Year</th>
							<th>Semester</th>
							<th>Department</th>

							<th>Date Created</th>
							<th>Date Updated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$type = array('', "Admin", "Staff", "Student");
						$qry = $conn->query("SELECT * FROM subject order by id asc");
						while ($row = $qry->fetch_assoc()) :
						?>
							<tr>
								<th class="text-center"><?php echo $i++ ?></th>
								<td><?php echo $row['course_code'] ?></td>
								<td><?php echo $row['title'] ?></td>
								<td><?php echo $row['lecture'] ?></td>
								<td><?php echo $row['laboratory'] ?></td>
								<td><?php echo $row['total_units'] ?></td>
								<td><?php echo $row['total_hrs'] ?></td>
								<td><?php echo $row['pre_requisites'] ?></td>

								<td><?php echo $row['school_year'] ?></td>
								<td><?php echo $row['semester'] ?></td>
								<td><?php echo $row['department'] ?></td>

								<td><?php echo $row['date_created'] ?></td>
								<td><?php echo $row['date_updated'] ?></td>
								<td class="text-center">
									<div class="btn-group">
										<a href="./index.php?page=edit_subject&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat">
											<i class="fas fa-edit"></i>
										</a>
										<button type="button" class="btn btn-danger btn-flat delete_subject" data-id="<?php echo $row['id'] ?>">
											<i class="fas fa-trash"></i>
										</button>
									</div>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#list').dataTable()
	})
	$('.delete_subject').click(function () {
			_conf("Are you sure to delete this subject?", "delete_subject", [$(this).attr('data-id')])
	})

	function delete_subject($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_subject',
			method: 'POST',
			data: {
				id: $id
			},
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>