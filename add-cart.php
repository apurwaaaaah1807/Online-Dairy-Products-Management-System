<?php
	$con = pg_connect("host=localhost port=5432 dbname=dairy user=postgres password=root");

	$oid = $_POST["oid"];
	$pid = $_POST["pid"];
	$qty = $_POST["qty"];

	pg_query($con, "insert into cart values($oid, $pid, $qty)");
?>
<script type="text/javascript">
	alert("Product added to cart successfully.");
	location.href = "index.php";
</script>