<?php

function getGenres(mysqli $database): array
{
	$genres = [];

	$dbQuery = "SELECT ID, NAME FROM dev.genre";

	$result = mysqli_query($database, $dbQuery);
	if (!$result)
	{
		processDbError($database);
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

	$dbQuery = "SELECT ID, NAME FROM dev.actor";

	$result = mysqli_query($database, $dbQuery);
	if (!$result)
	{
		processDbError($database);
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

function getMovies(mysqli $database, string $genreId = "", string $query = ""): array
{
	$movies = [];

	$query = escape($query);

	$dbQuery = getBaseMoviesQuery();

	$isGenre = $genreId !== "";
	$isQuery = $query !== "";

	if ($isGenre)
	{
		$dbQuery .= "
			inner join movie_genre mg on movie.ID = mg.MOVIE_ID
			WHERE mg.GENRE_ID = ?
		";
	}

	if ($isQuery)
	{
		$dbQuery = "
			SELECT * FROM movie_index
			inner join ($dbQuery) m on movie_index.ID = m.ID
			WHERE MOVIE like ?;
		";
	}

	$preparedStatement = mysqli_prepare($database, $dbQuery);
	if ($isGenre && $isQuery)
	{
		$query = "%$query%";
		mysqli_stmt_bind_param($preparedStatement, "ss", $genreId, $query);
	}
	else if ($isGenre)
	{
		mysqli_stmt_bind_param($preparedStatement, "s", $genreId);
	}
	else if ($isQuery)
	{
		$query = "%$query%";
		mysqli_stmt_bind_param($preparedStatement, "s", $query);
	}

	$executeResult = mysqli_stmt_execute($preparedStatement);
	if (!$executeResult)
	{
		processDbError($database);
	}

	$result = mysqli_stmt_get_result($preparedStatement);
	if (!$result)
	{
		processDbError($database);
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
	$baseDbQuery = getBaseMoviesQuery();

	$dbQuery = $baseDbQuery . "
		where movie.ID = ?
	";

	$preparedStatement = mysqli_prepare($database, $dbQuery);
	mysqli_stmt_bind_param($preparedStatement, "i", $id);

	$executeResult = mysqli_stmt_execute($preparedStatement);
	if (!$executeResult)
	{
		processDbError($database);
	}

	$result = mysqli_stmt_get_result($preparedStatement);
	if (!$result)
	{
		processDbError($database);
	}

	if ($row = mysqli_fetch_assoc($result))
	{
		return $row;
	}
	return false;
}
