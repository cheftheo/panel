<?php
include("session.php");
if(isset($_SESSION['Username'])) {
$rezultat = $db->query("SELECT * FROM `users` WHERE name='".$_SESSION['Username']."'");
$numefactiune = $rezultat->fetch_assoc();
	if($numefactiune["Leader"] == $_GET['factionID'] || $_GET['username'] == $_SESSION['Username']) {
		//echo "Acces";
	}else{
		go("/");
	}
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
	<title>Panel <?php echo $serverName ?> - Applications / View</title>
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
					<h3 class="text-themecolor">Applications / View</h3>
				</div>
				<div class="col-md-7 align-self-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
						<li class="breadcrumb-item active">Applications / View</li>
					</ol>
				</div>
			</div>

<div class="container-fluid">
<?php if($numefactiune["Leader"] > 0) { ?>
<form action="<?=$serverURL;?>change-status-application.php?id=<?=$_GET['factionID'];?>&name=<?=$_GET['username']?>" method="POST">
<button class="btn btn-success" name="teste" value="2">Accept pentru teste</button>
<button class="btn btn-danger" name="respinge" value="3">Respinge</button>
<input type="hidden" id="link" name="link" value="<?=$_SERVER['REQUEST_URI']?>">
<?php } ?>
</form>
	<div class="card">
		<div class="card-body">
		
			<h4>Applications</h4>
			
			<div class="row">
			
				<div class="col-sm-5">
					<div class="row">
						<div class="card" style="border:1px solid #ddd;">
							<h3 class="card-header b-b">
							<i class="fa fa-file"></i>&nbsp; Details
						</h3>
							<div class="list-group">
								<div class="list-group-item app-details-children">
									<strong>Faction:</strong> <?=select_name_faction($_GET['factionID'])?>
								</div>
								<div class="list-group-item app-details-children">
									<strong>Created at:</strong> 2019-08-20 20:47:26
								</div>
								<div class="list-group-item app-details-children">
									<strong>Username:</strong> <a href="<?=$serverURL;?>user/<?=select_info_user($_GET['username'], "name");?>"><?=select_info_user($_GET['username'], "name");?></a>
								</div>
								<div class="list-group-item app-details-children">
									<strong>Level:</strong> <?=select_info_user($_GET['username'], "Level");?>
								</div>
								<div class="list-group-item app-details-children">
									<strong>Playing time:</strong> <?=select_info_user($_GET['username'], "ConnectedTime");?>
								</div>
								<div class="list-group-item app-details-children">
									<strong>Warns:</strong> <?=select_info_user($_GET['username'], "Warnings");?>/3
								</div>
								<div class="list-group-item app-details-children">
									<strong>Status:</strong>

									<span class="app-status"> <?=check_app($_GET['id'])?></span>
								</div>
								<?php if($_GET['username'] == $_SESSION['Username']) { ?>
								<form action="<?=$serverURL;?>hange-status-application.php?type=player&id=<?=$_GET['id'];?>" method="POST">
									<input type="submit" value="Withdraw" name="_withdraw" class="btn btn-danger btn-sm">
								</form>
								<?php } ?>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="feed-activity-list">

						</div>
					</div>
				</div>
				<?php
				$sql = "SELECT * FROM factions WHERE `ID`='".$_GET['factionID']."'";
				$result = $db->query($sql);
				$sql1 = "SELECT * FROM faction_apply WHERE `FactionID`='".$_GET['factionID']."' && ID='".$_GET['id']."'";
				$result1 = $db->query($sql1);
				if($result1->num_rows == 0) {
					go('index.php');
				}
				if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
				if ($result1->num_rows > 0) {
				while($row1 = $result1->fetch_assoc()) {
				if($row["I1"] != "") {
				?>
				<div class="col-sm-7">
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">1. <?=$row["I1"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I1"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I2"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">2. <?=$row["I2"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I2"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I3"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">3. <?=$row["I3"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I3"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I4"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">4. <?=$row["I4"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I4"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I5"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">5. <?=$row["I5"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I5"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I6"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">6. <?=$row["I6"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I6"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I7"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">7. <?=$row["I7"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I7"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I8"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">8. <?=$row["I8"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I8"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I9"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">9. <?=$row["I9"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I9"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I10"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">10. <?=$row["I10"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I10"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I11"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">11. <?=$row["I11"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I11"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I12"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">12. <?=$row["I12"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I12"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I13"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">13. <?=$row["I13"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I13"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I14"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">14. <?=$row["I14"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I14"];?>
				</div>
				</div>
				<br>
				<?php }
				if($row["I15"] != "") {
				?>
				<div class="row">
				<label class="col-md-3 app_style">
				<b style="font-weight: bold;">15. <?=$row["I15"];?></b>
				</label>
				<div class="col-md-9 app_style">
				<?=$row1["I15"];?>
				</div>
				</div>
				<br>
				<?php }
				}
				}

				}
				}
				?>
			</div>
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
<?php }else{
	go("/");
} ?>