<?php
include('session.php');

$email = $_GET['email'];
$key = $_GET['key'];

$result = mysqli_query($db, "SELECT * FROM emaiverification WHERE Email = '$email' AND NOW() > ExpirationTime");
$count = mysqli_num_rows($result);
$count > 0 ? true : false;

$sql = "SELECT * FROM emaiverification WHERE Email = '$email' AND NOW() < ExpirationTime AND Token = '$key'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$sql = "UPDATE `users` SET `Email`='".$_SESSION["NEW_EMAIL"]."' WHERE `name`='".$_SESSION['Username']."'";

		if ($db->query($sql) === TRUE) {
			go('/user/'.$_SESSION['Username'].'');
			$_SESSION['Email'] = $_SESSION["NEW_EMAIL"];
			unset($_SESSION["NEW_EMAIL"]);
		}
    }
} else {
    echo "Tokenul a expirat sau este invalid";
}