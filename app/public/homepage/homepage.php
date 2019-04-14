 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8" />
 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 	<title>Register</title>

 	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
 	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
 
 	<link rel="Stylesheet" href="../../../src/homepage/homepageStyle.css">
 	<script src="../../../src/homepage/homepageScript.js"></script>
 </head>
 
 <body>
 	<section class="row justify-content-center" >
		<div class="col-10 col-sm-9 col-md-7 col-lg-5 col-xl-4" >
			<img src="../../../images/logo1.png" alt="logo" id="logo">
		</div>
	</section>

	<section class="row justify-content-center" >
		<div class="col-10 col-sm-9 col-md-7 col-lg-5 col-xl-4" id="form">
			<div class="buttons">
				<button class="topButtons active" id="loginButton">Log In</button>
				<button class="topButtons" id="singupButton">Sing Up</button>
			</div>

		 	<div name="registerForm" id="registerForm">
		 		<h1>Sign Up for Free</h1>
				<div class="form-group">
					<label>Email:</label></br>
					<input class="inputs" type="email" name="email" id="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label>Password:</label></br>
					<input class="inputs" type="password" name="password" id="password" placeholder="Password">
				</div>
				<div class="form-group">
					<label>Repeat password:</label></br>
					<input class="inputs" type="password" name="repeatedPassword" id="repeatedPassword" placeholder="Repeat password">
				</div></br>
				<button class="downButtons" type="submit" onclick="sendToScriptRegister()" id="registerButton">Register</button>
				<div class="alert alert-danger" role="alert" name="wrongRegistration" id="wrongRegistration"></div>
			</div>
			
			<div class="alert alert-success" role="alert" name="correctRegistration" id="correctRegistration"></div>
			
			<div name="loginForm" id="loginForm">
				<h1>Welcome Back!</h1>
				<div class="form-group">
					<label>Email:</label>
					<input type="Login" class="inputs" placeholder="Email" name="emailLog" id="emailLog">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="inputs" placeholder="Password" name="passwordLog" id="passwordLog">
				</div>
				</br>
				<button class="downButtons" type="submit"  onclick="sendToScriptLogin()" id="bottomLoginButton">Log in</button>
				<div class="alert alert-danger" role="alert" name="wrongLogin" id="wrongLogin"></div>
			</div>
		</div>
	</section>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
 </html>
 <script src="../../../src/register/registerScript.js"></script>
 <script src="../../../src/login/loginScript.js"></script>