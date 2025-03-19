<?php
/*
 * Retrieve toy information from the database based on the toy ID.
 * 
 * @param PDO $pdo       An instance of the PDO class.
 * @param string $id     The ID of the toy to retrieve.
 * @return array|null    An associative array containing the toy information, or null if no toy is found.
 */
function get_toy(PDO $pdo, string $id)
{
	// SQL query to retrieve toy information based on the toy ID
	$sql = "SELECT * 
			FROM toy
			WHERE toynum= :id;";	// :id is a placeholder for value provided later 
	// It's a parameterized query that helps prevent SQL injection attacks and ensures safer interaction with the database.


	// Execute the SQL query using the pdo function and fetch the result
	$toy = pdo($pdo, $sql, ['id' => $id])->fetch();		// Associative array where 'id' is the key and $id is the value. Used to bind the value of $id to the placeholder :id in  SQL query.

	// Return the toy information (associative array)
	return $toy;
}

function get_all_toys(PDO $pdo)
{
	$sql = "SELECT * 
			FROM toy";

	$toys = pdo($pdo, $sql)->fetchAll();
	return $toys;
}

// Retrieve info about toy with ID '0001' from the db using provided PDO connection
// $toy1 = get_toy($pdo, '0001');
?>