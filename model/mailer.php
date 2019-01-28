<?php

	require_once 'vendor/autoload.php';
try {
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465 ,'ssl'));
	$transport->setUsername('noreplymymeetic@gmail.com');
	$transport->setPassword('admin.root');

	// SOUTENANCE VAR FOLDER PATH
	
	$var = 'http://localhost/mvc_tweet/';

	$mailer = new Swift_Mailer($transport);
	$message = (new Swift_Message('Confirmation de votre compte twitter.'));
	$message->setFrom(['noreplymymeetic@gmail.com' => 'twitter - ADMIN']);
	$message->setTo($email);
	$message->setBody('
		Bienvenue sur twitter

		Merci d\'utiliser le lien suivant afin de confirmer votre compte twitter : http://localhost/mvc_tweet/?confirm='.$pseudo.'
		Bien à vous.
		Merci de ne pas répondre à ce mail.');
	$result = $mailer->send($message);
}
catch(Exception $e){
	var_dump($e->getMessage(), $e->getTraceAsString()); 
}
?>