<?php
include('session.php');

$sql = "SELECT * FROM announcements ORDER BY `id` DESC";
$result = $paneldb->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

	<div class="list-unstyled feed-data"><table class="table profile-cars"><tbody>
		<tr>
			<td>
				<p style="font-size:0.9rem; color:#fff;"><i class="fa fa-user"></i> <?php echo $row["user"]; ?></p>
				<p style="font-size:1.1rem;"><?php echo $row["text"]; ?></p>
				<p style="font-size:0.7rem;" class="text-right"><i class="fa fa-clock-o"></i> <?php echo $row["timestamp"]; ?></p>
				<p style="font-size:0.7rem;" class="text-right"><i class="fa fa-list-ol" aria-hidden="true"></i> # <?php echo $row["id"]; ?></p>
			</td>
		</tr>

	</tbody></table></div>
	
	<?php
    }
}
?>