<?php
// server
$db = mysqli_connect('185.225.3.76:3306','u242_tOT7JOw7KR','XqW31N!zFsa+9TbBp4aqEz+3','s242_hype_sv');
// panel
$paneldb = mysqli_connect('185.225.3.76:3306','u242_R98aXrr911','FtBizhxB!5kNW@DA@Id93Acl','s242_panel');
$csfr = getToken(24);

if ($db->error) {
    die($db->error);
}
if ($paneldb->error) {
    die($paneldb->error);
}

date_default_timezone_set('Europe/Bucharest');

$author = "chef theo";
$serverURL = "https://8000-cheftheo-panel-0rucdsj0lf7.ws-eu59.gitpod.io/";
// $serverURL = "http://localhost:8000/";
$serverName = "Thor";

$onlineString = "Offline";
$curl_handle=curl_init();
// obae3v -- white romania parca drq sa-l ia;
curl_setopt($curl_handle, CURLOPT_URL,'https://servers-frontend.fivem.net/api/servers/single/obae3v');
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$queryServerData = curl_exec($curl_handle);
curl_close($curl_handle);
$queriedSvData = json_decode($queryServerData);
if ($queriedSvData) {
	if (!isset($queriedSvData->{'error'})) {
		$online = $queriedSvData->{'Data'}->{'clients'};
		$onlineSlots = $queriedSvData->{'Data'}->{'sv_maxclients'};
		if ($online and $onlineSlots) {
			$onlineString = $online . "/" . $onlineSlots;
		}
	}
}
$result1 = $db->query("SELECT COUNT(*) FROM `users`");
$accountCreated = $result1->fetch_row();
$result2 = $db->query("SELECT COUNT(*) FROM `user_vehicles`");
$vehicles = $result2->fetch_row();

function checkOnlineUser($username) {
	global $onlineString;
	global $queriedSvData;
	$allPlayers = $queriedSvData->{'Data'}->{"players"};

	foreach ($allPlayers as $player) {
		if ($player->{'name'} == $username) {
			return true;
			break;
		}
	}

	return false;
}

function returnPlayerListName(){
	global $onlineString;
	global $queriedSvData;
	$allPlayers = $queriedSvData->{'Data'}->{"players"};
	$playersList[] = array();
	foreach ($allPlayers as $player) {
		$playersList[] = [0=>$player->{'identifiers'},1=>$player->{'name'}];
	}

	return $playersList;
}

function post_anunt($username, $anunt) {
	global $paneldb;

	if ($anunt == " " or $anunt == "" or empty($anunt)) { 
		return;
		// die;
	} else {
		$anuntInsert = "INSERT IGNORE INTO `announcements`(`user`, `text`, `timestamp`) VALUES ('$username','$anunt','".date("m-d-y h:i:s")."')";
		$paneldb->query($anuntInsert);
	}
}

function getUsernameFromId($id) {
	global $db;
	$queryUsername = $db->query("SELECT `username` FROM `users` WHERE `id` = '$id'") or die($db->error);
	$usernameQueried = $queryUsername->fetch_row();

	return $usernameQueried[0];
}

function getIdByGtaLicense($lic) {
	global $db;
	$queryUsername = $db->query("SELECT `user_id` FROM `vrp_user_ids` WHERE `identifier` = '$lic[0]'") or die($db->error);
	$idQueried = $queryUsername->fetch_row();

	return $idQueried[0];
}

