<?php

include 'model/pdoConnect.php';
include 'model/session.php';

if (!isset($_SESSION['pseudo'])) {
	if (isset($_GET['confirm']) && $_GET['confirm'] != '') {
		include 'model/confirmation.php';
		Confirm::confirm($_GET['confirm']);
	} else {
		include 'view/view_register.php';
		include 'model/model_register.php';
	}
}

else if (isset($_GET['c']) && $_GET['c'] == 'home') {
	include 'model/model_home.php';
	include 'view/view_home.php';
}

else if(isset($_GET["c"]) && $_GET["c"] == "settings")
{
	include "model/model_settings.php";
	include 'view/view_editProfil.php';
}

else if (isset($_GET['c']) && $_GET['c'] == 'profil') {
	include 'model/model_profil.php';
	//$data = Profil::display();
	
	if (isset($_GET['editProfil']) && $_GET['c'] != '') {
		Profil::edit();
		include 'view/view_editProfil.php';
	} else {
		include 'view/view_profil.php';
	}
}
else if(isset($_GET["c"]) && $_GET["c"] == "follow")
{
	include 'model/model_follow.php';

	if(isset($_GET["followers"]) && $_GET["c"] == "follow") {
		$follow = FollowPage::follower();
		include 'view/view_follow.php';
	} else {
		$follow = FollowPage::following();
		include 'view/view_follow.php';
	}
}

else if (isset($_GET['c']) && $_GET['c'] == 'messenger') {
	include 'view/view_messenger.php';
}
else if(isset($_GET['search_bar'])){
	
	include "model/model_search.php";
	$search = Search::searchAll();
	include 'view/view_search.php';
	
	
}

else if (isset($_GET['confirm']) && $_GET['confirm'] != '') {
	include 'model/confirmation.php';
	Confirm::confirm($_GET['confirm']);
}

else {
	include 'model/model_home.php';
	include 'view/view_home.php';
}
//echo 'SESSION : ';
//var_dump($_SESSION);
//echo '<br>-----------------------------------<br> POST : ';
//var_dump($_POST);

?>