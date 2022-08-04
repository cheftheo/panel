<?php
include('session.php');
$i = mysqli_real_escape_string($db,$_POST['id']);
$l = mysqli_real_escape_string($db,$_POST['link']);

$result12 = $db->query("SELECT * from users WHERE name='".$_SESSION['Username']."'");
$row = $result12->fetch_assoc();
if(isset($_SESSION['Username'])) {
	if($row["Admin"] > 0) {
		$sql = "UPDATE `unban-panel` SET `Status`='1', Now='1' WHERE ID='$i'";

		if ($db->query($sql) === TRUE) {
			go($l);
		}
	}else{
		go("/");
	}
}