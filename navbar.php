<?php
	$con = pg_connect("host=localhost port=5432 dbname=dairy user=postgres password=root");
	$rs = pg_query($con, "select count(*) from orders");
	$row = pg_fetch_row($rs);
	$oid = $row[0]+1;
	$rs = pg_query($con, "select * from cart where order_id=$oid");
	$n = pg_num_rows($rs);
?>
<style>
	@import url("https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins&family=Source+Sans+Pro&display=swap");

	@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css");

	:root {
		--randank-font: "Permanent Marker", sans-serif;
		--randank-font-text: "Poppins", sans-serif;
	}

	header {
		background: linear-gradient(135deg, #71b7e6, #7b59b6) !important;
		display: flex;
		justify-content: space-between;
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		box-shadow: 0.1px 0.1px 15px black;
	}
	header-logo-container {
		text-decoration: none;
		padding: 5px;
		display: flex;
		align-items: center;
	}
	#header-img {
		width: 44px;
		height: 44px;
	}
	#header-wordmark {
		font-family: var(--randank-font);
		font-size: 25px;
		color: black;
		padding: 0 2px;
		margin: 0;
	}
	#nav-bar {
		display: flex;
		align-items: center;
		background-color: linear-gradient(135deg, #71b7e6, #7b59b6);
		padding: 20px;
	}
	.nav-bar ul {
		list-style: none;
		padding: 0;
		display: flex;
		justify-content: space-evenly;
		width: 400px;
	}
	.nav-link {
		text-decoration: none;
		color: black;
		font-family: "Poppins", sans-serif;
		font-size: 15px;
	}
	.nav-link:hover {
		color: red;
		text-decoration: none;
	}
</style>

<header id="header">
	<a href="index.php" id="header-logo-container" >
		<img id="header-img" src="images/emoji.svg" alt="" />
		<p id="header-wordmark">Dairy Farm Shop</p>
	</a>

	<nav id="nav-bar">
		<ul>
			<li><a href="category.php" class="nav-link">Products</a></li>
			<li><a href="cart.php" class="nav-link">Cart <span>(<?=$n?>)</span></a></li>
			<?php if (!isset($_SESSION['uid'])) { ?> <li><a href="login.php" class="nav-link">Login</a></li><?php } ?>
			<?php if (!isset($_SESSION['uid'])) { ?> <li><a href="admin.php" class="nav-link">Admin</a></li><?php } ?>
			<?php if (isset($_SESSION['uid'])) { ?> <li><a href="profile.php" class="nav-link">Profile</a></li><?php } ?>
			<?php if (isset($_SESSION['uid'])) { ?> <li><a href="track-order.php" class="nav-link">Track Order</a></li><?php } ?>
			<?php if (isset($_SESSION['uid'])) { ?> <li><a href="logout.php" class="nav-link">Logout</a></li><?php } ?>
			<?php if (!isset($_SESSION['uid'])) { ?><li><a href="about.php" class="nav-link">About Us</a></li><?php }?>
			<?php if (!isset($_SESSION['uid'])) { ?><li><a href="contact.php" class="nav-link">Contact us</a></li><?php }?>
		</ul>
	</nav>
</header>

