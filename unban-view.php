<?php
include('session.php');
$i = mysqli_real_escape_string($db, $_GET['id']);

if(!isset($_SESSION['Username'])) {
	go("/");
}

if(!isset($i)) {
	go("/");
}

if(isset($_SESSION['Username'])) {
$scoatere = $db->query("SELECT * FROM `unban-panel` WHERE ID='$i'");
$informatiiview = $scoatere->fetch_assoc();

$rezultat24 = $db->query("SELECT * FROM `users` WHERE name='".$_SESSION["Username"]."'");
$user = $rezultat24->fetch_assoc();

$result1 = $db->query("SELECT * FROM `users` WHERE name='".$_SESSION["Username"]."'");
$username = $result1->fetch_assoc();
}else{
	go("/");
}
if(!$informatiiview["Username"] == $_SESSION['Username'] || $username["Admin"] < 0) {
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
    <title>Panel <?php echo $serverName ?> - Unban / List</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
	<script type="text/javascript" src="<?=$serverURL;?>assets/js/jquery-1.11.2.min.js"></script>
    
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
                    <h3 class="text-themecolor">Unban / List</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Unban / List</li>
                    </ol>
                </div>
            </div>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h4>Unban</h4>
            <div class="row">
                <div class="col-sm-5">
                    <div class="row">

                        <div class="card card-default" style="border:1px solid #ddd;">
                            <div class="card-heading">
                                <h3 class="card-title">
									<i class="fa fa-file"></i>&nbsp; Details
								</h3>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item app-details-children">
                                    <strong>Created at:</strong> <?=date("d/m/Y H:i", $informatiiview["Date"]);?>
                                </div>
                                <div class="list-group-item app-details-children">
                                    <strong>Username:</strong> <a href="<?=$serverURL;?>user/<?=$informatiiview["Username"];?>"><?=$informatiiview["Username"];?></a>
                                </div>
                                <div class="list-group-item app-details-children">
                                    <strong>Status:</strong> <?php if($informatiiview["Status"] == 0) { ?> <span class="label label-success">Open</span><?php }else{ ?> <span class="label label-danger">Closed</span> <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="ibox-content m-b-sm">
                        <div class="row">
                            <label class="col-md-3 app_style"><b></b>Motiv</label>
                            <div class="col-md-9 app_style">
								<?=htmlspecialchars($informatiiview["Reason"], ENT_QUOTES, 'UTF-8');?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3 app_style"><b></b>Imagine</label>
                            <div class="col-md-9 app_style">
								<?=htmlspecialchars($informatiiview["Poza"], ENT_QUOTES, 'UTF-8');?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="col-md-3 app_style"><b></b>Alte precizari</label>
                            <div class="col-md-9 app_style">
								<?=htmlspecialchars($informatiiview["Description"], ENT_QUOTES, 'UTF-8');?>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Comments</h4>
                        <ul class="list-unstyled">
						<?php
						$sql = "SELECT * FROM `unban-comments` WHERE UnbanID='".$_GET['id']."' ORDER BY ID ASC";
						$result = $db->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
							$result1 = $db->query("SELECT * FROM `users` WHERE name='".$row["Username"]."'");
							$online = $result1->fetch_assoc();
							?>
							<ul class="list-unstyled">
							<li class="media">
							<img alt="image" class="d-flex img-circle rounded" style="width:50px;" src="<?=$serverURL;?>skins/avatars/<?=$online["CChar"]?>.png">
							<div class="media-body">
							<h5 class="mt-0 mb-1 mt-2">
							<b><?=$row["Username"];?></b>
							<?php if($online["Admin"] > 0) { ?> 
							<span class="badge badge-primary">Admin</span><?php } ?>: <?=htmlspecialchars($row["Text"], ENT_QUOTES, 'UTF-8');?></h5><h5>
							<small class="text-muted"><?php echo time_elapsed_string("@".$row["Date"]) ?></small>
							</h5></div>
							</li>
							</ul>
							<?php
							}
						}
						?>
						<hr>
						<form method="POST" id="comment" action="<?=$serverURL;?>insert-unban-comment.php">
								<div class="form-group">
									<label class="control-label">Comment</label>
									<div>
										<textarea name="_comment" rows="3" placeholder="Comment" class="form-control"></textarea>
										<input type="hidden" id="link" name="link" value="<?=$_SERVER['REQUEST_URI'];?>">
										<input type="hidden" id="id" name="id" value="<?=$_GET['id'];?>">
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="_comment_submit" class="btn btn-success float-right">
								</div>
						</form>
                        </ul>
                    </div>
					
                </div>
				
            </div>
			
        </div>
		
    </div>

</div>
<?php
if(isset($_SESSION['Username'])) {
if($user["Admin"] > 1) { ?>
<form method="POST" id="comment" action="<?=$serverURL;?>manage-unban.php">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Close Unban</h4>
                    </div>
                    <div class="card-footer">
					<button type="submit" class="yea btn btn-danger float-right">Close Unban</button>
					<input type="hidden" id="link" name="link" value="<?=$_SERVER['REQUEST_URI']?>">
					<input type="hidden" id="id" name="id" value="<?=$_GET['id'];?>">
					<br>
                    </div>
                </div>
            </div>
			</form>
<?php }} ?>
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