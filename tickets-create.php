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
    <title>Panel <?php echo $serverName ?> - Tickets / Create</title>
    <link href="<?=$serverURL;?>assets/plugins/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?=$serverURL;?>assets/css/style.css" rel="stylesheet">
    <link href="<?=$serverURL;?>assets/css/colors/red-dark.css" id="theme" rel="stylesheet">
	<link href="<?=$serverURL;?>assets/plugins/wizard/steps.css" rel="stylesheet"> 

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
                    <h3 class="text-themecolor">Ticket / Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Panel <?php echo $serverName ?></a></li>
                        <li class="breadcrumb-item active">Ticket / Create</li>
                    </ol>
                </div>
            </div>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title">Step wizard</h4>
                    <form action="<?=$serverURL;?>insert-ticket.php" method="POST" class="tab-wizard wizard-circle">
                        <input type="hidden" name="_token" value="<?php echo $csfr ?>">
                        <!-- Step 1 -->
                        <h6>Informatii</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br>
                                        <ul>
                                            <h5>Informatii utile</h5>
                                            <br>
                                            <li>Inainte de a deschide un tichet, citeste raspunsurile intrebarilor puse frecvent
                                                <a href="#">aici (click)</a>.</li>
                                            <li>De obicei se raspunde la tichete in maxim 24 de ore.</li>
                                            <li>Incercati sa spuneti clar ce problema aveti in tichet si sa dati detalii despre problema avuta, eventual sa aduceti si dovezi/poza, pentru a ne putea da seama mai usor despre ce este vorba.</li>
                                            <li>Daca ati gasit un bug mai deosebit ce nu trebuie dezvaluit tuturor pe forum, puteti deschide un ticket de tip "Problema generala".
                                            </li>
                                            <li>Daca bugul gasit este unul minor, de care nu se poate abuza, te rugam sa postezi
                                                <a href="#">aici</a>.</li>
                                            <li>Sugestiile se fac pe forum, nu in tickete! Daca doresti sa faci o sugestie apasa
                                                <a href="#">aici</a>.</li>
                                            <br>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <ul>
                                            <h5>Nu imi pot accesa contul din joc</h5>
                                            <br>
                                            <li>Daca nu mai stii ce parola ai, incearca sa folosesti
                                                <a href="#">optiunea de recuperare parola (click)</a>.</li>
                                            <li>Daca nu ai un email setat pe cont, nu iti poti recupera parola si contul.</li>
                                            <li>Daca ai un email setat pe cont pe care nu-l poti accesa, nu iti poti recupera contul.</li>
                                            <li>Daca are altcineva acces la contul tau, este DOAR din vina ta, iar adminii nu te vor ajuta sa-l recuperezi.</li>
                                            <li>Mai multe informatii despre asta poti gasi
                                                <a href="#">aici (click)</a>.</li>
                                            <li>Nu se pot deschide tichete pentru conturi pierdute/sparte deoarece adminii nu se ocupa de recuperarea conturilor pierdute de playeri.</li>
                                            <br>
                                            <br>
                                        </ul>
                                    </div>
                                </div>

                        </section>
                        <!-- Step 2 -->
                        <h6>Tipul ticket-ului</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <label for="intType1">Alege tipul ticket-ului :</label>
                                    <select class="custom-select form-control _type" name="_type">
                                        <option value="0">Probleme generale (legate de joc)</option>
                                        <option value="1">Probleme legate de securitatea conturilor</option>
                                        <option value="2">Probleme legate de forum</option>
                                        <option value="3">Inselatorii (recuperare bunuri/altceva)</option>
                                        <option value="4">Raportare buguri</option>
                                    </select>
                                </div>
                            </div>
                        </section>

                        <!-- Step 3 -->
                        <h6>Tipul ticket-ului</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <label for="intType1">Alege priorietatea ticket-ului:</label>
                                    <select class="custom-select form-control _priority" name="_priority">
                                        <option value="0">Scazuta</option>
                                        <option value="1">Normala</option>
                                        <option value="2">Mare</option>
                                        <option value="3">Foarte mare</option>
                                    </select>
                                </div>
                            </div>
                        </section>
                        <!-- Step 4 -->
                        <h6>Descriere</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description1">Informatii despre problema</label>
                                        <textarea name="description" id="description1" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
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

    	<script src="<?=$serverURL;?>assets/plugins/wizard/jquery.steps.min.js"></script>
	<script>
		$(".tab-wizard").steps({
			headerTag: "h6",
			bodyTag: "section",
			transitionEffect: "fade",
			titleTemplate: '<span class="step">#index#</span> #title#',
			labels: {
				finish: "Submit"
			},
			onFinished: function (event, currentIndex) {
				var form = $(this);
				form.submit();
			}
		});

	</script>

            </body>

</html>