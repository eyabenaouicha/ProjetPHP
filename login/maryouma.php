<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>
<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="signup">
			<form action="register.php" method="post">
				<label for="chk" aria-hidden="true">Register now!</label>
				<input type="text" name="inputnom" required placeholder="enter your first Name">
				<input type="text" name="inputprenom" required placeholder="enter your last name">
				<input type="email" name="inputemail" required placeholder="enter your Email">
				<input type="text" name="inputnumero" required placeholder="enter your Number">
				<input type="text" name="inputcin" required placeholder="enter your CIN">
				<input type="password" name="inputmdp" required placeholder="enter your password">
				<button>Register</button>
			</form>
		</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login </label>
					<input type="email" name="inputemail" required placeholder="enter your email">
                    <input type="password" name="inputmdp" required placeholder="enter your password">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>