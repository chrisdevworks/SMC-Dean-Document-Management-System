<?php 
include('db_connect.php');
session_start();
$utype = array('','users','staff','customers');
if(isset($_GET['id'])){
// $user = $conn->query("SELECT * FROM {$utype[$_SESSION['login_type']]} where id =".$_GET['id']);
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-user">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">First Name</label>
			<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Middle Name</label>
			<input type="text" name="middlename" id="middlename" class="form-control" value="<?php echo isset($meta['middlename']) ? $meta['middlename']: '' ?>">
		</div>
		<div class="form-group">
			<label for="name">Last Name</label>
			<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Email</label>
			<input type="text" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required  autocomplete="off">
		</div>
		<div class="form-group" >
			<label for="password">Password</label>
			<div class="input-group mb-3">
				<input type="password" name="password" id="password"  class="form-control" value="" autocomplete="off">
                <div class="input-group-append">
                	<span class="input-group-text"><i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
                </div>
            </div>
			<!-- <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i> -->
			<!-- <input type="checkbox" id="togglePassword" > Show Password <br> -->
			<!-- <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input" id="togglePassword">
                <label class="custom-control-label" for="togglePassword">Toggle to Show Password</label>
            </div> -->
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		</div>
		
		

	</form>
</div>
<script>
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');
	
	togglePassword.addEventListener('click', function (e) {
		// toggle the type attribute
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		// toggle the eye slash icon
		this.classList.toggle('fa-eye-slash');
	});
	
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=update_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})

</script>