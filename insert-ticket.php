<?php
include('session.php');
$t = mysqli_real_escape_string($db, $_POST['_type']);
$p = mysqli_real_escape_string($db, $_POST['_priority']);
$d = mysqli_real_escape_string($db, $_POST['description']);

$rezultat1 = $db->query("SELECT * FROM `tickets` WHERE Username='".$_SESSION['Username']."' ORDER BY ID DESC");
$verificare30min = $rezultat1->fetch_assoc();

if(time() - $verificare30min["Date"] < 1800){
	go("/");
}else{
	if(isset($_SESSION['Username'])) {
		if($t > 4) {
			go("/");
		}else if($p > 3) {
			go("/");
		}else{
			if($t == 0) {
				$reason = "Probleme generale (legate de joc)";
			}else if($t == 1) {
				$reason = "Probleme legate de securitatea conturilor";
			}else if($t == 2) {
				$reason = "Probleme legate de forum";
			}else if($t == 3) {
				$reason = "Inselatorii (recuperare bunuri/altceva)";
			}else if($t == 4) {
				$reason = "Raportare buguri";
			}

			if($p == 0) {
				$priority = "Scazuta";
			}else if($p == 1) {
				$priority = "Normala";
			}else if($p == 2) {
				$priority = "Mare";
			}else if($p == 3) {
				$priority = "Foarte mare";
			}

			$inserareticket = "INSERT INTO `tickets`(`Username`, `Type`, `Status`, `Priority`, `Description`, `Date`) VALUES ('".$_SESSION['Username']."', '$reason', '0', '$priority', '$d', '".time()."')";

			if ($db->query($inserareticket) === TRUE) {
				go("tickets.php");
			}
		}
	}else{
		go("/");
	}
}
		