<?php
include("session.php");
$id = mysqli_real_escape_string($db,$_GET['id']);
$result12 = $db->query("SELECT * from complaints WHERE ID='$id'");
$row = $result12->fetch_assoc();

if(isset($_SESSION['Username'])) {
$rezultat24 = $db->query("SELECT * FROM `users` WHERE name='".$_SESSION["Username"]."'");
$user = $rezultat24->fetch_assoc();
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
    <title>Panel <?php echo $serverName ?> - <?php if($row["Type"] == 0) { echo "Jucător"; }else if($row["Type"] == 1) { echo "Leader";}else if($row["Type"] == 2) { echo "Helper";}else if($row["Type"] == 3) {echo "Admin";}else if($row["Type"] == 4) {echo "Factiune";} ?></title>
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
                    <h3 class="text-themecolor">Complaints / <?php if($row["Type"] == 0) { echo "Jucător"; }else if($row["Type"] == 1) { echo "Leader";}else if($row["Type"] == 2) { echo "Helper";}else if($row["Type"] == 3) {echo "Admin";}else if($row["Type"] == 4) {echo "Factiune";} ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Complaints / <?php if($row["Type"] == 0) { echo "Jucător"; }else if($row["Type"] == 1) { echo "Leader";}else if($row["Type"] == 2) { echo "Helper";}else if($row["Type"] == 3) {echo "Admin";}else if($row["Type"] == 4) {echo "Factiune";} ?></li>
                    </ol>
                </div>
            </div>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Complaint against</h4>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="col">
                                    <img class="img-circle" style="width: 66px;" src="<?=$serverURL;?>skins/avatars/<?=select_info_user($row["UsernameR"], "Model"); ?>.png">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col">
                                    <h5><a href="<?=$serverURL;?>user/<?=$row["UsernameR"]?>"><?=$row["UsernameR"]?></a></h5>
                                    <p class="m-0">Factiune: 
									<?php
									$rezultat = $db->query("SELECT * FROM `users` WHERE name='".$row["UsernameR"]."'");
									$numefactiune1 = $rezultat->fetch_assoc();
									
									if($numefactiune1["Member"] == 0) { ?> Civilian <?php } else {
										$result4 = $db->query("SELECT * from `factions` WHERE ID = ".$numefactiune1["Member"]."");
										$factionName = $result4->fetch_assoc();
										echo $factionName["Name"];
									}
									
									?></p>
                                    <p class="m-0">Level: <?=select_info_user($row["UsernameR"], "Level"); ?></p>
                                    <p class="m-0">Ore jucate: <?=select_info_user($row["UsernameR"], "ConnectedTime"); ?></p>
                                    <p class="m-0">Warnings: <?=select_info_user($row["UsernameR"], "Warnings"); ?>/3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        Last Login: <?=date("d/m/Y H:i:s", $numefactiune1["lastOn"]);?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Complaint creator</h4>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="col">
                                    <img class="img-circle" style="width: 66px;" src="<?=$serverURL;?>skins/avatars/<?=select_info_user($row["Username"], "Model"); ?>.png">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col">
                                    <h5><a href="<?=$serverURL;?>user/<?=$row["Username"]?>"><?=$row["Username"]?></a></h5>
                                    <p class="m-0">Factiune: 
									<?php
									$rezultat = $db->query("SELECT * FROM `users` WHERE name='".$row["Username"]."'");
									$numefactiune = $rezultat->fetch_assoc();
									
									if($numefactiune["Member"] == 0) { ?> Civilian <?php } else {
										$result4 = $db->query("SELECT * from `factions` WHERE ID = ".$numefactiune["Member"]."");
										$factionName = $result4->fetch_assoc();
										echo $factionName["Name"];
									}
									
									?>
	
									</p>
                                    <p class="m-0">Level: <?=select_info_user($row["Username"], "Level"); ?></p>
                                    <p class="m-0">Ore jucate: <?=select_info_user($row["Username"], "ConnectedTime"); ?></p>
                                    <p class="m-0">Warnings: <?=select_info_user($row["Username"], "Warnings"); ?>/3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        Last Login: <?=date("d/m/Y H:i:s", $numefactiune["lastOn"]);?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Complaint details</h4>
                        <ul class="basic-list list-icons">
                            <li>
                                <h6>Informatii</h6>
                                <p>Status: <?php if($row["Status"] == 0) {?>
												<td><span class="label label-success">Open</span> </td>
												<?php }else{ ?>
												<td><span class="label label-danger">Closed</span>  ( <?php echo $row["Message"];?> )  </td>
												<?php } ?></p>
                                <p data-placement="left" data-trigger="hover" data-toggle="tooltip" title="" data-original-title="<?=date("d/m/Y H:i:s", $row["Date"]);?>">Created: <?php echo time_elapsed_string("@".$row["Date"]) ?></p>
                            </li>
                            <li>
                                <h6>Dovezi</h6>
                                <p>
									<?=htmlspecialchars($row["Proofs"], ENT_QUOTES, 'UTF-8');?><h5>
                                </p>
                            </li>
                            <li>
                                <h6>Detalii</h6>
                                <p>
									<?=htmlspecialchars($row["Details"], ENT_QUOTES, 'UTF-8');?><h5>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
			
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Complaint commets</h4>
						<ul class="list-unstyled">
						<?php
						$sql = "SELECT * FROM `complaints-comments` WHERE ComplaintID='".$id."'";
						$result = $db->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
							$result1 = $db->query("SELECT * FROM `users` WHERE name='".$row["Username"]."'");
							$online = $result1->fetch_assoc();
							?>
							<li class="media">
								<img alt="image" class="d-flex img-circle rounded" style="width:50px;" src="<?=$serverURL;?>skins/avatars/<?=select_info_user($row["Username"], "Model"); ?>.png">
								<div class="media-body">
									<h5 class="mt-0 mb-1 mt-2">
									<b><?=$row["Username"];?></b>
									<?php
									if($online["Admin"] > 0) {
										echo "<span class=\"badge badge-primary\">Admin</span>";
									}else if($online["Helper"] > 0) {
										echo "<span class=\"badge badge-primary\">Helper</span>";
									}
									?>
									: <?=htmlspecialchars($row["Text"], ENT_QUOTES, 'UTF-8');?><h5>
									<small class="text-muted"><?php echo time_elapsed_string("@".$row["Date"]) ?></small>
								</div>
							</li>
							<?php
							}
						}
						?>
						</ul>
						<?php if(isset($_SESSION['Username'])) { ?>
                        <hr>
							<form method="POST" id="comment" action="<?=$serverURL;?>insert-complaints-comment.php">
								<div class="form-group">
									<label class="control-label">Comment</label>
									<div>
										<textarea name="_comment" rows="3" placeholder="Comment" class="form-control"></textarea>
										<input type="hidden" id="link" name="link" value="<?=$_SERVER['REQUEST_URI']?>">
										<input type="hidden" id="id" name="id" value="<?=$id;?>">
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="_comment_submit" class="btn btn-success float-right">
								</div>
							</form>
						<?php } ?>
						
                    </div>
					
                </div>
				
            </div>
			
        </div>
		
    </div>
	
</div>
			<?php
			if(isset($_SESSION['Username'])) {
			if($user["Admin"] > 1) { ?>
			<form method="POST" id="comment" action="<?=$serverURL;?>manage-complaints.php">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Close Complaints</h4>
                    </div>
                    <div class="card-footer">
					<button type="submit" class="yea btn btn-danger float-right">Close Complaints</button>
					<input type="hidden" id="link" name="link" value="<?=$_SERVER['REQUEST_URI']?>">
					<input type="hidden" id="id" name="id" value="<?=$id;?>">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script src="<?=$serverURL;?>assets/js/complaint.js"></script>
        </body>
</html>
