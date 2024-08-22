<?php
	$con = pg_connect("host=localhost port=5432 dbname=dairy user=postgres password=root");

	$id = $_GET['id'];

	pg_query($con, "delete from products where prod_id=$id");

    unlink("products/$id.jpg");

	header("Location: products.php");
?>
