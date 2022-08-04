<?php
include('session.php');

if(!isset($_SESSION['Username'])){
	echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
}else{
	check_if_user_have_acces_to_leader_panel($_SESSION['Username']);
	check_if_user_is_leader_to_x_faction($_SESSION['Username']);
	
	if(isset($_POST["question1"])) {
		$sql = "UPDATE factions SET I1='".$_POST['question1']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question2"])) {
		$sql = "UPDATE factions SET I2='".$_POST['question2']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question3"])) {
		$sql = "UPDATE factions SET I3='".$_POST['question3']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question4"])) {
		$sql = "UPDATE factions SET I4='".$_POST['question4']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question5"])) {
		$sql = "UPDATE factions SET I5='".$_POST['question5']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question6"])) {
		$sql = "UPDATE factions SET I6='".$_POST['question6']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question7"])) {
		$sql = "UPDATE factions SET I7='".$_POST['question7']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question8"])) {
		$sql = "UPDATE factions SET I8='".$_POST['question8']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question9"])) {
		$sql = "UPDATE factions SET I9='".$_POST['question9']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question10"])) {
		$sql = "UPDATE factions SET I10='".$_POST['question10']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question11"])) {
		$sql = "UPDATE factions SET I11='".$_POST['question11']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question12"])) {
		$sql = "UPDATE factions SET I12='".$_POST['question12']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question13"])) {
		$sql = "UPDATE factions SET I13='".$_POST['question13']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question14"])) {
		$sql = "UPDATE factions SET I14='".$_POST['question14']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
	}
	if(isset($_POST["question15"])) {
		$sql = "UPDATE factions SET I15='".$_POST['question15']."' WHERE id='".$_GET['id']."'";
		if ($db->query($sql) === TRUE) {
			header("Refresh:0");
		} else {
			echo "Error updating record: " . $db->error;
		}
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
    <title>Panel <?php echo $serverName ?> - Faction Leader Panel</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">

    
    <script>var _PAGE_URL = "<?php echo $serverURL ?>";</script>

</head>

<style>
@media (min-width:992px){
.col-md-9{float:left}
.col-md-9{width:75%}
}
</style>

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
                    <h3 class="text-themecolor">Faction Leader Panel</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Faction Leader Panel</li>
                    </ol>
                </div>
            </div>


<?php
$rezultat = $db->query("SELECT * from `factions` WHERE ID='".mysqli_real_escape_string($db, $_GET['id'])."'");
$factiune = $rezultat->fetch_assoc();
?>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h4>Leader Panel</h4>
			<div class="col-md-9">
				<div class="panel" style="padding: 10px">
					<h5>Manage the questions for <i><?=get_faction($factiune["ID"], $factiune["ID"]);?></i></h5><hr>
					<form method="post">
						<i class="fa fa-info-circle"></i> Question will appear exactly in same order as here!
						<hr>
					<?php
					for ($i = 1; $i < 16; $i++){
					$test = "I".$i;
					$result = $db->query("SELECT $test from factions WHERE ID='".$_GET['id']."'");
					$online = $result->fetch_row();
					?>
						<div class="input-group" style="margin-bottom: 5px">
							<input class="form-control" type="test" name="question<?=$i;?>" value="<?php echo $online[0]; ?>">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit" name="edit<?=$i;?>"><i class="fa fa-edit"></i></button>
							</span>
						</div>
					<?php
					}
					?>
						</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel" style="padding: 10px">
					<h5>Applications</h5>
						<form method="post" action="set-faction-level.php?id=<?php echo $_GET['id']?>&type=onoroff">
							<?php if($factiune["App"] == 1) { ?>
							<button type="submit" id="turnoff" name="turnoff" class="btn btn-success btn-outline">Turn OFF</button>
							<?php }else{ ?>
							<button type="submit" id="turnon" name="turnon" class="btn btn-success btn-outline">Turn ON</button>
							<?php } ?>
							<?php if($factiune["App"] == 1) { ?>
							<input type="hidden" id="turnoff" name="turnoff" value="0">
							<?php }else{ ?>
							<input type="hidden" id="turnon" name="turnon" value="1">
							<?php } ?>
							<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']?>">
							<input type="hidden" id="link" name="link" value="<?=$_SERVER['REQUEST_URI']?>">
						</form>
						<hr>
						<form method="post" action="set-faction-level.php?id=<?php echo $_GET['id']?>&type=setlevel">
						<div class="input-group">
							<input class="form-control" type="text" name="levl" placeholder="Level: <?php echo $factiune["MinLevel"];?>">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit" name="update_lvl">Update</button>
								<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']?>">
								<input type="hidden" id="link" name="link" value="<?=$_SERVER['REQUEST_URI']?>">
							</span>
						</div>
						</form>
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
	<?php
}
?>