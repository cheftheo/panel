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
    <title>Panel <?php echo $serverName ?> - Staff</title>
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
                    <h3 class="text-themecolor">Staff</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Staff</li>
                    </ol>
                </div>
            </div>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h4>Staff</h4>
            <div class="tabs-container">
                <ul class="nav nav-tabs customtab nav-fill">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#tab-admins" aria-expanded="true"> Admins (<?php echo $adminson[0];?>/28)</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-leaders" aria-expanded="false">
						Leaders (<?php echo $leaderson[0];?>/18)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="tab-admins" class="tab-pane active show">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Admin</th>
                                <th>Grades</th>
                                <th>Last Login</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
							$selectareAdmini = "SELECT * from `users` where adminLvl > 0";
							$rezultat = $db->query($selectareAdmini);
							if ($rezultat->num_rows > 0) {
								while($row = $rezultat->fetch_assoc()) {
									?>
									<tr>
										<td width="70px">
										<?php if($row["StatusOnline"] == 0) { ?>
										<span class="label label-danger">Offline</span>
										<?php }else{ ?>
										<span class="label label-success">Online</span>
										<?php } ?>
										</td>
										<td><a id="<?php echo $row["id"]; ?>" href="<?=$serverURL;?>profile.php?user=<?php echo $row["id"]; ?>"><?php echo $row["username"]; ?></a></td>
										<td><?php echo $row["adminLvl"]; ?></td>
										<td>
										<?php if($row["adminLvl"] >= 11) { ?>
										<span class="badge badge-primary" style="background-color:#ff0000;"><i class="fa fa-cog"></i> Owner</span> 
										<?php } ?>
										<?php if($row["id"] == 0) { ?>
										<span class="badge badge-primary" style="background-color:#5e1fdb;"><i class="fa fa-code"></i> Dev</span>
										<?php } ?>
                                        <?php if($row["whitelisted"] == 1) { ?>
										<span class="badge badge-primary" style="background-color:#313b39;"><i class="fa fa-wrench"></i> Beta Tester</span>
										<?php } ?>
										</td>
										<td><?php 
                                            $lastLog = explode(" ", $row["last_login"]); 
                                            echo $lastLog[2] . " / " .  $lastLog[1];
                                        ?></td>
									</tr>
									<?php
								}
							}
							?>

                        </tbody>
                    </table>
                </div>
                <div id="tab-leaders" class="tab-pane">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Username</th>
                                <th>Lider</th>
                                <th>Last Login</th>
                            </tr>
                        </thead>
                        <tbody>
					<?php
						$selectareAdmini = "SELECT * from `users` where isFactionLeader > 0";
						$rezultat = $db->query($selectareAdmini);
						if ($rezultat->num_rows > 0) {
							while($row = $rezultat->fetch_assoc()) {
								?>
                            <tr>
								<td width="70px">
								<?php if($row["StatusOnline"] == 0) { ?>
								<span class="label label-danger">Offline</span>
								<?php }else{ ?>
								<span class="label label-success">Online</span>
								<?php } ?>
								</td>
								
                                <td><a id="<?php echo $row["id"]; ?>" href="<?=$serverURL;?>user/<?php echo $row["username"]; ?>"><?php echo $row["username"]; ?></a></td>
                                <td><?php echo $row["faction"]; ?></td>
                                <td><?php 
                                    $lastLog = explode(" ", $row["last_login"]); 
                                    echo $lastLog[2] . " / " .  $lastLog[1];
                                ?></td>
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