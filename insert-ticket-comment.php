<?php
include('session.php');

if(isset($_SESSION['Username'])) {
$_comment = mysqli_real_escape_string($db, $_POST['_comment']);
$link = mysqli_real_escape_string($db, $_POST['link']);
$id = mysqli_real_escape_string($db, $_POST['id']);

$result = $db->query("SELECT * FROM `tickets` WHERE ID='".$id."' ORDER BY ID DESC");
$check = $result->fetch_assoc();

$result = $db->query("SELECT * FROM `users` WHERE name='".$_SESSION["Username"]."'");
$check1 = $result->fetch_assoc();

if($check["Username"] == $_SESSION['Username'] || $check1["Admin"] > 0) {
	if(!isset($_SESSION['Username'])) {
		go("/");
	}else{
		
	$sql = "INSERT INTO `tickets-comments`(`Username`, `Text`, `Date`, `TicketID`) VALUES ('".$_SESSION['Username']."', '$_comment', '".time()."','$id')";

	if ($db->query($sql) === TRUE) {
		go("".$link."");
	}
	}
	}else{
		go("/");
	}
}else{
	go("/");
}
?>