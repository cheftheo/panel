<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="<?=$author?>">
	<meta name="csrf-token" content="<?php echo $csfr ?>" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?=$serverURL;?>assets/images/favicon.png">
	<title>Panel <?php echo $serverName ?> - Top players</title>
	<link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
	<link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
	<link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
	<script>var _PAGE_URL = "<?php echo $serverURL ?>";</script>

</head>

<body class="fix-header card-no-border">
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
	</div>
	<div id="main-wrapper">
	<?php include('header.php'); ?>
	<?php include('sidebar.php'); ?>
		<div class="page-wrapper">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h3 class="text-themecolor">Top players</h3>
				</div>
				<div class="col-md-7 align-self-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
						<li class="breadcrumb-item active">Top players</li>
					</ol>
				</div>
			</div>

<div class="container-fluid">
                
                
                                
<div class="card">
    <div class="card-body">
        <h4>Top players by Hours Played</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>VIP</th>
                    <th>Playing time</th>
                </tr>
            </thead>
            <tbody>
			<?php
			$sql = "SELECT * FROM `users` ORDER BY hoursPlayed DESC LIMIT 10";
			$result = $db->query($sql);
			$rank = 0;
			$rows = 0;
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$rows++;
					$rank = $rows;
					
				?>
					<tr>
						<td><?php if($rank == 1) {echo "<i class='fa fa-trophy' style='color: #878000;'></i>";}else if($rank == 2) {echo "<i class='fa fa-trophy' style='color:#823a08;'></i>";}else if($rank == 3) { echo "<i class='fa fa-trophy'></i>"; } else { echo $rank;} ;?></td>
						<td><a href="<?=$serverURL;?>profile.php?user=<?=$row["id"];?>"><?=$row["username"];?></a></td>
						<td><?=$row["vipLvl"];?></td>
						<td><?=$row["hoursPlayed"];?></td>
					</tr>
				<?php
				}
			}
			?>

			</tbody>
        </table>
    </div>
</div>

</div>

<?php include('footer.php'); ?>
		</div>
	</div>
	<script src="<?=$serverURL;?>assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?=$serverURL;?>assets/plugins/boostrap/js/popper.min.js"></script>
	<script src="<?=$serverURL;?>assets/plugins/boostrap/js/bootstrap.min.js"></script>
	<script src="<?=$serverURL;?>assets/js/jquery.slimscroll.js"></script>
	<script src="<?=$serverURL;?>assets/js/waves.js"></script>
	<script src="<?=$serverURL;?>assets/js/sidebarmenu.js"></script>
	<script src="<?=$serverURL;?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
	<script src="<?=$serverURL;?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js" type="text/javascript"></script>
	<script src="<?=$serverURL;?>assets/js/custom.min.js?v=2.16"></script>
	<script src="<?=$serverURL;?>assets/plugins/footable/js/footable.all.min.js"></script>
	<script src="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.js"
		type="text/javascript"></script>
	<link href="<?=$serverURL;?>assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
	<script src="<?=$serverURL;?>assets/plugins/toast-master/js/jquery.toast.js"></script>
	<script src="<?=$serverURL;?>assets/plugins/sparkline/jquery.charts-sparkline.js"></script>
		</body>
</html>