<?php
include('session.php');
$type = $_GET['type'];
$user = $_GET['user'];

if(isset($_SESSION["Username"])) {
	$selectare = $db->query("SELECT * FROM `users` WHERE id='".$_SESSION['user_id']."'");
	$verificareadmin = $selectare->fetch_assoc();
	if($verificareadmin["adminLvl"] > 0) {
		if($type == "Money") {
			$link = $_POST['link'];
			$wallet = $_POST['wallet'];
			$bank = $_POST['bank'];
			if ($wallet) {
				$sql1 = "UPDATE `users` SET wallet ='".$wallet."' WHERE id='$user'";
			}
			if ($bank) {
				$sql2 = "UPDATE `users` SET bank ='".$bank."' WHERE id='$user'";
			}
			if ($db->query($sql1) === TRUE) {
				go($link);
			} else {
				echo "Error updating record: " . $db->error;
			}
			
			if ($db->query($sql2) === TRUE) {
				go($link);
			} else {
				echo "Error updating record: " . $db->error;
			}
		} elseif ($type == "vip") {
			$link = $_POST['link'];
			$vipLvltoSet = $_POST['vip'];
			if ($vipLvltoSet and $vipLvltoSet > 0 and $vipLvltoSet < 5) {
				$updateVipLevel = "UPDATE `users` SET vipLvl ='".$vipLvltoSet."' WHERE id='$user'";
				if ($db->query($updateVipLevel) === TRUE) {
					go($link);
				} else {
					echo "Error updating record: " . $db->error;
				}
			} else {
				go("/");
			}
		} elseif ($type == "ban") {
			$link = $_POST['link'];
			$reason = $_POST['reason'];
			$time = $_POST['time'];
			$admin = $_SESSION['Username'];

			if ($reason and $time) {
				if ($time == "perm" or $time == -1 or $time == "-1") {
					go("banlist.php");
				} else {
					$banTime = date("U");
					$time = ($time*60*60) + $banTime;
				}

				$banQuery = "UPDATE `users` SET banned = '1', banreason = '".$reason."', bantime = '".$time."', banadmin = '".$admin."', adminLvl = '0' WHERE id='$user'";


				if ($db->query($banQuery) === TRUE) {
					go($link);
				} else {
					echo "Error updating record: " . $db->error;
				}
			} else {
				go("/");
			}
		} elseif ($type == "unban") {
			$banQuery = "UPDATE `users` SET banned = '0', banreason = 'panel_unbanned', bantime = '0', banadmin = '', adminLvl = '0' WHERE id='$user'";

			if ($db->query($banQuery) === TRUE) {
				go($link);
			} else {
				echo "Error updating record: " . $db->error;
			}
		}
	}else{
		go("/");
	}
}else{
	go("/");
}
?>
