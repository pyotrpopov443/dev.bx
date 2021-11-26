<?php

function getBaseMoviesQuery(): string
{
	return "
		SELECT movie.ID as id,
			   TITLE as title,
			   ORIGINAL_TITLE as 'original-title',
			   DESCRIPTION as description,
			   DURATION as duration,
			   d.NAME as director,
			   AGE_RESTRICTION as 'age-restriction',
			   RELEASE_DATE as 'release-date',
			   RATING as rating,
		(SELECT GROUP_CONCAT(genre.CODE SEPARATOR ', ') FROM genre
		inner join movie_genre ma on genre.ID = ma.GENRE_ID
		WHERE movie.ID = ma.MOVIE_ID) genres,
		(SELECT GROUP_CONCAT(actor.NAME SEPARATOR ', ') FROM actor
		inner join movie_actor ma on actor.ID = ma.ACTOR_ID
		WHERE movie.ID = ma.MOVIE_ID) cast
		FROM movie
		inner join director d on d.ID = movie.DIRECTOR_ID
	";
}

function getGenres(mysqli $database): array
{
	$genres = [];

	$query = "SELECT CODE, NAME FROM dev.genre";

	$result = mysqli_query($database, $query);
	if (!$result)
	{
		$error = mysqli_errno($database) . ": " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	while ($row = mysqli_fetch_assoc($result))
	{
		$id = $row["CODE"];
		$name = $row["NAME"];
		$genres[$id] = $name;
	}
	return $genres;
}

function getMovies(array $columns, mysqli $database, array $genres, string $genre = "", string $query = ""): array
{
	$movies = [];

	$generalQuery = getBaseMoviesQuery();

	$columnList = implode(',', $columns);

	$movieByGenreQuery = $generalQuery;

	if ($genre !== "")
	{
		$movieByGenreQuery .= "
			inner join movie_genre mg on movie.ID = mg.MOVIE_ID
			inner join genre g on mg.GENRE_ID = g.ID
			WHERE g.NAME = '$genre'
		";
	}

	if ($query !== "")
	{
		$movieByGenreQuery = "SELECT * FROM (" . $movieByGenreQuery . ") movies
			WHERE CONCAT($columnList) like '%$query%'
		";
	}

	$result = mysqli_query($database, $movieByGenreQuery);
	if (!$result)
	{
		$error = mysqli_errno($database) . ": " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	while ($row = mysqli_fetch_assoc($result))
	{
		$genreIds = explode(', ', $row['genres']);
		$row['genres'] = genresFromIds($genreIds, $genres);
		$movies[] = $row;
	}
	return $movies;
}

/**
 * returns movie with id or false is movie doesn't exist
 *
 * @param mysqli $database
 * @param int $id
 *
 * @return false|array
 */
function getMovieById(mysqli $database, int $id)
{
	$generalQuery = getBaseMoviesQuery();

	$movieIdQuery = $generalQuery . "
		where movie.ID = $id
	";

	$result = mysqli_query($database, $movieIdQuery);
	if (!$result)
	{
		$error = mysqli_errno($database) . ": " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	if ($row = mysqli_fetch_assoc($result))
	{
		return $row;
	}
	return false;
}
