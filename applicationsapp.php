<?php
include("session.php");
if(isset($_SESSION['Username'])) {
$rezultat = $db->query("SELECT Leader, Member, FPunish FROM `users` WHERE name='".$_SESSION['Username']."'");
$numefactiune = $rezultat->fetch_assoc();

$rezultat1 = $db->query("SELECT App FROM `factions` WHERE ID='".mysqli_real_escape_string($db, $_GET['id'])."'");
$numefactiune1 = $rezultat1->fetch_assoc();

$rezultat2 = $db->query("SELECT Username FROM `faction_apply` WHERE Username='".$_SESSION['Username']."' AND Status='1'");
$numefactiune2 = $rezultat2->fetch_assoc();
	
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
    <title>Panel <?php echo $serverName ?> - Applications / Create</title>
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
                    <h3 class="text-themecolor">Applications / Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Applications / Create</li>
                    </ol>
                </div>
            </div>
<div class="container-fluid">
<?php
if($numefactiune["Leader"] > 0 || $numefactiune["Member"] > 0 || $numefactiune["FPunish"] > 0) {
?>
<div class="alert alert-danger">
  <strong>Erroare!</strong> Nu poți aplica deoarece ești membru al unei facțiuni sau ai mai mult de 0 FP
</div>
<?php
} else if($numefactiune1["App"] == 0) {	
?>
<div class="alert alert-danger">
  <strong>Erroare!</strong> Aplicațiile la această facțiune sunt închise sau id-ul facțiunii este invalid.
</div>
<?php
}else if($numefactiune2["Username"] == $_SESSION['Username']) {
?>
<div class="alert alert-danger">
  <strong>Erroare!</strong> Ai făcut deja o aplicație
</div>
<?php }else{ ?>
    <div class="card">
        <div class="card-body">
            <h4>Application</h4>
            <form method="post" action="<?=$serverURL;?>insert-application.php">
                <fieldset>
                    <legend>Create application</legend>
					<?php
					$sql = "SELECT * FROM factions WHERE ID='".mysqli_real_escape_string($db, $_GET['id'])."'";
					$result = $db->query($sql);
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							if($row["I1"] == "") {
								echo "<input name='q_1' type='hidden' value=''>";
							}else{
						?>
							<div class="form-group">
								<label class="control-label"><b><?=$row["I1"];?></b></label>
								<div class="col-md-9">
									<textarea class="form-control" name="q_1" placeholder="<?=$row["I1"];?>" rows="5" name="1"></textarea>
									<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
								</div>
							</div>
						<?php
							}
							if($row["I2"] == "") {
								echo "<input name='q_2' type='hidden' value=''>";
							}else{
								?>
							<div class="form-group">
								<label class="control-label"><b><?=$row["I2"];?></b></label>
								<div class="col-md-9">
									<textarea class="form-control" name="q_2" placeholder="<?=$row["I2"];?>" rows="5" name="1"></textarea>
									<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
								</div>
							</div>
							<?php }
							if($row["I3"] == "") {
								echo "<input name='q_3' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I3"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_3" placeholder="<?=$row["I3"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I4"] == "") {
								echo "<input name='q_4' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I4"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_4" placeholder="<?=$row["I4"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I5"] == "") {
								echo "<input name='q_5' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I5"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_5" placeholder="<?=$row["I5"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I6"] == "") {
								echo "<input name='q_6' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I6"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_6" placeholder="<?=$row["I6"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I7"] == "") {
								echo "<input name='q_7' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I7"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_7" placeholder="<?=$row["I7"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I8"] == "") {
								echo "<input name='q_8' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I8"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_8" placeholder="<?=$row["I8"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I9"] == "") {
								echo "<input name='q_9' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I9"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_9" placeholder="<?=$row["I9"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I10"] == "") {
								echo "<input name='q_10' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I10"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_10" placeholder="<?=$row["I10"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I11"] == "") {
								echo "<input name='q_11' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I11"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_11" placeholder="<?=$row["I11"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I12"] == "") {
								echo "<input name='q_12' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I12"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_12" placeholder="<?=$row["I12"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I13"] == "") {
								echo "<input name='q_13' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I13"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_13" placeholder="<?=$row["I13"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I12"] == "") {
								echo "<input name='q_14' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I14"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_14" placeholder="<?=$row["I14"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
							if($row["I15"] == "") {
								echo "<input name='q_15' type='hidden' value=''>";
							}else{
								?>
								<div class="form-group">
									<label class="control-label"><b><?=$row["I15"];?></b></label>
									<div class="col-md-9">
										<textarea class="form-control" name="q_15" placeholder="<?=$row["I15"];?>" rows="5" name="1"></textarea>
										<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
									</div>
								</div>
							<?php }
						}
					}
					?>
					<div class="form-group">
						<input type="submit" style="float:right;" class="btn btn-primary" name="app_submit">
					</div>
                </fieldset>
            </form>
        </div>
    </div>
<?php
}
?>
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
<?php }else{ ?>
<?=go("/");?>
<?php } ?>