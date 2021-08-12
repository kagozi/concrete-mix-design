<!DOCTYPE html>
<html>
<head>
	<title>Login/Register</title>
	<link rel="stylesheet"  href="login.css">
</head>
<body>
	 <div class="login">
	 	<link href="index.php">
	 		<img class="login_logo" src="highrise.jpg">
			 <div class="login_container">
			 	<h1>Sign-in</h1>
			 	<form action="">
			 		<h5>User-name</h5>
			 		<input type="text" name="username">

			 		<h5>E-mail</h5>
			 		<input type="text" name="email">

			 		<h5>Password</h5>
			 		<input type="password" name="password">
			 		<button type="submit" 
			 		class="login_signInButton" onclick="user_login()">Sign In
			 		</button>
			 		<p>Deriving new ways to build a sustainable future. Welcome</p>
			 		<button type="submit" class="login_registerButton" onclick="user_register()">Create your account</button>
			 	</form>	
			 </div>
	 </div>
</body>
</html>