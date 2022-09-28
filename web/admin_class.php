<?php
session_start();
ini_set('display_errors', 1);
class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'db_connect.php';

		$this->db = $conn;
	}
	function __destruct()
	{
		$this->db->close();
		connectdb();

		ob_end_flush();
	}

	function login()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where email = '" . $email . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}

	function save_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass')) && !is_numeric($k)) {
				if ($k == 'password')
					$v = md5($v);
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM users where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save) {
			return 1;
		}
	}
	function update_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass', 'table')) && !is_numeric($k)) {
				if ($k == 'password')
					$v = md5($v);
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM users where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save) {
			foreach ($_POST as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		}
	}
	function delete_user()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_page_img()
	{
		extract($_POST);
		if ($_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
			if ($move) {
				$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
				$hostName = $_SERVER['HTTP_HOST'];
				$path = explode('/', $_SERVER['PHP_SELF']);
				$currentPath = '/' . $path[1];
				// $pathInfo = pathinfo($currentPath); 

				return json_encode(array('link' => $protocol . '://' . $hostName . $currentPath . '/admin/assets/uploads/' . $fname));
			}
		}
	}

	function save_survey()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO survey_set set $data");
		} else {
			$save = $this->db->query("UPDATE survey_set set $data where id = $id");
		}

		if ($save)
			return 1;
	}
	function delete_survey()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM survey_set where id = " . $id);
		if ($delete) {
			return 1;
		}
	}

	function save_question()
	{
		extract($_POST);
		$data = " survey_id=$sid ";
		$data .= ", question='$question' ";
		$data .= ", type='$type' ";
		if ($type != 'textfield_s') {
			$arr = array();
			foreach ($label as $k => $v) {
				$i = 0;
				while ($i == 0) {
					$k = substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5 / strlen($x)))), 1, 5);
					if (!isset($arr[$k]))
						$i = 1;
				}
				$arr[$k] = $v;
			}
			$data .= ", frm_option='" . json_encode($arr) . "' ";
		} else {
			$data .= ", frm_option='' ";
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO questions set $data");
		} else {
			$save = $this->db->query("UPDATE questions set $data where id = $id");
		}

		if ($save)
			return 1;
	}
	function delete_question()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM questions where id = " . $id);
		if ($delete) {
			return 1;
		}
	}
	function action_update_qsort()
	{
		extract($_POST);
		$i = 0;
		foreach ($qid as $k => $v) {
			$i++;
			$update[] = $this->db->query("UPDATE questions set order_by = $i where id = $v");
		}
		if (isset($update))
			return 1;
	}
	function save_answer()
	{
		extract($_POST);
		foreach ($qid as $k => $v) {
			$data = " survey_id=$survey_id ";
			$data .= ", question_id='$qid[$k]' ";
			$data .= ", user_id='{$_SESSION['login_id']}' ";
			if ($type[$k] == 'check_opt') {
				$data .= ", answer='[" . implode("],[", $answer[$k]) . "]' ";
			} else {
				$data .= ", answer='$answer[$k]' ";
			}
			$save[] = $this->db->query("INSERT INTO answers set $data");
		}


		if (isset($save))
			return 1;
	}
	function delete_comment()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM comments where id = " . $id);
		if ($delete) {
			return 1;
		}
	}
	function save_news()
	{
		extract($_POST);
		$data = "";
		// foreach($_POST as $k => $v){
		// 	if(!in_array($k, array('id')) && !is_numeric($k)){
		// 		if(empty($data)){
		// 			$data .= " $k='$v' ";
		// 		}else{
		// 			$data .= ", $k='$v' ";
		// 		}
		// 	}
		// }

		$img = $_FILES["nupload"]["name"]; //stores the original filename from the client
		$tmp = $_FILES["nupload"]["tmp_name"]; //stores the name of the designated temporary file
		$errorimg = $_FILES["nupload"]["error"]; //stores any error code resulting from the transfer

		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt', 'pdf'); // valid extensions
		$path = 'assets/dist/uploads/'; // upload directory

		if (!empty($_POST['ntitle']) and !empty($_POST['ncontent']) and !empty($_POST['nauthor']) and $_FILES['nupload']) {
			$img = $_FILES['nupload']['name'];
			$tmp = $_FILES['nupload']['tmp_name'];
			$size = $_FILES['nupload']['size'];
			// get uploaded file's extension
			$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
			// can upload same image using rand function
			$final_image = rand(1000, 1000000) . $img;
			// check's valid format
			if (in_array($ext, $valid_extensions)) {
				$path = $path . strtolower($final_image);
				// $data = $data.$_FILES["nupload"]["name"];
				// echo $data;
				if ($size > 2097152) {
					echo 'File size must be less than 15 MB';
				} else {
					if (move_uploaded_file($tmp, $path)) {
						// echo "<img src='$path' />";
						// $uploads = $_FILES["nupload"]["name"];
						// $data2 = $data.", nupload='$path'";
						// $data .= ", nupload='$path' ";
						// $data.= ", nupload = '$path'";
						// echo $data2;

						$title = $_POST['ntitle'];
						$content = $_POST['ncontent'];
						$author = $_POST['nauthor'];
						// $save = $this->db->query("INSERT INTO newsfeed (title,content,uploads,author) VALUES ('".$title."','".$content."','".md5($path)."','".$author."')");
						$save = $this->db->query("INSERT INTO newsfeed (title,content,uploads,author) VALUES ('" . $title . "','" . $content . "','" . $path . "','" . $author . "')");
						// $save = $this->db->query("INSERT INTO newsfeed set $data");
						if ($save)
							// echo "success ";
							return 1;
					}
				}
			} else {
				echo 'invalid';
			}
		}
	}

	function delete_news()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM newsfeed where id = " . $id);
		if ($delete) {
			return 1;
		}
	}

	function delete_takers()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM answers where user_id = " . $id);
		// ("DELETE S.id as Survey_id, U.id as U_id, A.id as Answer_id, S.title as Survey_Title, concat(lastname,', ',firstname,' ',middlename) as name, A.date_created as dateC FROM answers A INNER JOIN users U ON U.id = A.user_id INNER JOIN survey_set S ON S.id = A.survey_id WHERE survey_id = ".$_GET['id']." GROUP BY U.id");

		if ($delete)
			return 1;
	}

	function delete_appnt()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM appointment where id = " . $id);

		if ($delete)
			return 1;
	}

	function save_appointment()
	{
		extract($_POST);

		$content = $_POST['content'];
		$appdate = $_POST['appointment_date'];
		$loginid = $_SESSION["login_id"];
		$date = date("Y-m-d H:i:s", strtotime($appdate));

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO appointment (student_id,content,app_date,app_status) VALUES ((SELECT id FROM users where id='" . $loginid . "'),'" . $content . "','" . $date . "','waiting') ");
		} else {
			$save = $this->db->query("UPDATE appointment set student_id='" . $studentid . "',content='" . $content . "',app_date='" . $date . "' WHERE id = $id");
		}

		if (isset($save))
			return 1;
	}

	function noti_appnt()
	{
		echo extract($_POST);

		$val = $_POST['val'];
		$id = $_POST['id'];

		// echo $val;
		// echo $id;
		$update = $this->db->query("UPDATE appointment set app_status= '" . $val . "' WHERE id = '" . $id . "'");
		// UPDATE users set $data where id = $id
		// $save = $this->db->query("UPDATE questions set $data where id = $id");

		// $delete = $this->db->query("DELETE FROM questions where id = ".$id);

		if (isset($update))
			return 1;
	}

	function save_personal()
	{
		extract($_POST);

		$loginid = $_SESSION["login_id"];
		// $studentid = $_POST['studentid'];
		// $id = 1;
		$img = $_FILES["nupload"]["name"]; //stores the original filename from the client
		$tmp = $_FILES["nupload"]["tmp_name"]; //stores the name of the designated temporary file
		$errorimg = $_FILES["nupload"]["error"]; //stores any error code resulting from the transfer

		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt', 'pdf'); // valid extensions
		$path = 'assets/dist/uploads/'; // upload directory


		$fname = $_POST['fname'];
		$gender = $_POST['gender'];
		$smcid = $_POST['smcid'];
		$paddress = $_POST['paddress'];
		// $Gradelevel = $_POST['Gradelevel'];
		$mother = $_POST['mother'];
		$father = $_POST['father'];

		$bday = $_POST['bday'];
		$civilstat = $_POST['civilstat'];
		$religion = $_POST['religion'];
		$cphone = $_POST['cphone'];
		// $strand = $_POST['strand'];
		$pa_addr = $_POST['pa_addr'];
		$pa_cont = $_POST['pa_cont'];

		// if(!empty($_POST['ntitle']) AND !empty($_POST['ncontent']) AND !empty($_POST['nauthor']) AND $_FILES['nupload']){
		$img = $_FILES['nupload']['name'];
		$tmp = $_FILES['nupload']['tmp_name'];
		$size = $_FILES['nupload']['size'];

		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000, 1000000) . $img;
		// check's valid format
		if (in_array($ext, $valid_extensions)) {
			$path = $path . strtolower($final_image);
			// $data = $data.$_FILES["nupload"]["name"];
			// echo $data;
			if ($size > 2097152) {
				echo 'File size must be less than 15 MB';
			} else {
				if (move_uploaded_file($tmp, $path)) {

					$check = $this->db->query("SELECT id FROM student WHERE id = '" . $loginid . "'");
					if (mysqli_num_rows($check) > 0) {
						$save = $this->db->query("UPDATE student set studentname='" . $fname . "',gender='" . $gender . "',school_id='" . $smcid . "',paddress='" . $paddress . "',birthdate='" . $bday . "',civilstatus='" . $civilstat . "',religion='" . $religion . "',contact='" . $cphone . "',mothersname='" . $mother . "',fathersname='" . $father . "',parents_address='" . $pa_addr . "',parents_contact='" . $pa_cont . "',nupload='" . $path . "' WHERE id = $loginid");
					} else {
						$save = $this->db->query("INSERT INTO student (id,userid,studentname,gender,school_id,paddress,birthdate,civilstatus,religion,contact,mothersname,fathersname,parents_address,parents_contact,nupload) VALUES ((SELECT id FROM users where id='" . $loginid . "'),(SELECT id FROM users where id='" . $loginid . "'),'" . $fname . "','" . $gender . "','" . $smcid . "','" . $paddress . "','" . $bday . "','" . $civilstat . "','" . $religion . "','" . $cphone . "','" . $mother . "','" . $father . "','" . $pa_addr . "','" . $pa_cont . "','" . $path . "') ");
					}
					if ($save)
						return 1;
				}
			}
		} else {
			echo 'invalid';
		}
	}


	function save_student()
	{
		extract($_POST);

		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
		$path = 'assets/dist/uploads/'; // upload directory

		$fname = $_POST['firstname'];
		$mname = $_POST['middlename'];
		$lname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$smcid = $_POST['smc_id'];
		$yrlvl = $_POST['year_level'];
		$paddress = $_POST['paddress'];
		$email = $_POST['email'];
		$bday = $_POST['birthdate'];
		$civil = $_POST['civilstatus'];
		$dept = $_POST['department'];
		$course = $_POST['course'];
		$religion = $_POST['religion'];
		$contact = $_POST['contact'];
		$mother = $_POST['mothersname'];
		$father = $_POST['fathersname'];
		$pa_addr = $_POST['parents_address'];
		$pa_cont = $_POST['parents_contact'];


		// if(!empty($_POST['ntitle']) AND !empty($_POST['ncontent']) AND !empty($_POST['nauthor']) AND $_FILES['nupload']){
		$img = $_FILES['profile_pic']['name'];
		$tmp = $_FILES['profile_pic']['tmp_name'];
		$size = $_FILES['profile_pic']['size'];
		$errorimg = $_FILES["profile_pic"]["error"]; //stores any error code resulting from the transfer

		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000, 1000000) . $img;
		// check's valid format
		if (in_array($ext, $valid_extensions)) {
			$path = $path . strtolower($final_image);
			// $data = $data.$_FILES["nupload"]["name"];
			// echo $data;
			if ($size > 2097152) {
				echo 'File size must be less than 15 MB';
			} else {
				if (move_uploaded_file($tmp, $path)) {
					$save = $this->db->query("INSERT INTO student (firstname,middlename,lastname,gender,smc_id,year_level,paddress,email,birthdate,civilstatus,department,course,religion,contact,mothersname,fathersname,parents_address,parents_contact,profile_pic) 
					VALUES 
					('" . $fname . "','" . $mname . "','" . $lname . "','" . $gender . "','" . $smcid . "','" . $yrlvl . "','" . $paddress . "','" . $email . "','" . $bday . "','" . $civil. "','" . $dept . "','" . $course . "','" . $religion . "','" . $contact . "','" . $mother . "','" . $father . "','" . $pa_addr . "','" . $pa_cont . "','" . $path . "') ");
					if ($save)
						return 1;
				}
			}
		} else {
			echo 'invalid';
		}
	}
}