function date_time( $date ) {
    if( $date == "" ){
        return "";
    } else {
        $my_date  = DateTime::createFromFormat( 'm-d-Y', $date );
        $new_date = $my_date->format( 'Y-m-d' );
        return $new_date;
    }
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function calculeazabani($numar) {
	$numar1 = number_format($numar);
	echo $numar1;
}

function get_faction($id) {
	global $db;
	if($id == 0) { ?> Civil <?php } else {
		$result4 = $db->query("SELECT faction from `users` WHERE id = ".$id."");
		$factionName = $result4->fetch_assoc();
		echo $factionName[0];
	}
}

function getLoginData($data){ 
	if ($data) {
		$theSeconda2 = explode(" ",$data);

		echo $theSeconda2[1] . " " . $theSeconda2[2];
	} else {
		echo "No data";
	}
}

function getUserPhone($id) {
	global $db;
	$faf4fga4ga4g1 = $db->query("SELECT `phone` from `vrp_user_identities` WHERE `user_id` = ".$id."");
	$thePhoneNumber = $faf4fga4ga4g1->fetch_assoc();

	echo $thePhoneNumber[0];
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}

function get_faction_count_members($factionName) {
	global $db;
	$rezultat = $db->query("SELECT COUNT(*) FROM `users` WHERE faction='".$factionName."'");
	$factionsCount = $rezultat->fetch_row();
	echo $factionsCount[0];
}

function check_if_user_have_leader($params) {
	global $db;
	global $serverURL;
	$rezultat = $db->query("SELECT Leader from `users` WHERE name='".$params."'");
	$grad = $rezultat->fetch_assoc();
	if($grad["Leader"] > 0) {
		?>
		<li><a class="" href="<?php echo $serverURL;?>leader.php?id=<?=$grad["Leader"]?>" aria-expanded="false">
		<i class="mdi mdi-account-multiple"></i><span class="hide-menu">Leader Panel</span></a></li>
		<?php
	}

}
function check_if_user_have_acces_to_leader_panel($params) {
	global $db;
	$rezultat = $db->query("SELECT Leader from `users` WHERE name='".$params."'");
	$grad = $rezultat->fetch_assoc();
	
	if($grad["Leader"] == 0) {
		go("/");
	}
}

function check_if_user_is_leader_to_x_faction($params) {
	global $db;
	$rezultat = $db->query("SELECT Leader from `users` WHERE name='".$params."'");
	$grad = $rezultat->fetch_assoc();
	
	if($grad["Leader"] != mysqli_real_escape_string($db, $_GET['id'])) {
		go("/");
		die;
	}
}

function check_if_user_is_leader_to_x_faction1($params, $params1) {
	global $db;
	$rezultat = $db->query("SELECT Leader from `users` WHERE name='".$params."'");
	$grad = $rezultat->fetch_assoc();
	
	if($grad["Leader"] != $params1) {
		go("/");
		die;
	}
}

function select_name_faction() {
	global $db;
	$rezultat = $db->query("SELECT Name from `factions` where ID='".mysqli_real_escape_string($db, $_GET['factionID'])."'");
	$numefactiune = $rezultat->fetch_assoc();
	echo $numefactiune["Name"];
}

function select_info_user($params, $valuewant) {
	global $db;
	$rezultat = $db->query("SELECT * FROM `users` WHERE name='".$params."'");
	$numefactiune = $rezultat->fetch_assoc();
	echo $numefactiune[$valuewant];
}
function select_info_user_from_id($params, $valuewant) {
	global $db;
	$rezultat = $db->query("SELECT * FROM `users` WHERE id='".$params."'");
	$numefactiune = $rezultat->fetch_assoc();
	echo $numefactiune[$valuewant];
}
function check_app($params) {
	global $db;
	$rezultat = $db->query("SELECT * FROM `faction_apply` WHERE ID='".$params."'");
	$rezultatfac = $rezultat->fetch_assoc();
	if($rezultatfac["Status"] == 1) {
		echo "Un-answered";
	}
	if($rezultatfac["Status"] == 2) {
		echo "Accepted for tests";
	}
	if($rezultatfac["Status"] == 3) {
		echo "Rejected";
	}
}

function alert($txt) {
	echo "<script>alert('$txt')</script>";
}

function go($params) {
	echo "<meta http-equiv=\"refresh\" content=\"0; url=".$params."\">";
}
?>