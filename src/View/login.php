<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Login</title>
</head>
<body>
<h1>User Login</h1>
<form action="login.php" method="POST">
	<label for="email">Email:</label><br>
	<input type="email" id="email" name="email" required><br><br>

	<label for="password">Password:</label><br>
	<input type="password" id="password" name="password" required><br><br>

	<input type="submit" value="Login">
</form>
</body>
</html>