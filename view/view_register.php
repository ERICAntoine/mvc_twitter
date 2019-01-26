<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tweet-Academy</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="view/assets/css/register.css" rel="stylesheet">
</head>
<body>
	<div class="video">
        <video autoplay muted loop id="myVideo">
        	<source src="view/assets/images/video.mp4" type="video/mp4">
        </video>
    </div>
	<div class="container-fluid">
		<div class="row flex">
			<div class="left">
				<div class="left_under">
					<div class="logo">
						<img src="view/assets/images/logo.svg">
					</div>
					<form method="post" action="">  
						<fieldset>  
							<div class="form-group">  
								<input class="form-control" placeholder="Pseudo" name="pseudo" type="text" autofocus>  
							</div> 
							<div class="form-group">  
								<input class="form-control" placeholder="E-mail" name="email" type="email">  
							</div>  
							<div class="form-group">  
								<input class="form-control" placeholder="First name" name="firstname" type="text">  
							</div> 
							<div class="form-group">  
								<input class="form-control" placeholder="Last name" name="lastname" type="text">  
							</div> 
							<div class="form-group">  
								<input class="form-control" placeholder="dd/mm/yyyy" name="birthday" type="date">  
							</div>
							<div class="form-group">  
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">  
							</div>
							<div class="form-group">  
								<input class="form-control" placeholder="Password Confirm" name="passConfirm" type="password" value="">  
							</div>   
							<div class="form-group">  
							<label for="theme"> Select a theme</label>           
								<select class="form-control" id="theme" name="theme">
									<option value="1">Light</option> 
									<option value="2" selected>Dark</option>
								</select>								
							</div>  
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Register" name="register" > 
						</fieldset>  
					</form>
					<form class="log" method="post" action="">   
						<div class="panel-body">
							<div class="form-group">
								<input class="form-control" placeholder="Pseudo" name="pseudo" type="text"> 
							</div>
							<div class="form-group"> 
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">  
							</div>
								<div class="form-group">
									<input type="submit" value="Log-in" name="log-in" class="btn btn-lg btn-block btn-primary" >
							</div>
						</div>
					</form>
				</div>
	
			</div>
		</div>
	</div>
</body>
</html>