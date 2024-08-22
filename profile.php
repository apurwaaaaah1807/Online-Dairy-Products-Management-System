<?php
	session_start();

	$con = pg_connect("host=localhost port=5432 dbname=dairy user=postgres password=root");

	$rs = pg_query($con, "select * from users where id=".$_SESSION["uid"]);
	$row = pg_fetch_assoc($rs);

	if(isset($_POST["submit"]))
	{
		$id = $_POST["id"];
	   $name = $_POST["name"];
	   $address = $_POST["address"];
	   $phone = $_POST["phone"];
	   $email = $_POST["email"];
	   $pass = $_POST["pass"];

	   $result = pg_query($con, "select * from users where email='$email' and id<>$id");
	   $row = pg_fetch_row($result);
	   if($row)
	   {
	?>
	<script type="text/javascript">
	   alert("Email already registered.");
	   location.href = "profile.php";
	</script>
	<?php
	   }
	   else
	   {
	      pg_query($con, "update users set name='$name', address='$address', phone='$phone', email='$email', password='$pass' where id=$id");
	?>
	<script type="text/javascript">
	   alert("User profile updated successfully.");
	   location.href = "profile.php";
	</script>
<?php
	   }
	}	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<title>Profile</title>
		<link rel="stylesheet" href="css/registration.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<body>
		<div class="container">
			<div class="title">Profile</div>
			<div class="content">
				<form method="post">
					<div class="user-details">
						<div class="input-box">
							<span class="details">Full Name</span>
							<input type="text" name="name" placeholder="Enter your name" value='<?=$row["name"]?>' required>
						</div>
						<div class="input-box">
							<span class="details">Address</span>
							<input type="text" name="address" placeholder="Enter your address" value='<?=$row["address"]?>' required>
						</div>
						<div class="input-box">
							<span class="details">Email</span>
							<input type="email" name="email" placeholder="Enter your email" value='<?=$row["email"]?>' required>
						</div>
						<div class="input-box">
							<span class="details">Phone Number</span>
							<input type="text" name="phone" placeholder="Enter your number" value='<?=$row["phone"]?>' pattern="^[6789]\d{9}$" required>
						</div>
						<div class="input-box">
							<span class="details">Password</span>
							<input type="text" name="pass" id="pass" placeholder="Enter your password" value='<?=$row["password"]?>' pattern="^[A-Za-z]\w{7,14}$" required>
						</div>
					</div>
					<div class="button">
						<input type="submit" value="Update" name="submit">
					</div>
					<p style="text-align: center;"><a href="index.php" style="text-decoration: none;">Back Home</a></p>
					<input type="hidden" name="id" value='<?=$row["id"]?>'>
				</form>
			</div>
		</div>
	</body>
</html>


