<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tweet-Academy</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="script_edit.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="view/assets/css/home.css">
	<link rel="stylesheet" href="view/assets/css/profil.css">
	<link rel="stylesheet" href="view/assets/css/settings.css">
	<script src="view/assets/js/autocomplete.js"></script>
	<?php include "script/css.php"?>
</head>
<body>
	<header class="fixed-top">
		<div class="navbar">
			<div class="container">
				<nav class="navbar navbar-default navbar-fixed-top w-100">
					<nav class="navbar navbar-expand-xl navbar-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
								<a class="nav-item nav-link" href="#">Notifications</a>
								<a class="nav-item nav-link" href="?c=messenger">Messages</a>
								</div>
								<div class="logo">
									<?php if($_SESSION['theme'] == "2"):?>
										<a href="?c=home" id="homeTitle" value=<?=$_SESSION["id"]?>><img src="view/assets/images/darklogo.svg"></a>';
									<?php else:?>
										<a href="?c=home" id="homeTitle" value=<?=$_SESSION["id"]?>><img src="view/assets/images/logo.svg"></a>';
									<?php endif;?>
							</div>
							<form class="form-inline" method="get">
								<input id="search_bar" name="search_bar" class="form-control mr-sm-2 search_bar" type="search" placeholder="Search" aria-label="Search">
								<input type="submit" style="position: absolute; left: -9999px"/>
							</form>
							<div class="profile">
								<div class="image-profil marg-r-10">
									<?php if($_SESSION['theme'] == "2"):?>
										<a href="?c=profil&pseudo=<?= $_SESSION["id"]?>"> <img class="images" src="view/assets/images/darkuser.svg"></a>
									<?php else:?>
										<a href="?c=profil&pseudo=<?= $_SESSION["id"]?>"> <img class="images" src="view/assets/images/user.svg"></a>
									<?php endif;?>
								</div>
								<div class="settings images marg-r-10">
									<?php if($_SESSION['theme'] == "2"):?>
										<a href="?c=settings"><img src="view/assets/images/darksettings.svg"></a>
									<?php else:?>
										<a href="?c=settings"><img src="view/assets/images/settings.svg"></a>
									<?php endif;?>
								</div>
								<div class="logout images marg-r-10">
									<?php if($_SESSION['theme'] == "2"):?>
										<a href="?logout=1"><img src="view/assets/images/darklogout.svg"></a>
									<?php else:?>
										<a href="?logout=1"><img src="view/assets/images/logout.svg"></a>
									<?php endif;?>
								</div>
							</div>
						</div>
					</nav>

				</nav>
			</div>
		</div>
	</header>
	<div class="video">
        <video autoplay muted loop id="myVideo">
		<?php if(file_exists("userImages/" . $_SESSION['id'] . '/background.mp4')):?>
			<source src="userImages/<?= $_SESSION["id"]?>/background.mp4" type="video/mp4">
		<?php else: ?>
			<source src="view/assets/images/video.mp4" type="video/mp4">
		<?php endif;?>
		</video>
    </div>

	<!--<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-collapse navbar-collapse-1 collapse">
				<ul class="nav navbar-nav">
					<li>
						<a title="Home" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
					</li>
					<li class="disabled">
						<a title="Notifications (non disponible)" href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
					</li>
					<li class="active">
						<a title="Messages" href="?c=messenger"><span class="glyphicon glyphicon-envelope"></span> Messages</a>
					</li>
				</ul>
				<div class="navbar-form navbar-right">
					<div class="form-group has-feedback">
						<form action="search.php" method="GET">
							<input type="text" name="search" class="form-control-nav" id="search" placeholder="Rechercher..">
							
							<button type="submit" name="searchbutton" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-search form-control-feedback"></span></button>
						</form>
					</div>
					
					
					<?php //include "script/avatar.php"?>

					<a class="btn btn-primary" href="?logout=1" role="button" id="tweet">Logout</a>
				</div>
			</div>
		</div>
	</div>-->