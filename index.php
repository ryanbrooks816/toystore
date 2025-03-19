<?php
require 'includes/database-connection.php';
require 'includes/utils.php';
?>

<!DOCTYPE>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Toys R URI</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>

<body>

	<header>
		<div class="header-left">
			<div class="logo">
				<img src="imgs/logo.png" alt="Toy R URI Logo">
			</div>

			<nav>
				<ul>
					<li><a href="index.php">Toy Catalog</a></li>
					<li><a href="about.php">About</a></li>
				</ul>
			</nav>
		</div>

		<div class="header-right">
			<ul>
				<li><a href="order.php">Check Order</a></li>
			</ul>
		</div>
	</header>

	<main>
		<section class="toy-catalog">
			<?php
			$toys = get_all_toys($pdo);
			foreach ($toys as $toy) {
				?>
				<div class="toy-card">
					<!-- Create a hyperlink to toy.php page with toy number as parameter -->
					<a href="toy.php?toynum=<?= $toy['toynum'] ?>">

						<!-- Display image of toy with its name as alt text -->
						<img src="<?= $toy['imgSrc'] ?>" alt="<?= $toy['name'] ?>">
					</a>

					<!-- Display name of toy -->
					<h2><?= $toy['name'] ?></h2>

					<!-- Display price of toy -->
					<p>$<?= $toy['price'] ?></p>
				</div>
				<?php
			}
			?>
		</section>
	</main>

</body>

</html>