<?php
session_start();

if (isset($_POST['submit'])) {
    $con = pg_connect(
        'host=localhost port=5432 dbname=dairy user=postgres password=root'
    );

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $result = pg_query(
        "select * from users where email='$email' and password='$pass'"
    );
    $row = pg_fetch_assoc($result);

    if ($row) {
        $_SESSION['uid'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        echo "<script>alert('Customer login successful');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Customer login failed. Email or password incorrect');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<title>LOGIN</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="card">
			<div class="form">
				<h3>Login</h3>
				<form method="POST"> 
					<div class="input-field">
						<i class="fa fa-envelope"></i>
						<input type="text" placeholder="Enter your email" name="email" required>
	 				</div>
					<div class="input-field">
						<i class="fa fa-lock"></i>
						<input type="password" placeholder="Enter your password" name="pass" required> 
					</div>
					<button type="submit" name="submit">Login</button>
					<p>Don't have an account? <a href="registration.php">Signup now</a></p>
					<p style="text-align: center;"><a href="index.php" style="text-decoration: none;">Back Home</a></p>
				</form>
			</div>
			<div class="image">
				<div class="overlay"></div>
			</div>
		</div>
	</body>
</html>

