<?php
include('db_connect.php');
session_start();

?>
<div class="container-fluid">
	<div id="msg"></div>
	<?php
	$loginid = $_SESSION["login_id"];
	$appointment = $conn->query("SELECT * FROM users WHERE id = '" . $loginid . "'");
	while ($row = $appointment->fetch_assoc()) :
	?>
		<form action="" id="manage-user">
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			<div class="form-group">
				<label for="username">Email</label>
				<input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email'] ?>" required autocomplete="off">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<div class="input-group mb-3">
					<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
					<div class="input-group-append">
						<span class="input-group-text"><i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
					</div>
				</div>
				<small><i>Leave this blank if you dont want to change the password.</i></small>
			</div>
		</form>
	<?php endwhile; ?>
</div>
<script>
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');

	togglePassword.addEventListener('click', function(e) {
		// toggle the type attribute
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		// toggle the eye slash icon
		this.classList.toggle('fa-eye-slash');
	});

	$('#manage-user').submit(function(e) {
		e.preventDefault();
		start_load()
		$.ajax({
			url: 'ajax.php?action=update_user',
			method: 'POST',
			data: $(this).serialize(),
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully saved", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)
				} else {
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})
</script>