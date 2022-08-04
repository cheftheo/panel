<?php 
include('config.php');
$tipar = 'Camper';
$selectSearch = "SELECT * from `users` WHERE `username` LIKE '".mysqli_real_escape_string($db,$tipar)."%' LIMIT 1";
$rezultatul = $db->query($selectSearch);
echo $rezultatul[0];

?>