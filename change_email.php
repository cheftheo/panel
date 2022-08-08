<?php
include('session.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if(!(isset($_SESSION['Username']))) return go('/');
$new_email = mysqli_real_escape_string($paneldb,$_POST['new_email']);
$current_pass = mysqli_real_escape_string($db,$_POST['current_password']);
$checkPass = $paneldb->query("SELECT * from `users` WHERE gameid='".$_SESSION['user_id']."'");
$selectPassword = $checkPass->fetch_assoc();


if($current_pass == $selectPassword["pass"]) {
	$token = getToken(32);
	$mail = new PHPMailer(true);
	// try {
	// 	$token = getToken(32);
	// 	$mail = new PHPMailer(true);
	// 	$mail->isSMTP();
	// 	$mail->Host       = "cpanel.illusioncloud.biz";
	// 	$mail->SMTPDebug  = 2;
	// 	$mail->SMTPAuth   = true;
	// 	$mail->SMTPSecure   = 'ssl';
	// 	$mail->Port       = 465;
	// 	$mail->Username   = "admin@thorhub.ro"; //Adresa ta GMAIL
	// 	$mail->Password   = "ParolaAdminMail#12"; //Parola la contul tau GMAIL
	// 	$mail->setFrom($mail->Username, 'Thor - No-reply');
	// 	$mail->addAddress($_SESSION['Email'], "Thor Panel Bot");
	// 	$mail->isHTML(true);

	// 	$mail->Subject = 'Change thor panel mail';
	// 	$mail->Body    = '
	// 			Salut, '.$_SESSION["Username"].',<br><br>		
	// 			Ai primit acest e-mail datorita faptului ca ai solicitat schimbarea adresei pe panel.thorhub.ro 
	// 			Daca nu esti tu cel ce a facut aceasta solicitare, te rugam raporteaza acest fapt unui Administrator de pe panel/discord si NU apasa pe link-ul de mai jos.<br>
	// 			<hr>
	// 			Instructiuni:
	// 			<hr><br>
	// 			Apasa click pe link-ul de mai jos si vei fii automat redirectionat.<br>
	// 			<a href="'.$serverURL.'/activate.php?email='.$_SESSION['Email'].'&key='.$token.'" target="_blank">'.$serverURL.'/activate.php?email='.$_SESSION['Email'].'&key='.$token.'</a> <br><br>
	// 			Link-ul expirat automat dupa o ora.</body>';
	// 	$mail->AltBody = '';
	// 	$mail->send();

	// 	mysqli_query($paneldb, "INSERT INTO emailverification (Email,Token,ExpirationTime) VALUES ('".$_SESSION['Email']."','".$token."', DATE_ADD(now(), INTERVAL 1 HOUR))");
	// 	$_SESSION["NEW_EMAIL"] = $new_email;
	// 	$_SESSION['CONFIRMATION_EMAIL'] = 1;
	// 	echo 'Message has been sent';
	// } catch (Exception $e) {
	// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	// }

	try {
		//Server settings
		$mail->SMTPDebug  = 1;   
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = 'cpanel.illusioncloud.biz'; // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'admin@thorhub.ro'; // SMTP username
		$mail->Password = 'ParolaAdminMail#12'; // SMTP password
		$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
		$mail->Port = 465; // TCP port to connect to

		//Recipients
		$mail->setFrom('admin@thorhub.ro', 'Bot Thor Panel');
		$mail->addAddress($_SESSION['Email'], 'Thor - No-reply');     //Add a recipient
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Change thor panel mail';
		$mail->Body    = '
			Salut, '.$_SESSION["Username"].',<br><br>		
			Ai primit acest e-mail datorita faptului ca ai solicitat schimbarea adresei pe panel.thorhub.ro 
			Daca nu esti tu cel ce a facut aceasta solicitare, te rugam raporteaza acest fapt unui Administrator de pe panel/discord si NU apasa pe link-ul de mai jos.<br>
			<hr>
			Instructiuni:
			<hr><br>
			Apasa click pe link-ul de mai jos si vei fii automat redirectionat.<br>
			<a href="'.$serverURL.'/activate.php?email='.$_SESSION['Email'].'&key='.$token.'" target="_blank">'.$serverURL.'/activate.php?email='.$_SESSION['Email'].'&key='.$token.'</a> <br><br>
			Link-ul expirat automat dupa o ora.</body>';

		$mail->send();
		alert('Message has been sent');
	} catch (Exception $e) {
		echo $mail->ErrorInfo;
	}
	
}else{
	echo "<meta http-equiv=\"refresh\" content=\"0; url=/profile.php?user=".$_SESSION['user_id']."\">";
}
