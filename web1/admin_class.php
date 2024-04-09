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

		$this->db = connectdb();
	}
	function __destruct()
	{
		$this->db->close();
		connectdb();

		ob_end_flush();
	}


	// ========================================================LOGIN============================================================


	function login()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . md5($password) . "' ");
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


	// =======================================================USER=============================================================


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
		$check = $this->db->query("SELECT * FROM users where username ='$username' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
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

	function edit_user()
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
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save)
			return 1;
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


	// =================================================NEW DOCUMENT=======================================================================

	function save_documents()
	{
		extract($_POST);
		$data = "";

		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'docx', 'doc', 'pptx', 'xlsx', 'txt', 'zip'); // valid extensions
		$path = 'assets/dist/uploads/'; // upload directory

		$user_id = $_POST['user_id'];
		$tracking_number = $_POST['tracking_number'];
		$title = $_POST['title'];
		$originating_office_id = $_POST['originating_office_id'];
		$recipient_office_id = $_POST['recipient_office_id'];
		$document_type_id = $_POST['document_type_id'];
		$purpose = $_POST['purpose'];
		$remarks = $_POST['remarks'];

		// if(!empty($_POST['ntitle']) AND !empty($_POST['ncontent']) AND !empty($_POST['nauthor']) AND $_FILES['nupload']){
		$img = $_FILES['uploaded_files']['name'];
		$tmp = $_FILES['uploaded_files']['tmp_name'];
		$size = $_FILES['uploaded_files']['size'];
		$errorimg = $_FILES["uploaded_files"]["error"]; //stores any error code resulting from the transfer

		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000, 1000000) . $img;
		// check's valid format

		if (in_array($ext, $valid_extensions)) {
			$path = $path . strtolower($final_image);
			if ($size > 2097152) {
				echo 'File size must be less than 15 MB';
			} else {
				if (move_uploaded_file($tmp, $path)) {

					$check = $this->db->query("SELECT id FROM student WHERE id = '" . $user_id . "'");

					if (mysqli_num_rows($check) > 0) {

						$save = $this->db->query("UPDATE `student`
						set
						   user_id='" . $user_id . "',
						   tracking_number='" . $tracking_number . "',
						   title='" . $title . "',
						   recipient='" . $recipient . "',
						   type='" . $type . "',
						   purpose='" . $purpose . "',
						   remarks='" . $remarks . "',
						   uploaded_files='" . $path . "' WHERE id ='" . $user_id . "' ");
					} else {
						$save = $this->db->query("INSERT INTO documents (user_id,tracking_number,title,originating_office_id,recipient_office_id,document_type_id,purpose,remarks,uploaded_files, time_receive, time_release) 
					VALUES 
					('" . $user_id . "','" . $tracking_number . "','" . $title . "','" . $originating_office_id . "','" . $recipient_office_id . "','" . $document_type_id . "','" . $purpose . "','" . $remarks . "','" . $path . "', now(), now()) ");
					}

					if ($save)
						// $this->db->query("INSERT INTO document_routes (tracking_number, current_office_id, current_recepient_office_id, remarks) VALUES ('" . $tracking_number . "','" . $originating_office_id . "','" . $recipient_office_id . "') ");
						return 1;
					exit;
				}
			}
		} else {
			echo 'invalid';
		}
	}


	function delete_documents()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM documents where id = " . $id);
		if ($delete)
			return 1;
	}




	// =================================================OFFICE=======================================================================


	function save_office()
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
			$save = $this->db->query("INSERT INTO office set $data");
		} else {
			$save = $this->db->query("UPDATE office set $data where office_id = $id");
		}

		if ($save)
			return 1;
	}


	// function delete_office()
	// {
	// 	extract($_POST);
	// 	$delete = $this->db->query("DELETE FROM office where office_id = " . $id);
	// 	if ($delete)
	// 		return 1;
	// }

	function delete_office()
	{
		extract($_POST);
		$id = $_POST['id'];
		$save = $this->db->query("DELETE FROM office where office_id = " . $id);
		if ($save)
			return 1;
	}


	// =================================================DOCUMENT CLASSIFICATION=======================================================================


	function save_classification()
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
			$save = $this->db->query("INSERT INTO document_classification set $data");
		} else {
			$save = $this->db->query("UPDATE document_classification set $data where document_classification_id = $id");
		}

		if ($save)
			return 1;
	}


	function delete_classification()
	{
		extract($_POST);
		$id = $_POST['id'];
		$save = $this->db->query("DELETE FROM document_classification where document_classification_id = " . $id);
		if ($save)
			return 1;
	}

	// =================================================DOCUMENT TYPE=======================================================================


	function save_type()
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
			$save = $this->db->query("INSERT INTO document_type set $data");
		} else {
			$save = $this->db->query("UPDATE document_type set $data where document_id = $id");
		}

		if ($save)
			return 1;
	}


	function delete_type()
	{
		extract($_POST);
		$id = $_POST['id'];
		$save = $this->db->query("DELETE FROM document where document_id = " . $id);
		if ($save)
			return 1;
	}

	// =================================================RECEIVED IN HOME=======================================================================


	function receive_docs_home()
	{
		extract($_POST);

		// $user_id = $_SESSION["login_id"];
		$tracking_num = $_POST['tracking_number'];
		$current_office_id = $_SESSION['login_office_id'];

		// Check for duplicates
		$qry = $this->db->query("SELECT *  FROM documents WHERE tracking_number = '" . $tracking_number . "' AND recipient_office_id = '" . $current_office_id . "'");

		// Check if user/office have access
		if ($qry->num_rows > 0) {
			// Check if user/office have access
			while ($row = $qry->fetch_assoc()) :
				$document_id = $row['document_id'];
				$user_id = $row['user_id'];
				$tracking_number = $row['tracking_number'];
				$title = $row['title'];
				$originating_office_id = $row['originating_office_id'];
				$recipient_office_id = $row['recipient_office_id'];
				$document_type_id = $row['document_type_id'];
				$purpose = $row['purpose'];
				$remarks = $row['remarks'];
			endwhile;

			$rsave = $this->db->query("INSERT INTO documents (user_id,tracking_number,title,originating_office_id,current_office_id,time_receive,resource_id ) 
			VALUES 
			('" . $user_id . "','" . $tracking_num . "','" . $title . "','" . $originating_office_id . "','" . $current_office_id . "', now(), '" . $document_id . "' ) ");
		} else {
			return 3;
			exit;
		}

		if ($rsave) {
			$save = $this->db->query("UPDATE `documents` set current_office_id=NULL, recipient_office_id=NULL WHERE tracking_number = '" . $tracking_number . "' AND resource_id IS NULL");
		}

		if ($save) {
			$save = $this->db->query("UPDATE `documents` set doc_status='done' WHERE document_id = '" . $document_id . "' ");
			return $tracking_number;
		}
		exit;
	}

	// =================================================RECEIVED IN LIST=======================================================================


	function receive_docs()
	{
		extract($_POST);

		$user_id = $_SESSION["login_id"];
		$tracking_number = $_POST['tracking_number'];
		$document_id = $_POST['document_id'];
		$originating_office_id = $_POST['originating_office_id'];
		$current_office_id = $_SESSION['login_office_id'];

		$qry = $this->db->query("SELECT *  FROM documents WHERE tracking_number = '" . $tracking_number . "' AND recipient_office_id = '" . $current_office_id . "'");

		// Check if user/office have access
		if ($qry->num_rows > 0) {
			while ($row = $qry->fetch_assoc()) :
				$document_id = $row['document_id'];
				$user_id = $row['user_id'];
				$tracking_number = $row['tracking_number'];
				$title = $row['title'];
				$originating_office_id = $row['originating_office_id'];
				$recipient_office_id = $row['recipient_office_id'];
				$document_type_id = $row['document_type_id'];
				$purpose = $row['purpose'];
				$remarks = $row['remarks'];
			endwhile;

			$rsave = $this->db->query("INSERT INTO documents (user_id,tracking_number,title,originating_office_id,current_office_id,time_receive,resource_id ) 
			VALUES 
			('" . $user_id . "','" . $tracking_number . "','" . $title . "','" . $originating_office_id . "','" . $current_office_id . "', now(), '" . $document_id . "' ) ");
		} else {
			return 3;
			exit;
		}

		if ($rsave) {
			$save = $this->db->query("UPDATE `documents` set current_office_id=NULL, recipient_office_id=NULL WHERE tracking_number = '" . $tracking_number . "' AND resource_id IS NULL ");
		}

		if ($save) {
			$save = $this->db->query("UPDATE `documents` set doc_status='Done' WHERE document_id = '" . $document_id . "' ");
			return $tracking_number;
		}
		exit;
	}

	// =================================================RELEASED=======================================================================


	function release_docs()
	{
		extract($_POST);

		$document_id = $_POST['document_id'];
		$recipient_office_id = $_POST['recipient_office_id'];
		$document_type_id = $_POST['document_type_id'];
		$purpose = $_POST['purpose'];
		$remarks = $_POST['remarks'];
		$current_office_id = $_SESSION['login_office_id'];

		// if(!empty($_POST['ntitle']) AND !empty($_POST['ncontent']) AND !empty($_POST['nauthor']) AND $_FILES['nupload']){
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'docx', 'doc', 'pptx', 'xlsx', 'txt', 'zip'); // valid extensions
		$path = 'assets/dist/uploads/'; // upload directory
		$img = $_FILES['uploaded_files']['name'];
		$tmp = $_FILES['uploaded_files']['tmp_name'];
		$size = $_FILES['uploaded_files']['size'];
		$errorimg = $_FILES["uploaded_files"]["error"]; //stores any error code resulting from the transfer

		// get uploaded file's extension
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_image = rand(1000, 1000000) . $img;
		// check's valid format

		// Check if user/office have access
		$qry = $this->db->query("SELECT *  FROM documents WHERE tracking_number = '" . $tracking_number . "' AND current_office_id = '" . $current_office_id . "' AND document_id = '" . $document_id . "' ");

		if ($qry->num_rows > 0) {
			if (file_exists($_FILES['uploaded_files']['tmp_name']) || is_uploaded_file($_FILES['uploaded_files']['tmp_name'])) {
				if (in_array($ext, $valid_extensions)) {
					$path = $path . strtolower($final_image);
					if ($size > 15728640) {
						echo 'File size must be less than 15 MB';
						return 2;
						exit;
					} else {
						if (move_uploaded_file($tmp, $path)) {
							$save = $this->db->query("UPDATE `documents`
						set
						   recipient_office_id='" . $recipient_office_id . "',
						   document_type_id='" . $document_type_id . "',
						   purpose='" . $purpose . "',
						   remarks='" . $remarks . "',
						   uploaded_files='" . $path . "',
						   time_release= now()
						   WHERE document_id ='" . $document_id . "' 
						   ");
						}
					}
				}
			} else {
				$save = $this->db->query("UPDATE `documents`
						set
						   recipient_office_id='" . $recipient_office_id . "',
						   document_type_id='" . $document_type_id . "',
						   purpose='" . $purpose . "',
						   remarks='" . $remarks . "',
						   uploaded_files= NULL,
						   time_release= now()
						   WHERE document_id ='" . $document_id . "' 
						   ");
			}
		} else {
			return 3;
		}

		if ($save) {
			$save = $this->db->query("UPDATE `documents` set recipient_office_id='" . $recipient_office_id . "' WHERE tracking_number = '" . $tracking_number . "' AND resource_id IS NULL ");
			return $tracking_number;
		}

		exit;
	}

	// =================================================ENDPOINT=======================================================================

	function endpoint_docs()
	{
		extract($_POST);

		$user_id = $_SESSION["login_id"];
		$tracking_number = $_POST['tracking_number'];
		$document_id = str_replace(' ', '', $_POST['document_id']);
		$current_office_id = $_SESSION['login_office_id'];
		$remarks = $_POST['remarks'];


		$qry = $this->db->query("SELECT * FROM documents WHERE doc_status = 'Tagged as Endpoint' AND tracking_number = '" . $tracking_number . "' ");

		// Check if this tracking number is already in the endpoint
		if ($qry->num_rows == 0) {

			// Check if your office have access / if your office havent received it yet
			$qry2 = $this->db->query("SELECT *  FROM documents WHERE tracking_number = '" . $tracking_number . "' AND current_office_id = '" . $current_office_id . "' AND document_id = '" . $document_id . "' ");
			if ($qry2->num_rows > 0) {
				while ($row = $qry2->fetch_assoc()) :
					$check_recipient = $row['recipient_office_id'];
				endwhile;

				// Check if your office if your office have released it already
				if ($check_recipient == NULL) {
					$save = $this->db->query("UPDATE `documents`
						set
						   recipient_office_id ='" . $current_office_id . "',
						   remarks='" . $remarks . "',
						   doc_status= 'Tagged as Endpoint',
						   time_release= now()
						   WHERE document_id ='" . $document_id . "' 
						   ");
				} else {
					return 4;
					exit;
				}
			} else {
				return 2;
				exit;
			}
		} else {
			return 3;
			exit;
		}

		if ($save) {
			return $tracking_number;
		}

		exit;
	}

	// =================================================BACKUP DB=======================================================================

	function backupdb()
	{
		extract($_POST);

		$dbname = $_POST['dbname'];

		define("BACKUP_PATH", "C:/xampp8/htdocs/SMCDean/web/backup");

		$server_name   = "localhost";
		$username      = "root";
		$password      = "";
		$database_name = "document_management_db";
		$date_string   = rand();
		$output = 2;
		$retreave = 1;

		$cmd = "C:/xampp8/mysql/bin/mysqldump --host={$server_name} --user={$username} --password={$password} --single-transaction --routines {$database_name} > " . "C:/xampp8/htdocs/SMCDean/web/backup/" . "{$date_string}_{$database_name}.sql";

		$save = exec($cmd, $output, $retrieve);

		// echo("<script>console.log('PHP: " . $save ."');</script>");

		if ($retreave == 1) {
			return $retreave;
		}
	}
}
