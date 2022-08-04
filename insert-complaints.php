<?php
include('session.php');
$iduser = mysqli_real_escape_string($db,$_POST['_selected']);
$type = mysqli_real_escape_string($db,$_POST['_type']);
$reason = mysqli_real_escape_string($db,$_POST['_reason']);
$dovezi = mysqli_real_escape_string($db,$_POST['dovezi']);
$description = mysqli_real_escape_string($db,$_POST['description']);
$username = $_SESSION['Username'];

$rezultat1 = $db->query("SELECT * FROM `complaints` WHERE Username='".$_SESSION['Username']."' ORDER BY ID DESC");
$verificare30min = $rezultat1->fetch_assoc();

if(time() - $verificare30min["Date"] < 1800){
	go("/");
}else{
	if(!isset($_SESSION['Username'])) {
		go("/");
	}else{
		$rezultat = $db->query("SELECT * FROM `users` WHERE id='".$iduser."'");
		$numefactiune = $rezultat->fetch_assoc();
		if($numefactiune["name"] == $username) {
			$_SESSION['errorinsertapplication'] = '
			<div class="alert alert-danger">
				Nu te poti reclama singur.<br>
			</div>
			';
			go($_POST['link']);
		}else if("" == trim($iduser)) {
			$_SESSION['errorinsertapplication'] = '
			<div class="alert alert-danger">
				Complete all fields<br>
			</div>
			';
			go($_POST['link']);
		}else{
			$sql = "INSERT INTO `complaints`(`Username`, `UsernameR`, `Type`, `Reason`, `Proofs`, `Details`, `Date`) VALUES ('$username','".$numefactiune["name"]."','".$type."','".$reason."','".$dovezi."','".$description."', '".time()."')";

			if ($db->query($sql) === TRUE) {
				go("complaints.php");
			}
		}
	}
}