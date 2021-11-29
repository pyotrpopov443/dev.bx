<?php

function getGenres(mysqli $database): array
{
	$genres = [];

	$query = "SELECT ID, NAME FROM dev.genre";

	$result = mysqli_query($database, $query);
	if (!$result)
	{
		$error = mysqli_errno($database) . ": " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	while ($row = mysqli_fetch_assoc($result))
	{
		$id = $row["ID"];
		$name = $row["NAME"];
		$genres[$id] = $name;
	}
	return $genres;
}

function getActors(mysqli $database): array
{
	$actors = [];

	$query = "SELECT ID, NAME FROM dev.actor";

	$result = mysqli_query($database, $query);
	if (!$result)
	{
		$error = mysqli_errno($database) . ": " . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	while ($row = mysqli_fetch_assoc($result))
	{
		$id = $row["ID"];
		$name = $row["NAME"];
		$actors[$id] = $name;
	}
	return $actors;
}

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
				(SELECT GROUP_CONCAT(mg.GENRE_ID SEPARATOR ', ') FROM movie_genre mg
				WHERE movie.ID = mg.MOVIE_ID) genres,
				(SELECT GROUP_CONCAT(ma.ACTOR_ID SEPARATOR ', ') FROM movie_actor ma
				WHERE movie.ID = ma.MOVIE_ID) cast
		FROM movie
		inner join director d on d.ID = movie.DIRECTOR_ID
	";
}

function getMovies(array $columns, mysqli $database, string $genreId = "", string $query = ""): array
{
	$movies = [];

	$columnList = implode(',', $columns);
	$query = escape($query);

	$generalQuery = getBaseMoviesQuery();

	$movieByGenreQuery = $generalQuery;

	if ($genreId !== "")
	{
		$movieByGenreQuery .= "
			inner join movie_genre mg on movie.ID = mg.MOVIE_ID
			WHERE mg.GENRE_ID = '$genreId'
		";
	}

	if ($query !== "")
	{
		//простите, ничего более элегантного не смог придумать, может есть какой-то более эффективный способ
		$movieByGenreQuery = "
			SELECT * FROM(
				SELECT *,
				(SELECT GROUP_CONCAT(a.NAME) from actor a
				WHERE CONCAT(', ', cast, ',') like CONCAT('%, ',a.ID,',%')) actors,
				(SELECT GROUP_CONCAT(g.NAME) from genre g
				WHERE CONCAT(', ', genres, ',') like CONCAT('%, ',g.ID,',%')) genreNames
				FROM (" . $movieByGenreQuery . ") moviesWithIds
			) moviesWithActorsAndGenres
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
