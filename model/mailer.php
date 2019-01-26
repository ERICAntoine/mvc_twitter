<?php

	require_once 'vendor/autoload.php';
try {
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465 ,'ssl'));
	$transport->setUsername('noreplymymeetic@gmail.com');
	$transport->setPassword('admin.root');

	// SOUTENANCE VAR FOLDER PATH
	$var = 'http://localhost/html/PHP_my_meetic/my_meetic/';

	$mailer = new Swift_Mailer($transport);
	$message = (new Swift_Message('Confirmation de votre compte my_meetic.'));
	$message->setFrom(['noreplymymeetic@gmail.com' => 'my_meetic - ADMIN']);
	$message->setTo($email);
	$message->setBody('
		Bienvenue sur my_meetic

		Merci d\'utiliser le lien suivant afin de confirmer votre compte my_meetic : http://localhost:1212/?confirm='.$login.'
		Bien à vous.
		Merci de ne pas répondre à ce mail.');
	$result = $mailer->send($message);
}
catch(Exception $e){
	var_dump($e->getMessage(), $e->getTraceAsString()); 
}
?>