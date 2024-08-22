<?php
	if(isset($_POST["submit"]))
	{
	   $con = pg_connect("host=localhost port=5432 dbname=dairy user=postgres password=root");

	   $name = $_POST["name"];
	   $address = $_POST["address"];
	   $phone = $_POST["phone"];
	   $email = $_POST["email"];
	   $pass = $_POST["pass"];

	   $result = pg_query($con, "select * from users where email='$email'");
	   $row = pg_fetch_row($result);
	   if($row)
	   {
	?>
	<script type="text/javascript">
	   alert("Email already registered. Continue to login");
	   location.href = "login.php";
	</script>
	<?php
	   }
	   else
	   {
	      pg_query($con, "insert into users(name, address, phone, email, password) values('$name', '$address', '$phone', '$email', '$pass')");
	?>
	<script type="text/javascript">
	   alert("User registered successfully. Continue to login");
	   location.href = "login.php";
	</script>
<?php
	   }
	}	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<title>Online Dairy</title>
		<link rel="stylesheet" href="css/registration.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script type="text/javascript">
			function validate()
			{
				x = document.getElementById("pass").value
				y = document.getElementById("cpass").value

				if(x!=y)
				{
					alert("Password doesn't match with confirm password")
					return false;
				}

				return true;
			}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="title">Registration</div>
			<div class="content">
				<form method="post" action="registration.php" onsubmit="return validate()">
					<div class="user-details">
						<div class="input-box">
							<span class="details">Full Name</span>
							<input type="text" name="name" placeholder="Enter your name" required>
						</div>
						<div class="input-box">
							<span class="details">Address</span>
							<input type="text" name="address" placeholder="Enter your address" required>
						</div>
						<div class="input-box">
							<span class="details">Email</span>
							<input type="email" name="email" placeholder="Enter your email" required>
						</div>
						<div class="input-box">
							<span class="details">Phone Number</span>
							<input type="text" name="phone" placeholder="Enter your number" pattern="^[6789]\d{9}$" required>
						</div>
						<div class="input-box">
							<span class="details">Password</span>
							<input type="password" name="pass" id="pass" placeholder="Enter your password" pattern="^[A-Za-z]\w{7,14}$" required>
						</div>
						<div class="input-box">
							<span class="details">Confirm Password</span>
							<input type="password" name="cpass" id="cpass" placeholder="Confirm your password" required>
						</div>
					</div>
					<div class="button">
						<input type="submit" value="Register" name="submit">
					</div>
					<p>Already have an account? <a href="login.php">Login now</a></p>
				</form>
			</div>
		</div>
	</body>
</html>


