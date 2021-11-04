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

function formatGenres(array $genres): string
{
	return implode(', ', $genres);
}

function getMoviesByGenre(array $movies, string $genre = ""): array
{
	if ($genre === "")
	{
		return $movies;
	}
	$filteredMovies = [];
	foreach ($movies as $movie)
	{
		if (in_array($genre, $movie['genres']))
		{
			$filteredMovies[] = $movie;
		}
	}
	return $filteredMovies;
}