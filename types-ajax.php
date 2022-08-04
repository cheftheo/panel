<?php
include('config.php');
$a = mysqli_real_escape_string($db, $_GET['user']);

$result10 = $db->query("SELECT * FROM `users` WHERE id='".$a."'");
$detaliijucator = $result10->fetch_assoc();

function select_name_faction_1() {
	global $db;
	global $detaliijucator;
	$rezultat = $db->query("SELECT Name from `factions` where ID='".mysqli_real_escape_string($db, $detaliijucator["Member"])."'");
	$numefactiune = $rezultat->fetch_assoc();
	echo $numefactiune["Name"];
}

?>
<option value="-1">Niciunul</option>
<option value="0" style="color:green;">Jucator</option>
<option <?php if($detaliijucator["Leader"] < 1) { ?>disabled style="color:red;"<?php }else{ ?>value="1" style="color:green;"<?php } ?>>Leader <?php if($detaliijucator["Leader"] > 0) {?>(<?=select_name_faction_1()?>)<?php } ?></option>
<option <?php if($detaliijucator["Helper"] < 1) { ?>disabled style="color:red;"<?php }else{ ?>value="2" style="color:green;"<?php } ?>>Helper</option>
<option <?php if($detaliijucator["Admin"] < 1) { ?>disabled style="color:red;"<?php }else{ ?>value="3" style="color:green;"<?php } ?>>Admin</option>

<option <?php if($detaliijucator["Member"] < 1) { ?> disabled style="color:red;"<?php }else{ ?>value="4" style="color:green;"<?php } ?>>Factiune <?php if($detaliijucator["Member"] > 0) {?>(<?=select_name_faction_1()?>)<?php } ?></option>