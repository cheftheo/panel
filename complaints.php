<?php
include("session.php");
$item_per_page 		= 5;
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
    <title>Panel <?php echo $serverName ?> - Complaints</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
	<script type="text/javascript" src="<?=$serverURL;?>assets/js/jquery-1.11.2.min.js"></script>
    
    <script>var _PAGE_URL = "<?php echo $serverURL ?>";</script>

</head>

<!-- Ce faci coaie, te uiti la coduri? Sugi pula bă -->
<script type="text/javascript">
$(document).ready(function() {
	$("#results" ).load( "paginatie_complaints.php");
	$("#results").on( "click", ".pagination a", function (e){
		e.preventDefault();
		$(".loading-div").show();
		var page = $(this).attr("data-page");
		$("#results").load("paginatie_complaints.php",{"page":page}, function(){
			$(".loading-div").hide();
		});
		
	});
});
</script>

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
                    <h3 class="text-themecolor">Complaints</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Complaints</li>
                    </ol>
                </div>
            </div>

<div class="container-fluid">
    <a href="<?=$serverURL;?>complaints-create.php" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Complaint Create</a>
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="side-box">
                        <i class="fa fa-legal"></i>
                    </div>
                    <h4 class="card-title">Reclamatii</h4>
                    <hr>

                    <div class="row m-t-40">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-inverse" style="background-color: #4CAF50 !important">
                                <div class="box text-center">
                                    <h1 class="font-light text-white"><?=$complaintscount[0];?></h1>
                                    <h6 class="text-white">Complaints</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-inverse card-danger">
                                <div class="box text-center">
                                    <h1 class="font-light text-white"><?=$factionsCount12[0];?></h1>
                                    <h6 class="text-white">Resolved</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card card-inverse card-info card-warning">
                                <div class="box text-center">
                                    <h1 class="font-light text-white"><?=$factionsCount13[0];?></h1>
                                    <h6 class="text-white">Total Complaints</h6>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
					<div id="results"></div>
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