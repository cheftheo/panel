<?php
include("config.php");
if(!isset($_SESSION['Username'])){
    $myusername1 = $_POST['name1'];

    // post -> name1, password1, mail1
    $theCode = $_POST['panelcode'];
    $checkPanelCodeQ = $db->query("SELECT * from `users` WHERE `panelCode` = '$theCode'");
    $registerData = $checkPanelCodeQ->fetch_assoc();
    if ($registerData) {
        if ($registerData["panelCode"] == $_POST['panelcode']) {
            if ($registerData["username"] !== $myusername1) {
                if ($registerData["mail"] !== $_POST['mail1']) {
                    
                    // Create panel-user in db
                    $sql = $db->query("INSERT INTO panel_users(id,username,password,mail) VALUES(".registerData["id"].",".$myusername1.",".$_POST['password1'].",".$_POST['mail1'].")");
                    if ($db->query($sql) === TRUE) {
                        $_SESSION['Username'] = $myusername1;
                        $_SESSION['Email'] = $row["mail1"];
                        $_SESSION['user_id'] = $row["id"];
                        go("/");
                    } else {
                        echo "<script>alert('razike sugi pula')</script>";

                    }
                } else {
                    echo "<script>alert('razike sugi pula')</script>";
                }
            } else { 
                echo "<script>alert('razike sugi pula')</script>";
            }
        } else {
            echo "<script>alert('razike sugi pula')</script>";
        }
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
                                    <input class="form-control" type="text" name="username22" required=""
                                        placeholder="Username"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="password22" required=""
                                        placeholder="Password"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="cpassword2" required=""
                                        placeholder="Confirm Password"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="mail22" required=""
                                        placeholder="Email"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="panelcode2" required=""
                                        placeholder="Panel Code"> </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include('footer.php');  ?>
</html>
