<?php
// $variabele1 = 10;
// $variabele2 = 10;

// if($variabele1 == $variabele2) {
    // echo "De twee waarden zijn gelijk";
// }


// $variabele1 = 10;
// $variabele2 = 12;

// if($variabele1 != $variabele2) {
    // echo "De twee waarden zijn ongelijk";
// } 

// $variabele1 = 10;
// $variabele2 = 10;

// if ($variabele1 == $variabele2) {
    // echo "De twee waarden zijn gelijk";
// } else { 

    // echo "De twee waarden zijn ongelijk";
// }

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo $username . "<br>";
    echo $password . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="" method="POST">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
		<input type="text" name="password" id="password" required><br>

        <input type="submit" name="submit" value="submit">

    </form>

</body>
</html>