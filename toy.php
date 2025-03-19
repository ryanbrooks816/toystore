<?php
	require 'includes/database-connection.php';
	require 'includes/utils.php';

	// Retrieve the value of the 'toynum' parameter from the URL query string
	//		i.e., ../toy.php?toynum=0001
	$toy_id = $_GET['toynum'];

	function get_manuf_info(PDO $pdo, string $toy_id)
	{
		$sql = "SELECT * 
				FROM manuf m
				JOIN toy t ON m.manid = t.manid
				WHERE t.toynum = :toy_id;";

		$manuf = pdo($pdo, $sql, ['toy_id' => $toy_id])->fetch();	
		return $manuf;
	}

	$toy = get_toy($pdo, $toy_id);
	$manuf = get_manuf_info($pdo, $toy_id);	
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
			<div class="toy-details-container">
				<div class="toy-image">
					<!-- Display image of toy with its name as alt text -->
					<img src="<?= $toy['imgSrc'] ?>" alt="<?= $toy['name'] ?>">
				</div>

				<div class="toy-details">
					<!-- Display name of toy -->
			        <h1><?= $toy['name'] ?></h1>

			        <hr />

			        <h3>Toy Information</h3>

			        <!-- Display description of toy -->
			        <p><strong>Description:</strong> <?= $toy['description'] ?></p>

			        <!-- Display price of toy -->
			        <p><strong>Price:</strong> $<?= $toy['price'] ?></p>

			        <!-- Display age range of toy -->
			        <p><strong>Age Range:</strong> <?= $toy['agerange'] ?></p>

			        <!-- Display stock of toy -->
			        <p><strong>Number In Stock:</strong> <?= $toy['numinstock'] ?></p>

			        <br />

			        <h3>Manufacturer Information</h3>

			        <!-- Display name of manufacturer -->
			        <p><strong>Name:</strong> <?= $manuf['name'] ?> </p>

			        <!-- Display address of manufacturer -->
			        <p><strong>Address:</strong> <?= $manuf['Street'] . " " . $manuf['City'] . ", " . $manuf['State'] . " " . $manuf['ZipCode'] ?></p>

			        <!-- Display phone of manufacturer -->
			        <p><strong>Phone:</strong> <?= $manuf['phone'] ?></p>

			        <!-- Display contact of manufacturer -->
			        <p><strong>Contact:</strong> <?= $manuf['contact'] ?></p>
			    </div>
			</div>
		</main>

	</body>
</html>
