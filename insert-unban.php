<?php
include('session.php');

if(isset($_SESSION['Username'])) {

$n = $_SESSION['Username'];
$r = mysqli_real_escape_string($db, $_POST['_reason']);
$i = mysqli_real_escape_string($db, $_POST['_img']);
$d = mysqli_real_escape_string($db, $_POST['_p']);

$sql = "INSERT INTO `unban-panel` (Username, Status, Reason, Poza, Description, Date) VALUES ('".$n."', 'Un-answered', '".$r."', '".$i."', '".$d."', '".time()."')";

if ($db->query($sql) === TRUE) {
	go("unban.php");
}

}else{
	go("/");
}
?>