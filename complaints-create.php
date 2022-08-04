<?php
include("session.php");

if(!isset($_SESSION['Username'])) {
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
    <title>Panel <?php echo $serverName ?> - Complaints / Create</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />

    
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
                    <h3 class="text-themecolor">Complaints / Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Complaints / Create</li>
                    </ol>
                </div>
            </div>
<div class="container-fluid">
<?php
if(isset($_SESSION['errorinsertapplication'])) {
	echo $_SESSION['errorinsertapplication'];
	unset($_SESSION['errorinsertapplication']);
}
?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="inbox-panel">
                        <br>
                        <form class="form-connexion" method="POST" autocomplete="off" method="POST" action="<?=$serverURL;?>insert-complaints.php">
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <div>

                                    <select class="_cs" name="_selected" style="width:100%">
                                        <option></option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tip <i class="fa fa-spinner fa-spin fa-fw _lt" style="display:none;"></i></label>
                                <div>
                                    <select class="form-control _type" name="_type">
                                        <option value="-1">Niciunul</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Motiv <i class="fa fa-spinner fa-spin fa-fw _lr" style="display:none;"></i></label>
                                <div>
                                    <select class="form-control _reason" name="_reason">
                                        <option value="-1">Niciunul</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Dovezi</label>
                                <div>
                                    <input type="text" name="dovezi" placeholder="Dovezi" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Detalii</label>
                                <div>
                                    <textarea name="description" rows="5" placeholder="Detalii" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-outline-danger"> Create</button>
                                <input type="hidden" name="link" value="<?=$_SERVER['REQUEST_URI']?>">
                                <input type="hidden" name="_access" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_SESSION['erroare30minute'])) {
	echo $_SESSION['erroare30minute'];
	unset($_SESSION['erroare30minute']);
}
?>
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
