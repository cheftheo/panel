<?php
include('session.php');
$rezultat = $db->query("SELECT * FROM `users` WHERE name='".$_SESSION['Username']."'");
$numefactiune = $rezultat->fetch_assoc();
$rezultat1 = $db->query("SELECT * FROM `factions` WHERE ID='".$_POST['id']."'");
$numefactiune1 = $rezultat1->fetch_assoc();
$rezultat2 = $db->query("SELECT * FROM `faction_apply` WHERE Username='".$_SESSION['Username']."' AND Status='1'");
$numefactiune2 = $rezultat2->fetch_assoc();
if($numefactiune["Leader"] > 0 || $numefactiune["Member"] > 0 || $numefactiune["FPunish"]) {
	go("/");
}else{
	if($numefactiune["Level"] < $numefactiune1["MinLevel"] || $numefactiune1["App"] == 0) {
		go("/");
	}else if($numefactiune2["Username"] == $_SESSION['Username']) {
		go("/");
	}else{
		if(isset($_POST['q_1'])) { $r1 = htmlspecialchars($_POST['q_1']); }
		if(isset($_POST['q_2'])) { $r2 = htmlspecialchars($_POST['q_2']); }
		if(isset($_POST['q_3'])) { $r3 = htmlspecialchars($_POST['q_3']); }
		if(isset($_POST['q_4'])) { $r4 = htmlspecialchars($_POST['q_4']); }
		if(isset($_POST['q_5'])) { $r5 = htmlspecialchars($_POST['q_5']); }
		if(isset($_POST['q_6'])) { $r6 = htmlspecialchars($_POST['q_6']); }
		if(isset($_POST['q_7'])) { $r7 = htmlspecialchars($_POST['q_7']); }
		if(isset($_POST['q_8'])) { $r8 = htmlspecialchars($_POST['q_8']); }
		if(isset($_POST['q_9'])) { $r9 = htmlspecialchars($_POST['q_9']); }
		if(isset($_POST['q_10'])) { $r10 = htmlspecialchars($_POST['q_10']); }
		if(isset($_POST['q_11'])) { $r11 = htmlspecialchars($_POST['q_11']); }
		if(isset($_POST['q_12'])) { $r12 = htmlspecialchars($_POST['q_12']); }
		if(isset($_POST['q_13'])) { $r13 = htmlspecialchars($_POST['q_13']); }
		if(isset($_POST['q_14'])) { $r14 = htmlspecialchars($_POST['q_14']); }
		if(isset($_POST['q_15'])) { $r15 = htmlspecialchars($_POST['q_15']); }
		if(!isset($_POST['q_1'])) { $r1 = ""; }
		if(!isset($_POST['q_2'])) { $r2 = ""; }
		if(!isset($_POST['q_3'])) { $r3 = ""; }
		if(!isset($_POST['q_4'])) { $r4 = ""; }
		if(!isset($_POST['q_5'])) { $r5 = ""; }
		if(!isset($_POST['q_6'])) { $r6 = ""; }
		if(!isset($_POST['q_7'])) { $r7 = ""; }
		if(!isset($_POST['q_8'])) { $r8 = ""; }
		if(!isset($_POST['q_9'])) { $r9 = ""; }
		if(!isset($_POST['q_10'])) { $r10 = ""; }
		if(!isset($_POST['q_11'])) { $r11 = ""; }
		if(!isset($_POST['q_12'])) { $r12 = ""; }
		if(!isset($_POST['q_13'])) { $r13 = ""; }
		if(!isset($_POST['q_14'])) { $r14 = ""; }
		if(!isset($_POST['q_15'])) { $r15 = ""; }

		


		$sql = "INSERT INTO `faction_apply`(`FactionID`, `Username`, `I1`, `I2`, `I3`, `I4`, `I5`, `I6`, `I7`, `I8`, `I9`, `I10`, `I11`, `I12`, `I13`, `I14`, `I15`) VALUES ('".$_POST['id']."', '".$_SESSION['Username']."', '$r1', '$r2', '$r3', '$r4', '$r5', '$r6', '$r7', '$r8', '$r9', '$r10', '$r11', '$r12', '$r13', '$r14', '$r15')";

		if ($db->query($sql) === TRUE) {
			go("/");
		}
	}
}