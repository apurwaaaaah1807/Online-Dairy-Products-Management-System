<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Category</title>
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
<h1>Category</h1>
</div>
<div class="product-av" id="product-av" >
<div class="h-card">
<div class="product-img">
<img src="category/milk.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1>MILK</h1>
<p>Milk contains nutrients important for bone health: calcium, phosphorus, vitamin D, and protein. 
</p>
<h2>70₹</h2>
</div>
<div class="button-p">
<a href="product-details.php?cat=Milk"><button>Browse</button></a>
</div>
</div>
<div class="h-card">
<div class="product-img">
<img src="category/lassi.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1>LASSI</h1>
<p>Helps with digestion. Contains probiotics that promote a healthy gut.
</p>
<h2>25₹</h2>
</div>
<div class="button-p">
<a href="product-details.php?cat=Lassi"><button>Browse</button></a>
</div>
</div>
<div class="h-card">
<div class="product-img">
<img src="category/dhai.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1>YOGURT</h1>
<p>High in protein, calcium, vitamins, and live culture, or probiotics, which can enhance the gut microbiota.
</p>
<h2>50₹</h2>
</div>
<div class="button-p"><a href="product-details.php?cat=Dhai"><button>Browse</button>
</a>
</div>
</div>
<div class="h-card">
<div class="product-img">
<img src="category/cheese.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1>CHEESE</h1>
<p>Nutritious food consisting of the curd, the semisolid substance formed when milk curdles.
</p>
<h2>100₹</h2>
</div>
<div class="button-p">
<a href="product-details.php?cat=Cheese"><button>Browse</button></a>
</div>
</div>
<div class="h-card">
<div class="product-img">
<img src="category/butter.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1>BUTTER</h1>
<p>Contains vitamin D & calcium, a nutrient that is vital for bone growth and development. 
</p>
<h2>125₹</h2>
</div>
<div class="button-p">
<a href="product-details.php?cat=Butter"><button>Browse</button></a>
</div>
</div>
<div class="h-card">
<div class="product-img">
<img src="category/paneer.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1>PANEER</h1>
<p>Helps in body building· Improves body metabolism and reduces body and joint pain.
</p>
<h2>110₹</h2>
</div>
<div class="button-p">
<a href="product-details.php?cat=Paneer">
<button>Browse</button>
</a>
</div>
</div>
<div class="h-card">
<div class="product-img">
<img src="category/chass.jpg" alt="">
</div>
<hr>
<div class="product-details">
<h1>BUTTER MILK</h1>
<p>A great source of protein, vitamins, and minerals. Helps in developing strong muscles, skin, and bones.
</p>
<h2>110₹</h2>
</div>
<div class="button-p">
<a href="product-details.php?cat=Chass">
<button>Browse</button>
</a>
</div>
</div>
</div>
</body>

</html>


