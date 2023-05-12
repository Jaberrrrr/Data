<!DOCTYPE html>
<html>
<head>
	<title>Info</title>
</head>
<body>
	<form action="" method="GET">
		<label for="naam">name:</label>
		<input type="text" name="name" id="name" required><br>

		<label for="surname">surname:</label>
		<input type="text" name="surname" id="surname" required><br>

		<label for="age">age:</label>
		<input type="number" name="age" id="age" required><br>

		<label for="address">address:</label>
		<input type="text" name="adres" id="address" required><br>

		<label for="email">email:</label>
		<input type="email" name="email" id="email" required><br>

		<input type="submit" value="Submit">
	</form>

	<?php

	$naam = $_GET["name"];
    $achternaam = $_GET["surname"];
	$leeftijd = $_GET["age"];
	$adres = $_GET["address"];
	$email = $_GET["email"];
	
	echo $name;
	echo $surname;
	echo $age;
	echo $address;
	echo $email;
		
	?>
</body>
</html>