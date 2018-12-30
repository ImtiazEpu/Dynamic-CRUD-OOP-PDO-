<?php
include "Database.php";
include "Session.php";
Session::init();
$db = new Database();
$table = "tbl_student";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
	$studentData = array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone'],
	);
	$insert = $db->insert($table, $studentData);
	if ($insert) {
		$msg = '<div class="alert alert-success alert-dissmissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Congratulations! </strong> Data inserted successfully</div>';
	} else {
		$msg = '<div class="alert alert-danger alert-dissmissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Oops! </strong> Data Not inserted</div>';
	}
	Session::set('msg', $msg);
	echo "<script type='text/javascript'>window.top.location='../index.php';</script>";

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
	$id = $_POST['id'];
	if (!empty($id)) {
		$studentData = array(
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
		);
		$condition = array('id' => $id);
		$update = $db->update($table, $studentData, $condition);
		if ($update) {
			$msg = '<div class="alert alert-success alert-dissmissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Congratulations! </strong> Data Updated successfully</div>';
		} else {
			$msg = '<div class="alert alert-danger alert-dissmissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Oops! </strong> Please Edit your data & Update</div>';
		}
		Session::set('msg', $msg);
		echo "<script type='text/javascript'>window.top.location='../index.php';</script>";
	}
} elseif (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'delete') {
		$id = $_GET['id'];
		if (!empty($id)) {
			$condition = array('id' => $id);
			$delete = $db->delete($table, $condition);
			if ($delete) {
				$msg = '<div class="alert alert-success alert-dissmissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Congratulations! </strong> Data Deleted successfully</div>';
			} else {
				$msg = '<div class="alert alert-danger alert-dissmissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Oops! </strong> Data Not Deleted</div>';
			}
			Session::set('msg', $msg);
			echo "<script type='text/javascript'>window.top.location='../index.php';</script>";
		}
	}

}
?>