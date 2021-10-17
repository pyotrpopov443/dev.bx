<?php
/** @var array $movies */
require "movies.php";

$age = readline("Enter your age:");
if (is_numeric($age))
{
	printMoviesRestricted($movies, $age);
}
else
{
	echo "Invalid age";
}