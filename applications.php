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
    <title>Panel <?php echo $serverName ?> - Factions</title>
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
                    <h3 class="text-themecolor">Factions</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Factions</li>
                    </ol>
                </div>
            </div>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h4>Applications
				<span class="float-right">
									</span>
			</h4>

            <div class="row m-t-40">
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-inverse" style="background-color: #4CAF50 !important">
                        <div class="box text-center">
                            <h1 class="font-light text-white"><?=$factionsCount8[0];?></h1>
                            <h6 class="text-white">Accepted</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-inverse card-danger">
                        <div class="box text-center">
                            <h1 class="font-light text-white"><?=$factionsCount9[0];?></h1>
                            <h6 class="text-white">Rejected</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-inverse card-info card-warning">
                        <div class="box text-center">
                            <h1 class="font-light text-white"><?=$factionsCount10[0]?></h1>
                            <h6 class="text-white">Total applications</h6>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Column -->
            </div>

            <div class="row">

            </div>
            <div class="row m-t-sm">
                <div class="col-md-12">
                    <h3>Pending applications</h3>
                    <table class="table color-table dark-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						$sql = "SELECT ID, Username FROM `faction_apply` WHERE Status='1' ORDER BY ID DESC";
						$result = $db->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
							?>
								<tr>
									<td><?=$row["ID"];?></td>
									<td><a href="<?=$serverURL;?>user/<?=$row["Username"];?>"><?=$row["Username"];?></a></td>
									<td>Faction</td>
									<td>Pending</td>
									<td> <a href="<?=$serverURL;?>view.php?id=<?=$row["ID"];?>&username=<?=$row["Username"];?>&factionID=<?=$_GET['id'];?>">View</a> </td>
								</tr>
							<?php
							}
						}
						?>
                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">
                    <h3>Accepted applications</h3>
                    <table class="table color-table success-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						$sql = "SELECT ID, Username FROM `faction_apply` WHERE Status='2' ORDER BY ID DESC";
						$result = $db->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
							?>
								<tr>
									<td><?=$row["ID"];?></td>
									<td><a href="<?=$serverURL;?>user/<?=$row["Username"];?>"><?=$row["Username"];?></a></td>
									<td>Faction</td>
									<td>Accepted for tests</td>
									<td> <a href="<?=$serverURL;?>view.php?id=<?=$row["ID"];?>&username=<?=$row["Username"];?>&factionID=<?=$_GET['id'];?>">View</a> </td>
								</tr>
							<?php
							}
						}
						?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <h3>Rejected applications</h3>
                    <table class="table color-table danger-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						$sql = "SELECT ID, Username FROM `faction_apply` WHERE Status='3' ORDER BY ID DESC";
						$result = $db->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
							?>
								<tr>
									<td><?=$row["ID"];?></td>
									<td><a href="<?=$serverURL;?>user/<?=$row["Username"];?>"><?=$row["Username"];?></a></td>
									<td>Faction</td>
									<td>Rejected</td>
									<td> <a href="<?=$serverURL;?>view.php?id=<?=$row["ID"];?>&username=<?=$row["Username"];?>&factionID=<?=$_GET['id'];?>">View</a> </td>
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