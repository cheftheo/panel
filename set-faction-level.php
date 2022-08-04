<?php
include('session.php');

if(!isset($_SESSION['Username'])){
	go("/");
}else{
	check_if_user_have_acces_to_leader_panel($_SESSION['Username']);
	check_if_user_is_leader_to_x_faction($_SESSION['Username']);
	
	if($_GET['type'] == "onoroff") {
		//echo "Testare Type";
		if(isset($_POST['turnon'])) {
			$sql = "UPDATE `factions` SET `App`='".mysqli_real_escape_string($db, $_POST['turnon'])."' WHERE `ID`='".mysqli_real_escape_string($db, $_POST['id'])."'";
			if ($db->query($sql) === TRUE) {
				go($_POST['link']);
			}
		}
		if(isset($_POST['turnoff'])) {
			$sql = "UPDATE `factions` SET `App`='".mysqli_real_escape_string($db, $_POST['turnoff'])."' WHERE `ID`='".mysqli_real_escape_string($db, $_POST['id'])."'";
			if ($db->query($sql) === TRUE) {
				go($_POST['link']);
			}
		}
	}
	if($_GET['type'] == 'setlevel') {
		//echo "Testare Type";
			$sql = "UPDATE `factions` SET `MinLevel`='".mysqli_real_escape_string($db, $_POST['levl'])."' WHERE `ID`='".mysqli_real_escape_string($db, $_POST['id'])."'";
			if ($db->query($sql) === TRUE) {
				echo "<meta http-equiv=\"refresh\" content=\"0; url=".$_POST['link']."\">";
				go($_POST['link']);
			}
	}
}