<?php
include('session.php');

if(isset($_SESSION['Username'])) {
$result = $db->query("SELECT * FROM `users` WHERE name='".$_SESSION['Username']."'");
$check = $result->fetch_assoc();
$_comment = mysqli_real_escape_string($db, $_POST['_comment']);
$link = mysqli_real_escape_string($db, $_POST['link']);
$id = mysqli_real_escape_string($db, $_POST['id']);

if(!isset($_SESSION['Username'])) {
	go("/");
}else{
	
$sql = "INSERT INTO `complaints-comments`(`Username`, `Text`, `Date`, `ComplaintID`) VALUES ('".$_SESSION['Username']."', '$_comment', '".time()."','$id')";

if ($db->query($sql) === TRUE) {
    go("".$link."");
}
}
}else{
	go("/");
}
?>