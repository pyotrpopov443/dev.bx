<?php

function formatDuration(int $duration): string
{
	$h = (int)($duration/60);
	$m = $duration - 60 * $h;

	$hours = str_pad((string)$h, 2, "0", STR_PAD_LEFT);
	$minutes = str_pad((string)$m, 2, "0", STR_PAD_LEFT);
	return "$duration мин. / $hours:$minutes";
}

function formatDescription(string $description): string
{
	return mb_strimwidth($description, 0, 180, "...");
}

function formatArray(array $arr): string
{
	return implode(', ', $arr);
}

function escape(string $str): string
{
	return htmlspecialchars(trim($str), ENT_QUOTES);
}

function getValuesFromKeys(array $keys, array $array): array
{
	$genresNames = [];
	foreach ($keys as $key)
	{
		$genresNames[] = $array[$key];
	}
	return $genresNames;
}

function formatMovie(array $movie, array $genres, array $actors): array
{
	$genreIds = explode(', ', $movie['genres']);
	$movie['genres'] = getValuesFromKeys($genreIds, $genres);
	$actorIds = explode(', ', $movie['cast']);
	$movie['cast'] = getValuesFromKeys($actorIds, $actors);
	return $movie;
}

function formatMovies(array $movies, array $genres, array $actors): array
{
	$formattedMovies = [];
	foreach ($movies as $movie)
	{
		$formattedMovies[] = formatMovie($movie, $genres, $actors);
	}
	return $formattedMovies;
}

function processDbError(mysqli $database): void
{
	$error = mysqli_errno($database) . ": " . mysqli_error($database);
	trigger_error($error, E_USER_ERROR);
}
