<?php
include("session.php");
if(isset($_SESSION['Username'])) {
	$rezultat = $db->query("SELECT * FROM `users` WHERE id='".$_SESSION['user_id']."'");
	$rezultate = $rezultat->fetch_assoc();
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
    <title>Panel <?php echo $serverName ?> - Factions</title>
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
                    <h3 class="text-themecolor">Factions</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Factions</li>
                    </ol>
                </div>
            </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4>Factions</h4>
                    <?php
                    $selectarefactiuni = "SELECT * FROM factions";
                    $rezultat = $paneldb->query($selectarefactiuni);
                    if ($rezultat) {
                        if ($rezultat->num_rows > 0) {
                            while($row = $rezultat->fetch_assoc()) {
                                ?>
                                <table class="table color-table inverse-table">
                                    <tbody>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Members</th>
                                                <th>Actions</th>
                                                <th>Applications</th>
                                                <th>Ore minime</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><b> <?php echo $row["name"]; ?></b></td>
                                            <td><?php echo get_faction_count_members($row["name"]);?></td>
                                            <td>
                                                <a href="<?=$serverURL;?>members.php?factionID=<?=$row["name"]?>">lista membrii</a> /
                                                <a href="<?=$serverURL;?>">aplicatii</a>
                                                <!-- <a href="<?=$serverURL;?>applications.php?id=<?=$row["name"]?>">applications</a> -->
                                            </td>
                                            <td>
                                            <?php if(isset($_SESSION['Username'])) { ?>
                                                <?php if($rezultate["hoursPlayed"] < $row["reqHours"]) { ?>
                                                    Nu îndeplinești Condițiile
                                                <?php }else if($row["app"] == 0) { ?>
                                                    Aplicatiile sunt inchise temporar. 
                                                <?php }else if($row["app"] > 0) { ?>
                                                    <a href="<?=$serverURL;?>" class="btn btn-info">Apply</a>
                                                    <!-- <a href="<?=$serverURL;?>applicationsapp.php?id=<?php echo $row["name"]; ?>" class="btn btn-info">Apply</a> -->
                                                <?php } ?>
                                            <?php }else{ ?>
                                                Nu esti logat
                                            <?php }?>
                                            </td>
                                            <td><?php echo $row["reqHours"]; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php
                            }
                        } else {
                            echo "<p class='font-weight-bold'>Nu sunt factiuni create momentan. Te rugam sa revii mai tarziu.</p>";
                        }
                    } else {
                        echo "<p class='font-weight-bold'>Nu sunt factiuni create momentan. Te rugam sa revii mai tarziu.</p>";
                    }
                    ?>
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