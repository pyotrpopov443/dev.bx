<?php

function db_connect(array $connectionSettings): mysqli
{
	$database = mysqli_init();

	$connectionResult = mysqli_real_connect(
		$database,
		$connectionSettings['host'],
		$connectionSettings['username'],
		$connectionSettings['passwd'],
		$connectionSettings['dbname']
	);
	if (!$connectionResult)
	{
		$error = mysqli_connect_errno() . ": " . mysqli_connect_error();
		trigger_error($error, E_USER_ERROR);
	}

	$setCharset = mysqli_set_charset($database,'utf8mb4');
	if (!$setCharset)
	{
		$error = mysqli_errno($database) . ": " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	return $database;
}