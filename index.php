<?php

include("config.php");
$csfr = getToken(24);
if(!isset($_SESSION['Username'])){
    session_start();
    $errors = array();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['username2'])) {
            $myusername = mysqli_real_escape_string($db,$_POST['username2']);
            $mypassword = mysqli_real_escape_string($db,$_POST['password2']);
        
            $sql = "SELECT * FROM `users` WHERE `username` = '$myusername' and `pass` = '$mypassword'";
            $result = mysqli_query($paneldb,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $count = mysqli_num_rows($result);
                    
            if($count == 1) {
                $_SESSION['Username'] = $row["username"];
                $_SESSION['staff'] = $row['admin'];
                $_SESSION['user_id'] = $row["gameid"];
                $_SESSION['Email'] = $row['mail'];
            } else {
                $errors = "parola gresita";
            };
        } else {

        }
    } 
}else{
    include('session.php');
}

if($errors){ echo "<script>alert('Ai gresit parola. Reincearca.')</script>"; }

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
    <title>Panel <?php echo $serverName ?> - Home</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    
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
                <h3 class="text-themecolor">Home</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body analytics-info">
                            <h4 class="card-title">Online players</h4>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="text-right"><span
                                class="counter text-success"><?php echo $onlineString; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body analytics-info">
                            <h4 class="card-title">Registered</h4>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span
                                        class="counter text-purple"><?php echo $accountCreated[0] ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body analytics-info">
                            <h4 class="card-title">Vehicles</h4>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span
                                        class="counter text-info"><?php echo $vehicles[0] ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body analytics-info">
                            <h4 class="card-title">Clans</h4>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span
                                        class="text-info"><?php echo "0" ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                if (isset($_SESSION['staff']) and $_SESSION['staff'] > 3) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST")  {
                        if (empty($_POST['anon'])) {
                            $anunt = "";
                        } else { 
                            $anunt = $_POST['anon'];    
                            post_anunt($_SESSION['Username'],$anunt);
                        }
                    }
                    ?>
                    <form method="post">
                        <textarea name="anon" rows="5" cols="100" style = "color: white; border:none; background-color: rgb(35,35,35); padding: 10px;" placeholder = "Baga anuntz"></textarea>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-outline-warning">
                    </form>
                    <?php
                }
            ?>

            <div class="row justify-content-start">
                <div class="col-md-10">
                    <div class="card feed feed-activity-list">
                        <div class="card-body clearfix">
                            <h4 class="card-title">Annoucement<div class="side-box"><i class="fa fa-bullhorn"></i></div>
                            </h4>
                            <div class="list-unstyled feed-data"></div>
                        </div>
                    </div>
                </div>

                <div class=".col-10 .col-sm-6">
                    <div class="card feed feed-activity-list">
                        <div class="card-body clearfix">
                            <h4 class="card-title">Link-uri oficiale</h4>
                            <div class = "links">
                                <a href="https://discord.gg/thorrp" class="btn btn-primary">Discord</a>
                                <a href="../mainsite" class="btn btn-primary">Site</a>
                            </div>
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

 
 <div id="login" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: transparent;border:0;">
                <div class="login-box card">
                    <div class="card-body">
                        <form action = "" method = "post">
                            <h3 class="box-title m-b-20">Sign In</h3>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="username2" required="" placeholder="Username"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="password2" required="" placeholder="Password"> </div>
                            </div>

                            <!-- Pre-Register -->
                            <div class="form-group row">
                                <div class="col-md-12 font-14">
                                    <div class="checkbox checkbox-primary pull-left p-t-0">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup"> Remember me </label>
                                    </div> <a href="register.php" id="to-recover" class="text-danger pull-right" style="font-size: 1.2em;">
                                    Register Here</a>
                                </div>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button
                                        class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit"><i class="fa fa-lock m-r-5"></i> Log In</button>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="hkinWCS6fMYPEj1ZRFGqz9rmIA9WySdfkGo8oWIn">
                        </form>

                        <!-- REGISTER -->
                        <!-- <form class="form-horizontal" id="recoverform" method="POST" action="#">
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <h3>Register</h3>
                                    <p class="text-muted">Panel Code-ul se obtine prin comanda /panelcode in-game! </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <div><input type="text" name="name1" placeholder="Name" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div><input type="password" name="password1" placeholder="Password" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div><input type="text" name="mail1" placeholder="Email" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Panel Code</label>
                                <div><input type="text" name="panelcode" placeholder="Panel Code" class="form-control"></div>
                            </div>
                            <input type="hidden" name="_token" value="hkinWCS6fMYPEj1ZRFGqz9rmIA9WySdfkGo8oWIn">
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button
                                        class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit">Register</button>
                                </div>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>