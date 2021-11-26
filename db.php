<?php

$database = mysqli_init();
$host = 'localhost';
$username = 'student';
$password = 'student';
$dbName = 'dev';

$connectionResult = mysqli_real_connect(
	$database,
	$host,
	$username,
	$password,
	$dbName
);

if (!$connectionResult)
{
	$error = mysqli_connect_errno() . ": " . mysqli_connect_error();
	trigger_error($error, E_USER_ERROR);
}

$directorName = 'Джеймс Кэмерон';

$query = "SELECT * FROM director WHERE NAME = ?";
$preparedStatement = mysqli_prepare($database, $query);

mysqli_stmt_bind_param($preparedStatement, "s", $directorName);
mysqli_stmt_execute($preparedStatement);
$result = mysqli_stmt_get_result($preparedStatement);

//$result = mysqli_query($database, $query);

while ($row = mysqli_fetch_assoc($result))
{
	print_r($row);
}