<!doctype html>
<html lang="en">

<?php
session_start();
include('./db_connect.php');
include('./header.php');
if (isset($_SESSION['user_id'])) {
	header("location:index.php?page=home");?>
	<meta http-equiv="refresh" content="0;url=index.php?page=home">
	<?php die();
}
?>

<head>
	<title>Login</title>
	<?php include('./header.php'); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body class="img js-fullheight" style="background-image: url(images/smcbg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">SMC Dean's</h2>
					<h2 class="heading-section">Document Management System</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Have an account?</h3>
						<form action="#" class="signin-form" id="login-form">
							<div class="form-group">
								<input id="username" name="username" type="text" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input id="password " name="password" type="password" class="form-control password-field" placeholder="Password" required>
								<span toggle=".password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button class="form-control btn btn-primary submit px-3">
									<i style="font-size: 1.2em; color: white;" class="pr-2 fa-regular fa-hand-pointer"></i>
									Sign In
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$('#login-form').submit(function(e) {
			e.preventDefault()
			$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
			if ($(this).find('.alert-danger').length > 0)
				$(this).find('.alert-danger').remove();
			$.ajax({
				url: 'ajax.php?action=login',
				method: 'POST',
				data: $(this).serialize(),
				error: err => {
					console.log(err)
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

				},
				success: function(resp) {
					if (resp == 1) {
						location.href = 'index.php?page=home';
					} else {
						$('#login-form').prepend(
							'<div class="alert alert-danger">Username or password is incorrect.</div>')
						$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
					}
				}
			})
		})
		$('.number').on('input', function() {
			var val = $(this).val()
			val = val.replace(/[^0-9 \,]/, '');
			$(this).val(val)
		})
	</script>

</body>

</html>