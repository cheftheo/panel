<?php
include('session.php');
$a = $_GET['name'];

header('Content-Type: application/json');
$selectSearch = "SELECT * from `users` WHERE `username` LIKE '".mysqli_real_escape_string($db, $a["term"])."%'";
$rezultatul = $db->query($selectSearch);
if ($rezultatul->num_rows > 0) {
    while($row = $rezultatul->fetch_assoc()) {
        $name = $row["username"];

        $arr[] = array('id' => $row["id"], 'text' => $row["username"],);
    }
}
echo json_encode(["results" => $arr]);
