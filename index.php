<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Home</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/home.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

		<style>
			#discover{
				background-image:url("images/i4.jpeg");
				background-repeat:no-repeat;
				background-position: center;
				background-size: cover;
				opacity: 0.7;
			}
			.navbar{
				background: linear-gradient(135deg, #71b7e6, #7b59b6)!important;
			}
		</style>
	</head>

	<body>
		<?php include_once 'navbar.php'; ?>

		<main>
			<section id="opening" class="randank-flex">
				<div id="opening-text">
					<h1>Finally, rendang you can cook yourself</h1>
					<p>Bundled with many spices you can choose.</p>
				</div>
				<img src="images/i1.jpeg" id="opening-image" alt="" />
			</section>
			<section id="discover">
				<h1 id="discover-text"></h1>
				<div id="discover-opinion">
					<q id="quote" cite="https://edition.cnn.com/travel/article/world-best-foods-readers-choice/index.html">World's Most Delicious Food.</q>
					<p id="quote-author">
						<a href="https://edition.cnn.com/travel/article/world-best-foods-readers-choice/index.html">CNN Travel, 2011</a>
					</p>
				</div>
				<div id="discover-more" class="randank-flex">
					<p>Rendang is delicious meat dish originated from Minangkabau, West Sumatra, which commonly found in Padang food store. Influenced by Indian curry, rendang is made from meat, usually beef, with various spices such as chilli, ginger, galangal, and turmeric.</p>
					<p>Now, we introduced a ready-to-cook rendang, branded as Randank, with various kinds. Starting from meats with mutton, chicken, and fish, to ingredients added with coconut milk, cinnamon, and lime.</p>
				</div>
			</section>
			<br>
			<section id="reviews">
				<h1 id="review-text">Our customers <u>love</u> it so much!</h1>
				<div id="review-grid-container">
					<div class="review-container">
						<div class="reviewer-image">
							<img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/William_Marsden_2.jpg" alt="William M. profile picture" />
						</div>
						<div class="reviewer-feedback">
							<p class="reviewer-name">William M.</p>
							<div class="stars">
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
							</div>
							<q class="review-comment">An amazing taste for a home ready dish... so delicious</q>
						</div>
					</div>
					<div class="review-container">
						<div class="reviewer-image">
							<img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/George_Francis_Joseph_-_Sir_Thomas_Stamford_Bingley_Raffles.jpg" alt="Thomas M. profile picture" />
						</div>
						<div class="reviewer-feedback">
							<p class="reviewer-name">Thomas R.</p>
							<div class="stars">
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
							</div>
							<q class="review-comment">Now I can cook my own rendang without bother</q>
						</div>
					</div>
					<div class="review-container">
						<div class="reviewer-image">
							<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Posthumous_Portrait_of_Herman_Willem_Daendels%2C_Governor-General_of_the_Dutch_East_Indies_-_Rd_Saleh.jpg/395px-Posthumous_Portrait_of_Herman_Willem_Daendels%2C_Governor-General_of_the_Dutch_East_Indies_-_Rd_Saleh.jpg" alt="Williem D. profile picture" />
						</div>
						<div class="reviewer-feedback">
							<p class="reviewer-name">Herman D.</p>
							<div class="stars">
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
								<i class="fa-solid fa-star yellow-star"></i>
							</div>
							<q class="review-comment">5/5 would buy again</q>
						</div>
					</div>
				</div>
			</section>
		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
