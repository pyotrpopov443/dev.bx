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

function formatArray(array $genres): string
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

function contains(string $str, string $substr): bool
{
	return strpos($str, $substr) !== false;
}

function implodeMovie(array $movie): string
{
	$movieImploded = "";
	foreach ($movie as $key => $parameter)
	{
		if ($key === 'id')
		{
			continue;
		}
		if (is_array($parameter))
		{
			$movieImploded .= implode($parameter);
		}
		else
		{
			$movieImploded .= $parameter;
		}
	}
	return mb_strtolower($movieImploded);
}

function getMoviesByQuery(array $movies, string $query = ""): array
{
	if ($query === "")
	{
		return $movies;
	}
	$query = mb_strtolower($query);
	$filteredMovies = [];
	foreach ($movies as $movie)
	{
		if (contains(implodeMovie($movie), $query))
		{
			$filteredMovies[] = $movie;
		}
	}
	return $filteredMovies;
}

function getMovieById(array $movies, int $id): array
{
	foreach ($movies as $movie)
	{
		if ($movie['id'] === $id)
		{
			return $movie;
		}
	}
	return [
		'id' => 0,
		'title' => '',
		'original-title' => '',
		'description' => '',
		'duration' => 0,
		'genres' => [],
		'cast' => [],
		'director' => '',
		'age-restriction' => 0,
		'release-date' => 0,
		'rating' => 0
	];
}
