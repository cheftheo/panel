<?php
include("session.php");
if((!isset($_GET['user']) or empty($_GET['user'])) and $_GET['user'] != 0) {
	go("/");
}
$user_id = $_GET['user'];
if (!isset($user_id) or intval($user_id) < 0) {
	go("/");
}
$username = getUsernameFromId($user_id);
if (!$username) {
	go("/");
}
$csfr = getToken(24);

$result = $db->query("SELECT * FROM `users` WHERE id='".$user_id."'");

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
    <title>Panel <?php echo $serverName ?> - <?php echo $username ?>&#039;s profile</title>
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
                    <h3 class="text-themecolor"><?php echo $username ?>'s profile</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $username ?>'s profile</li>
                    </ol>
                </div>
            </div>
			
<?php
while($row = $result->fetch_assoc()) { ?>

	<div class="container-fluid">
		<?php
		$sql = "SELECT * FROM `users` WHERE `id`='".$_GET['user']."'";
		$result = $db->query($sql);

		if ($result->num_rows > 0) {
			$info = $result->fetch_assoc();
			if ($info["banned"] >= 1) {
				?>
					<div class="alert alert-danger" style="margin-bottom:0;font-size:13px;">This user is banned by admin <b><?=$info["banadmin"];?></b>
					<br>Reason - <b><?=$info["banreason"];?></b>
					<br>Expires - <b><?php if(!$info['bantime'] or $info["bantime"] == "perm") { echo "Permanent"; }else{ echo date("d M Y H:i (d-m-y)", $info["bantime"]); } ?></b>
					</div>
					<br>
				<?php
			}
		}
		?>
		<div class="row">
			<div class="col-md-4 _left-side">
				<div class="card">
					<div class="card-body">
						<center class="m-t-30"> 
							<h4 class="card-title m-t-10"><?php if(checkOnlineUser($row['username'])) { ?> <i class="fa fa-circle fa-fw" style="color:green;"></i> <?php }else{ ?> <i class="fa fa-circle fa-fw" style="color:red;"></i> <?php } ?> <?php echo $row["username"] ?></h4>
							<?php if($row["id"] == 0) { ?>
							<span class="badge badge-primary" style="background-color:#ff0000;"><i class="fa fa-cog"></i> Dev</span>
							<?php } ?>
							<?php if($row["vipLvl"] > 0) { ?>
							<span class="label label-warning"><i class="fa fa-star"></i> Premium</span>
							<?php }?>
							<?php if($row["adminLvl"] > 0) { ?>
							<span class="label label-primary"><i class="fa fa-legal"></i> Admin</span>
							<?php } ?>
							<center class="m-t-30">
						</center>
					</div>
				</div>
			</div>
			<div class="col-md-8 _right-side">
				<div class="card">
					<ul class="nav nav-tabs profile-tab" role="tablist">
						<li class="nav-item"> <a class="nav-link  active " data-toggle="tab" href="#home" role="tab">Profile</a> </li>
						<?php
						if(isset($_SESSION['Username'])){
							if(mysqli_real_escape_string($db, $_GET['user']) == $_SESSION['user_id']) { ?>
								<li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#settings" role="tab">Account Setting</a> </li>
						<?php }} ?>

						<?php if(isset($_SESSION['Username'])) {
							$rezultat = $db->query("SELECT * FROM `users` WHERE `id`='".$_SESSION['user_id']."'");
							$username = $rezultat->fetch_assoc();
							if($username["adminLvl"] > 0 ) {
						?>
							<li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#admintool" role="tab">Admin Tools</a> </li>
						<?php }} ?>
					</ul>
					<div class="tab-content">
						<div class="tab-pane  active " id="home" role="tabpanel">
							<div class="card-body">
								<div class="profiletimeline">
								</div>
								<div class="card-block">
									<div class="view-info">
										<div class="row">
											<div class="col-lg-12">
												<div class="general-info">
													<div class="row">
														<div class="col-lg-12">
															<table class="table m-0">
																<tbody>
																	<tr>
																		<th scope="row">User id</th>
																		<td>
																			<?php echo $row["id"]; ?>
																		</td>
																	</tr>
																	<?php if($row["clan"] !== "none" and $row["clan"] != null) { ?>
																		<tr>
																			<th scope="row">Clan</th>
																			<td>
																				<?php echo $row["clan"]; ?>
																			</td>
																		</tr>
																	<?php } ?>
																	<?php if($row['faction'] and $row["faction"] != "none") { ?>
																		<tr>
																			<th scope="row">Faction</th>
																			<td>
																				<?php if($row["faction"] == "none") { ?> Civilian <?php } else {
																					echo $row["faction"]." , ".$row["factionRank"];
																				}?>
																				
																			</td>
																		</tr>
																		<tr>
																			<th scope="row">Faction Warn</th>
																			<td>
																				<?php echo $row["fwarn"]; ?>/3
																			</td>
																		</tr>
																	<?php } ?>
																	<tr>
																		<th scope="row">Played Hours</th>
																		<td><?php echo $row["hoursPlayed"]; ?></td>
																	</tr>
																	<tr>
																		<th scope="row">Last Online</th>
																		<td>
																			<?php echo getLoginData($row["last_login"]); ?>
																		</td>
																	</tr>

																	<tr>
																		<th scope="row">Warns</th>
																		<td><?php echo $row["warns"]; ?> / 3</td>
																	</tr>
																	
																	<?php
																	if(isset($_SESSION['Username'])){
																		if(mysqli_real_escape_string($db, $_GET['user']) == $_SESSION['Username']) { ?>
																
																	</td>
																	<?php }} ?>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<!-- end of row -->
												</div>
												<!-- end of general info -->
											</div>
											<!-- end of col-lg-12 -->
										</div>
										<!-- end of row -->
									</div>
									<!-- end of view-info -->
								</div>
							</div>
						</div>

						<div id="admintool" role="tabpanel" class="tab-pane">
							<div class="row">
								<div class="col">
									<div class="col p-3">
										<h4>Admin Tools</h4>
										<br>
										<table class="table m-0">
											<tbody>
												<tr>
													<th scope="row">Login data</th>
													<td><?php 
														if ($user_id == 2) {
															$loginData = explode(" ", $row['last_login']);
															echo "ip.la.patron.privat ". $loginData[1] . "  " . $loginData[2];
														} else {
															echo $row['last_login'];
														}?>
													</td>
												</tr>
												<tr>
													<th scope="row">Wallet</th>
													<td><?=$row['wallet'];?></td>
												</tr>
												<tr>
													<th scope="row">Bank</th>
													<td><?=$row['bank'];?></td>
												</tr>

												<?php 
													$panelInfoQuery = $paneldb->query("SELECT * FROM `users` WHERE `gameid`='$user_id'");
													while($panelInfo = $panelInfoQuery->fetch_assoc()) {
														if ($panelInfo['admin'] > 5) {
														?>
															<tr>
																<th scope="row">Panel id</th>
																<td><?=$panelInfo['id'];?></td>
															</tr>
															<tr>
																<th scope="row">Panel login credentials</th>
																<td><?php echo "<div class='font-italic font-weight-bold'>user:</div> ". $panelInfo['username'] . " <div class='font-italic font-weight-bold'>pass:</div>" . $panelInfo["pass"];?></td>
															</tr>
														<?php 
														}
													}
												?>
											</tbody>
										</table>

										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setmoney">
										Set player money
										</button>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setvip">
										Set player vip level
										</button>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setban">
										Ban player
										</button>
									</div>
									<hr>
								</div>
							</div>
						</div>
						
						<div class="modal fade" id="setmoney" tabindex="-1" role="dialog" aria-labelledby="setmoney" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="setmoney">Set <?=getUsernameFromId($_GET['user']);?> money</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form action="/set-profile-data.php?user=<?php echo $_GET['user'];?>&type=Money" method="post">
								Set Money
								<textarea class="form-control" name="wallet" rows="1" name="1" placeholder = "Banii din mana"></textarea>
								<textarea class="form-control" name="bank" rows="1" name="1" placeholder = "Banii din banca"></textarea>
								<input type="hidden" name="link" value="<?=$_SERVER['REQUEST_URI'];?>">
								</div>
								<div class="modal-footer">
									<input type="submit" name="setmoney" class="btn btn-primary" value="Set Money" />
									</form>
								</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="setvip" tabindex="-1" role="dialog" aria-labelledby="setvip" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="setvip">Set <?=getUsernameFromId($_GET['user']);?> vip</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form action="/set-profile-data.php?user=<?php echo $_GET['user'];?>&type=vip" method="post">
								Set Money
								<textarea class="form-control" name="vip" rows="1" name="1" placeholder = "Vip lvl (1-4)"></textarea>
								<input type="hidden" name="link" value="<?=$_SERVER['REQUEST_URI'];?>">
								</div>
								<div class="modal-footer">
									<input type="submit" name="setvip" class="btn btn-primary" value="Set Vip level" />
									</form>
								</div>
								</div>
							</div>
						</div>

						
						<div class="modal fade" id="setban" tabindex="-1" role="dialog" aria-labelledby="setban" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="setban">Set <?=getUsernameFromId($_GET['user']);?> vip</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<form action="/set-profile-data.php?user=<?php echo $_GET['user'];?>&type=ban" method="post">
								Ban player
								<textarea class="form-control" name="reason" rows="1" name="1" placeholder = "Motiv"></textarea>
								<textarea class="form-control" name="time" rows="1" name="1" placeholder = "Cate ore (-1 = permanent)"></textarea>
								<input type="hidden" name="link" value="<?=$_SERVER['REQUEST_URI'];?>">
								</div>
								<div class="modal-footer">
									<input type="submit" name="setban" class="btn btn-primary" value="Ban Player" />
									</form>
								</div>
								</div>
							</div>
						</div>


						<div id="settings" role="tabpanel" class="tab-pane ">
							<div class="row">
								<div class="col">
									
									<div class="col p-3">
										<h4>Change email</h4>
									<form method="POST" action="/change_email.php">
											<div class="form-group">
												<label class="control-label">New email</label>
												<div><input type="text" name="new_email" placeholder="New email"
														class="form-control"></div>
											</div>
											<div class="form-group">
												<label class="control-label">Current password</label>
												<div><input type="password" name="current_password"
														placeholder="Current password" class="form-control"></div>
											</div>
											<div class="form-group">
												<input type="submit" name="submit_email" class="btn btn-success"></input>
											</div>
										</form>
									</div>
								</div>

							</div>
						</div>
						


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

			
<div class="modal fade" id="editMoney" tabindex="-1" role="dialog" aria-labelledby="editMoneyLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMoneyLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>
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

<?php if($_SESSION['CONFIRMATION_EMAIL'] == 1) { ?>
<?php unset($_SESSION['CONFIRMATION_EMAIL']); ?>
<script>
	$.toast({
		heading: "Notification",
		text: "An email has been sent to your current email address.",
		position: 'bottom-right',
		loaderBg:'#ff6849',
		icon: "success",
		hideAfter: 10000, 
		stack: 10
	});
</script>

<?php } ?>
        </body>
</html>