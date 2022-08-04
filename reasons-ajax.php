<?php
$type = $_GET['type'];

if($type == 0) { ?>
<option value="-1">Niciunul</option>
<option value="0">Limbaj</option>
<option value="1">Deathmatch</option>
<option value="2">Hacking</option>
<option value="3">Altul</option>
<?php } else if($type == 1) { ?>
<option value="-1">Niciunul</option>
<option value="0">Limbaj</option>
<option value="1">Deathmatch</option>
<option value="2">Hacking</option>
<option value="3">Abuz</option>
<option value="4">Altul</option>
<?php } else if($type == 2) { ?>
<option value="-1">Niciunul</option>
<option value="0">Limbaj</option>
<option value="1">Deathmatch</option>
<option value="2">Hacking</option>
<option value="3">Abuz</option>
<option value="4">Altul</option>
<?php } else if($type == 3) { ?>
<option value="-1">Niciunul</option>
<option value="0">Limbaj</option>
<option value="1">Deathmatch</option>
<option value="2">Hacking</option>
<option value="3">Abuz</option>
<option value="4">Altul</option>
<?php }else if($type == 4) { ?>
<option value="-1">Niciunul</option>
<option value="0">Abuz</option>
<option value="1">Limbaj</option>
<option value="2">Altul</option>
<?php } ?>