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
    <title>Panel <?php echo $serverName ?> - Updates</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">

    
    <script>var _PAGE_URL = "<?php echo $serverURL ?>";</script>

</head>

<style>
.col-md-8{width:66.66666667%}
.nav-tabs-custom{margin-bottom:20px;background:#fff;box-shadow:0 1px 1px rgba(0,0,0,0.1);border-radius:3px}.nav-tabs-custom>.nav-tabs{margin:0;border-bottom-color:#f4f4f4;border-top-right-radius:3px;border-top-left-radius:3px}.nav-tabs-custom>.nav-tabs>li{border-top:3px solid transparent;margin-bottom:-2px;margin-right:5px}.nav-tabs-custom>.nav-tabs>li>a{color:#444;border-radius:0}.nav-tabs-custom>.nav-tabs>li>a.text-muted{color:#999}.nav-tabs-custom>.nav-tabs>li>a,.nav-tabs-custom>.nav-tabs>li>a:hover{background:transparent;margin:0}.nav-tabs-custom>.nav-tabs>li>a:hover{color:#999}.nav-tabs-custom>.nav-tabs>li:not(.active)>a:hover,.nav-tabs-custom>.nav-tabs>li:not(.active)>a:focus,.nav-tabs-custom>.nav-tabs>li:not(.active)>a:active{border-color:transparent}.nav-tabs-custom>.nav-tabs>li.active{border-top-color:#3c8dbc}.nav-tabs-custom>.nav-tabs>li.active>a,.nav-tabs-custom>.nav-tabs>li.active:hover>a{background-color:#fff;color:#444}.nav-tabs-custom>.nav-tabs>li.active>a{border-top-color:transparent;border-left-color:#f4f4f4;border-right-color:#f4f4f4}.nav-tabs-custom>.nav-tabs>li:first-of-type{margin-left:0}.nav-tabs-custom>.nav-tabs>li:first-of-type.active>a{border-left-color:transparent}.nav-tabs-custom>.nav-tabs.pull-right{float:none !important}.nav-tabs-custom>.nav-tabs.pull-right>li{float:right}.nav-tabs-custom>.nav-tabs.pull-right>li:first-of-type{margin-right:0}.nav-tabs-custom>.nav-tabs.pull-right>li:first-of-type>a{border-left-width:1px}.nav-tabs-custom>.nav-tabs.pull-right>li:first-of-type.active>a{border-left-color:#f4f4f4;border-right-color:transparent}.nav-tabs-custom>.nav-tabs>li.header{line-height:35px;padding:0 10px;font-size:20px;color:#444}.nav-tabs-custom>.nav-tabs>li.header>.fa,.nav-tabs-custom>.nav-tabs>li.header>.glyphicon,.nav-tabs-custom>.nav-tabs>li.header>.ion{margin-right:5px}.nav-tabs-custom>.tab-content{background:#fff;padding:10px;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.nav-tabs-custom .dropdown.open>a:active,.nav-tabs-custom .dropdown.open>a:focus{background:transparent;color:#999}.nav-tabs-custom.tab-primary>.nav-tabs>li.active{border-top-color:#3c8dbc}.nav-tabs-custom.tab-info>.nav-tabs>li.active{border-top-color:#00c0ef}.nav-tabs-custom.tab-danger>.nav-tabs>li.active{border-top-color:#dd4b39}.nav-tabs-custom.tab-warning>.nav-tabs>li.active{border-top-color:#f39c12}.nav-tabs-custom.tab-success>.nav-tabs>li.active{border-top-color:#00a65a}.nav-tabs-custom.tab-default>.nav-tabs>li.active{border-top-color:#d2d6de}
.nav{padding-left:0;margin-bottom:0;list-style:none}
.pull-right{float:right!important}
.tab-content{background:#fff;padding:10px;border-bottom-right-radius:3px;border-bottom-left-radius:3px}
.tab-pane{display:none}
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
                    <h3 class="text-themecolor"> Updates </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active"> Updates </li>
                    </ol>
                </div>
            </div>
			<div class="container-fluid">
			//
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script src="<?=$serverURL;?>assets/js/complaint.js"></script>
        </body>
</html>
