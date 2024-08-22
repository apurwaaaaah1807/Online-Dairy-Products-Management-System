<?php session_start()?>
<title>Manage Orders</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
<body>
<?php
	$con = pg_connect("host=localhost port=5432 dbname=dairy user=postgres password=root");

	$oid = $_GET["oid"];

	$rs = pg_query($con, "select order_id, order_date, name, address, phone, email, order_amount, paymode, cardno, bname, status from orders, users where orders.uid = users.id and order_id=$oid");
	
	$row = pg_fetch_row($rs);

	$rs1 = pg_query($con, "select prod_desc, prod_price, prod_disc, cart.quan, prod_price*cart.quan-prod_price*cart.quan*prod_disc/100 from products,cart where products.prod_id = cart.product_id and order_id=$oid");
?>
<div style="padding:100px;">
<center><a href="dashboard.php" class="btn btn-warning">Home</a></center>
<table class="table table-bordered">
<tr>
	<td><b>Order ID:</b></td>
	<td><?=$row[0]?></td>
</tr>
<tr>
	<td><b>Order Date:</b></td>
	<td><?=$row[1]?></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><?=$row[2]?></td>
</tr>
<tr>
	<td><b>Address:</b></td>
	<td><?=$row[3]?></td>
</tr>
<tr>
	<td><b>Phone:</b></td>
	<td><?=$row[4]?></td>
</tr>
<tr>
	<td><b>Email:</b></td>
	<td><?=$row[5]?></td>
</tr>
<tr>
	<td><b>Total Amount:</b></td>
	<td>Rs.<?=$row[6]?>/-</td>
</tr>
<tr>
	<td><b>Pay Mode:</b></td>
	<td><?=$row[7]?></td>
</tr>
<tr>
	<td><b>Card No:</b></td>
	<td><?=$row[8]?></td>
</tr>
<tr>
	<td><b>Bank:</b></td>
	<td><?=$row[9]?></td>
</tr>
<tr>
	<td><b>Status:</b></td>
	<td><?=$row[10]?> <a href="dispatch.php?oid=<?=$row[0]?>" class="btn btn-danger">Dispatch</a></td>
</tr>
</table>
<table class="table table-bordered">
<tr class="danger">
	<th>Sr.No.</th>
	<th>Product Name:</th>
	<th>Rate</th>
	<th>Discount</th>
	<th>Qty</th>
	<th>Amount</th>
</tr>
<?php  
	$i=1;
	while($row1 = pg_fetch_row($rs1)){
?>
<tr>
	<td><?=$i++?></td>
	<td><?=$row1[0]?></td>
	<td><?=$row1[1]?></td>
	<td><?=$row1[2]?></td>
	<td><?=$row1[3]?></td>
	<td><?=$row1[4]?></td>
</tr>
<?php  
	}
	$tot = $row[6];
	$gst = $tot * 0.018;
	$cst = $tot * 0.018;
	$final_tot = $tot + $gst + $cst;
?>
<tr>
<td colspan=5 align='right'><b>Total:</b></td>
<td>Rs. <?php printf("%.2f",$tot)?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>GST@1.8%:</b></td>
<td>Rs. <?php printf("%.2f",$gst)?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>CST@1.8%:</b></td>
<td>Rs. <?php printf("%.2f",$cst)?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>Final Total:</b></td>
<td>Rs. <?php printf("%.2f",$final_tot)?>/-</td>
</tr>

</table>
<center><button class="btn btn-warning" onclick='window.print()'>Print</button></a></center>

</div>
