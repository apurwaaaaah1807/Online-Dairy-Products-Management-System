<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Home</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/home.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

		<style type="text/css">
			td{
				padding:10px;
			}
			select{
				padding:10px;
			}
		</style>
	</head>

	<body>
		<?php include_once 'navbar.php'; ?>

<?php
   $rs = pg_query($con, "select order_id from orders where uid=".$_SESSION["uid"]);
?>
		<main>
<br><br><br><br><br>
<form method='post' action='track-order1.php'>
<table>
<tr>
	<td><b>Order ID:</b></td>
	<td>
	<select name='oid' required>
	<option value=''>Select Order ID</option>
	<?php while($row = pg_fetch_row($rs)) {?>
	<option value=<?=$row[0]?>><?=$row[0]?></option>
	<?php } ?>
	</select>	
	</td>
	<td><input type='submit' value='Show' class='btn btn-warning'></td>
</tr>
</table>
</form>



		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
