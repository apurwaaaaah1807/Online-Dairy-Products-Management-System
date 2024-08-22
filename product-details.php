<?php
	session_start();
	
	$con = pg_connect("host=localhost port=5432 dbname=dairy user=postgres password=root");

	$cat = $_GET['cat'];

	$result = pg_query($con, "select * from products where category='$cat'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>
<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto:wght@300&display=swap');
		   
		   * {
		   margin: 0;
		   padding: 0;
		   
		   }
		   .product-av {
		   width: auto;
		   display: flex !important;
		   flex-wrap: wrap !important;
		   justify-content: space-evenly !important;
		   margin: 10px 90px !important;
		   gap: 50px !important;
		   font-family: 'Poppins', sans-serif !important;
		   font-family: 'Roboto', sans-serif !important;
		   }
		   
		   .h-card {
		   width: 300px;
		   height: 450px;
		   border-radius: 10px;
		   border: 1px solid black;
		   box-shadow: 0 0 5px 0 #8fc0fbcc !important;
		   font-family: 'Poppins', sans-serif !important;
		   font-family: 'Roboto', sans-serif !important;
		   }
		   
		   .product-img {
		   width: 300px;
		   height: 200px;
		   border-radius: 10px;
		   }
		   .product-img img {
		   width: 298px;
		   height: 200px;
		   border-radius: 10px 10px 0 0;
		   }
		   
		   .product-details {
		   width: 300px;
		   text-align: center;
		   }
		   
		   .product-details h1 {
		   margin-top: 5px;
		   }
		   
		   .product-details p {
		   margin-top: 5px;
		   }
		   
		   .product-details h2 {
		   color: #8fc0fbcc;
		   margin-top: 5px;
		   }
		   
		   .button-p{
		   width: auto;
		   height: 40px;
		   margin: 20px 30px 0px 30px;
		   border-radius: 5px;
		   }
		   
		   .button-p button {
		   width: 100%;
		   height: 50px;
		   background: #fff;
		   border-radius: 5px;
		   font-size: 15px;
		   transition: 0.5s;
		   font-weight: 300;
		   }
		   
		   .button-p button:hover {
		   background: linear-gradient(135deg, #71b7e6, #7b59b6)!important;
		   }
		   
		   .navbar{
		   font-size: 18px !important;
		   }
		   .p-title{
		   text-align: center;
		   }
		   .p-title h1{
		   font-weight: 400;
		   font-size: 60px !important;
		   }
		   hr{
		   margin: 0px !important;
		   }
		   </style>
		   
		   <body>
		   
<?php
include_once "navbar.php";
?>

<div class="p-title">
<br><br><br>
<h1>Products</h1>
</div>
<div class="product-av" id="product-av" >

<?php while($row=pg_fetch_assoc($result)){ ?>
<div class="h-card">
<div class="product-img">
<img src="products/<?=$row['prod_id']?>.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1><?=$row["category"]?>-<?=$row["prod_uom"]?></h1>
<p><?=$row["prod_desc"]?>
</p>
<h2><?=$row["prod_price"]?>₹(-<?=$row["prod_disc"]?>%)</h2>
</div>
<div class="button-p">
<form method="post" action="add-cart.php">
<input type="hidden" name="oid" value='<?=$oid?>'>
<input type="hidden" name="pid" value='<?=$row["prod_id"]?>'>
<b>Qty:</b>
<input type="number" name="qty" min=1 max=10 required style="padding:5px;margin:5px;">
<button type="submit">Buy</button>
</form>
</div>
</div>
<?php } ?>
</div>
</body>

</html>


