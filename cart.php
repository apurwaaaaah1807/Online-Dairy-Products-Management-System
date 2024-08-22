<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/home.css">
<title>Cart</title>
<style>
.product-image {
float: left;
width: 15%;
}

.product-details {
float: left;
width: 30%;
}

.product-price {
float: left;
width: 6%;
}

.product-quantity {
float: left;
width: 9%;
}

.product-removal {
float: right;
width: 10%;
}

.product-line-price {
float: left;
width: 15%;
text-align: right;
}

.group:before, .shopping-cart:before,
.column-labels:before,
.product:before,
.totals-item:before,
.group:after,
.shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
content: "";
display: table;
}

.group:after, .shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
clear: both;
}

.group, .shopping-cart,
.column-labels,
.product,
.totals-item {
zoom: 1;
}

.product .product-price:before,
.product .product-line-price:before,
.totals-value:before {
content: "₹";
}

body {
padding: 0px 30px 30px 20px;
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
font-weight: 100;
}

h1 {
font-weight: 100;
}

label {
color: #aaa;
}

.shopping-cart {
margin-top: -0px;
}

.column-labels label {
padding-bottom: 15px;
margin-bottom: 15px;
border-bottom: 1px solid #eee;
}
.column-labels .product-image,
.column-labels .product-details,
.column-labels .product-removal {
text-indent: -9999px;
}

.product {
margin-bottom: 20px;
padding-bottom: 10px;
border-bottom: 1px solid #eee;
}
.product .product-image {
text-align: center;
}
.product .product-image img {
width: 100px;
}
.product .product-details .product-title {
margin-right: 20px;
font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
.product .product-details .product-description {
margin: 5px 20px 5px 0;
line-height: 1.4em;
}
.product .product-quantity input {
width: 40px;
}
.product .remove-product {
border: 0;
padding: 8px 16px;
background: blue;
color: #fff;
font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
font-size: 12px;
border-radius: 3px;
}
.product .remove-product:hover {
background-color: #aaa;
}

.totals .totals-item {
float: right;
clear: both;
width: 100%;
margin-bottom: 10px;
}
.totals .totals-item label {
float: left;
clear: both;
width: 79%;
text-align: right;
}
.totals .totals-item .totals-value {
float: right;
width: 21%;
text-align: right;
}
.totals .totals-item-total {
font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}

.checkout {
float: right;
border: 0;
margin-top: 20px;
padding: 6px 25px;
background-color: #6b6;
color: #fff;
font-size: 25px;
border-radius: 3px;
}

.checkout:hover {
background-color: #494;
}

@media screen and (max-width: 650px) {
.shopping-cart {
margin: 0;
padding-top: 20px;
border-top: 1px solid #eee;
}

.column-labels {
display: none;
}

.product-image {
float: right;
}
.product-image img {
margin: 0 0 10px 10px;
}

.product-details {
float: none;
margin-bottom: 10px;
width: auto;
}

.product-price {
clear: both;
}

.product-quantity {
}
.product-quantity input {
margin-left: 20px;
}

.product-quantity:before {
content: "x";
}

.product-removal {
width: auto;
}

.product-line-price {
float: right;
width: 50px;
}
}
@media screen and (max-width: 350px) {
.product-removal {
float: right;
}

.product-line-price {
float: right;
clear: left;
margin-top: 10px;
}

.product .product-line-price:before {
content: "Item Total: $";
}

.totals .totals-item label {
width: 60%;
}
.totals .totals-item .totals-value {
width: 40%;
}
}
.cart-title{
text-align: center;
margin-top: 10px;
}
body{
margin: 0;
padding: 0;
}
.shopping-cart{
margin:0px 30px;
}
.navbar{
font-size: 18px !important;
}
</style>
</head>
<body>
<?php
include_once "navbar.php";

	if($n==0)
	{
		echo "<script>alert('Cart is empty');location.href='index.php'</script>";
		exit();
	}
	$result = pg_query($con, "select prod_id, prod_desc, prod_uom, prod_price, prod_disc, quan, prod_price*quan-prod_price*quan*prod_disc/100 from cart, products where cart.product_id = products.prod_id and order_id = $oid;");
	$tot = 0;
?>
<br><br><br>
<div class="cart-title">
<h1>Shopping Cart</h1>
</div>
<br>
<br>
<div class="shopping-cart" id="shopping-cart">

<div class="column-labels">
<label class="product-image">Image</label>
<label class="product-details">Product</label>
<label class="product-price">Price</label>
<label class="product-quantity">Discount(%)</label>
<label class="product-quantity">Quantity</label>
<label class="product-line-price">Total</label>
<label class="product-removal">Remove</label>
</div>

<?php 
	while($row = pg_fetch_row($result))
	{
		$tot += $row[6];
?>
<div class="product">
<div class="product-image"><img src="products/<?=$row[0]?>.jpg"></div>
<div class="product-details">
	<div class="product-title"><?=$row[1]?>(<?=$row[2]?>)</div>
</div>
<div class="product-price"><?=$row[3]?></div>
<div class="product-quantity"><?=$row[4]?></div>
<div class="product-quantity"><?=$row[5]?></div>
<div class="product-line-price"><?=$row[6]?></div>
<div class="product-removal"><a href="delete-cart.php?pid=<?=$row[0]?>&oid=<?=$oid?>" onclick="return confirm('Delete?')"><button class="remove-product">Remove</button></a></div>
</div>
<?php }?>

<div class="totals">
<div class="totals-item">
<label>Total</label>
<div class="totals-value" id="cart-subtotal"><?=$tot?></div>
</div>
</div>

<a href="checkout.php?tot=<?=$tot?>"> <button class="checkout">Checkout</button></a>

</div>
<br>
<br>
<br>
<br>

</body>
</html>


