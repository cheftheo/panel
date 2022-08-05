<?php
include("config.php");
if(!isset($_SESSION['Username'])){
    session_start();
    $errors = array();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['usernameReg']) and isset($_POST['mailReg']) and isset($_POST['passwordReg']) and isset($_POST['panelcode']) and isset($_POST['cpasswordReg'])) {
            if(!empty($_POST['usernameReg']) and !empty($_POST['mailReg']) and !empty($_POST['passwordReg']) and !empty($_POST['panelcode']) and !empty($_POST['cpasswordReg'])) {
                if (strlen($_POST['usernameReg']) > 3) {
                    if ($_POST['passwordReg'] == $_POST['cpasswordReg']) {  
                        if (str_contains($_POST['mailReg'], "@") and str_contains($_POST['mailReg'], ".")) {
                                $theUsername = $_POST['usernameReg'];
                                $thePass = $_POST['passwordReg'];
                                $theMail = $_POST['mailReg'];
                                $theCode = $_POST['panelcode'];

                                $fetchServerId = db->query("SELECT * FROM `users` WHERE `panelcode` = '$theCode'");
                                $result = mysqli_query($db,$fetchServerId);
                                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                
                                $count = mysqli_num_rows($result);
                                        
                                if($count == 1) {
                                    $sql = $paneldb->query("INSERT INTO users(username,password,mail,gameid,admin) VALUES(".$theUsername.",".$thePass.",".$theMail.",".$result['id'].",".$result['adminLvl'].")");
                                    if ($paneldb->query($sql) === TRUE) {
                                        $_SESSION['Username'] = $theUsername;
                                        $_SESSION['staff'] = $row["mail1"];
                                        $_SESSION['user_id'] = $result["id"];
                                        go("/");
                                    }else {

                                    }
                                } else {
                                    $errors = "parola gresita";
                                };
                        } else {
        
                        }
                    } else {
                        
                    }
                } else {

                }
            } else {

            }
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
    <title>Panel <?php echo 'Thor' ?> - Register</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    
    <script>var _PAGE_URL = "<?php echo 'Thor' ?>";</script>

</head>

<body class="fix-header card-no-border">
    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div> -->
    <div id="main-wrapper">
        <?php include('header.php'); ?>
        <?php include('sidebar.php'); ?>
        
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Register</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo 'Thor' ?></a></li>
                        <li class="breadcrumb-item active">Register</li>
                    </ol>
                </div>
            </div>

            <div class="modal-dialog">
            <div class="modal-content" style="background-color: transparent;border:0;">
                <div class="login-box card">
                    <div class="card-body">
                        <form action = "" method = "post">
                            <h3 class="box-title m-b-20">Register</h3>
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="usernameReg" required=""
                                        placeholder="Username"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="passwordReg" required=""
                                        placeholder="Password"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="cpasswordReg" required=""
                                        placeholder="Confirm Password"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="mailReg" required=""
                                        placeholder="Email"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="panelcode" required=""
                                        placeholder="Panel Code"> </div>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button
                                        class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit"><i class="fa fa-lock m-r-5"></i> Register</button>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="hkinWCS6fMYPEj1ZRFGqz9rmIA9WySdfkGo8oWIn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('footer.php');  ?>
</html>
