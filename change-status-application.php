<?php
include('session.php');
if(isset($_POST['teste'])) {
	$a = mysqli_real_escape_string($db, $_POST['teste']);
	$b = mysqli_real_escape_string($db, $_GET['id']);
	check_if_user_is_leader_to_x_faction1($_SESSION['Username'], $b);
	$rezultat = $db->query("SELECT * FROM `users` WHERE name='".mysqli_real_escape_string($db, $_GET['name'])."'");
	$numefactiune = $rezultat->fetch_assoc();
	$sql = "UPDATE `faction_apply` SET `Status`='2' WHERE FactionID='$b' AND Username='".mysqli_real_escape_string($db, $_GET['name'])."'";
	if ($db->query($sql) === TRUE) {
		go($_POST['link']);
	}
}
if(isset($_POST['respinge'])) {
	$a = mysqli_real_escape_string($db,$_POST['respinge']);
	$b = mysqli_real_escape_string($db,$_GET['id']);
	check_if_user_is_leader_to_x_faction1($_SESSION['Username'], $b);
	$rezultat = $db->query("SELECT * FROM `users` WHERE name='".mysqli_real_escape_string($db, $_GET['name'])."'");
	$numefactiune = $rezultat->fetch_assoc();
	$sql = "UPDATE `faction_apply` SET `Status`='3' WHERE FactionID='$b' AND Username='".mysqli_real_escape_string($db, $_GET['name'])."'";
	if ($db->query($sql) === TRUE) {
		go($_POST['link']);
	}

}
if(isset($_GET['type'])) {
	if($_GET['type'] == "player") {
		$rezultat = $db->query("SELECT * FROM `faction_apply` WHERE ID='".mysqli_real_escape_string($db,$_GET['id'])."'");
		$numefactiune = $rezultat->fetch_assoc();
		if($numefactiune["Username"] == $_SESSION['Username']) {
			$sql = "DELETE FROM faction_apply WHERE ID='".mysqli_real_escape_string($db,$_GET['id'])."'";
			if ($db->query($sql) === TRUE) {
				go("/");
			}
		}else{
			//echo "Nu esti creatorul aplicației";
			go("/");
		}
	}
}