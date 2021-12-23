<?php

class MovieDatabase
{
	private $database;

	public function __construct(array $connectionSettings)
	{
		$this->dbConnect($connectionSettings);
	}

	private function dbConnect(array $connectionSettings): void
	{
		$this->database = mysqli_init();

		$connectionResult = mysqli_real_connect(
			$this->database,
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

		$this->setCharset('utf8mb4');
	}

	public function setCharset(string $charset): void
	{
		$setCharset = mysqli_set_charset($this->database,$charset);
		if (!$setCharset)
		{
			$this->processError();
		}
	}

	private function processError(): void
	{
		$error = mysqli_errno($this->database) . ": " . mysqli_error($this->database);
		trigger_error($error, E_USER_ERROR);
	}

	private function getTypes(...$params): string
	{
		$types = "";
		foreach ($params as $param)
		{
			if (is_int($param))
			{
				$types .= "i";
			}
			if (is_string($param))
			{
				$types .= "s";
			}
		}
		return $types;
	}

	private function getResult(string $query, ... $params): mysqli_result
	{
		$preparedStatement = mysqli_prepare($this->database, $query);


		if (count($params) !== 0)
		{
			$types = $this->getTypes(...$params);
			mysqli_stmt_bind_param($preparedStatement, $types, ...$params);
		}

		$executeResult = mysqli_stmt_execute($preparedStatement);
		if (!$executeResult)
		{
			$this->processError();
		}

		$result = mysqli_stmt_get_result($preparedStatement);
		if (!$result)
		{
			$this->processError();
		}

		return $result;
	}

	public function getGenres(): array
	{
		$genres = [];

		$dbQuery = "SELECT ID, NAME FROM dev.genre";

		$result = $this->getResult($dbQuery);

		while ($row = mysqli_fetch_assoc($result))
		{
			$id = $row["ID"];
			$name = $row["NAME"];
			$genres[$id] = $name;
		}
		return $genres;
	}

	public function getActors(): array
	{
		$actors = [];

		$dbQuery = "SELECT ID, NAME FROM dev.actor";

		$result = $this->getResult($dbQuery);

		while ($row = mysqli_fetch_assoc($result))
		{
			$id = $row["ID"];
			$name = $row["NAME"];
			$actors[$id] = $name;
		}
		return $actors;
	}

	private function getBaseMoviesQuery(): string
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

	public function getMovieById(int $id)
	{
		$baseDbQuery = $this->getBaseMoviesQuery();

		$dbQuery = $baseDbQuery . "
			where movie.ID = ?
		";

		$result = $this->getResult($dbQuery, $id);

		if ($row = mysqli_fetch_assoc($result))
		{
			return $row;
		}
		return null;
	}

	public function getMovies(string $genreId = "", string $query = ""): array
	{
		$movies = [];

		$query = escape($query);

		$dbQuery = $this->getBaseMoviesQuery();

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

		if ($isGenre && $isQuery)
		{
			$query = "%$query%";
			$result = $this->getResult($dbQuery, $genreId, $query);
		}
		else if ($isGenre)
		{
			$result = $this->getResult($dbQuery, $genreId);
		}
		else if ($isQuery)
		{
			$query = "%$query%";
			$result = $this->getResult($dbQuery, $query);
		}
		else
		{
			$result = $this->getResult($dbQuery);
		}

		while ($row = mysqli_fetch_assoc($result))
		{
			$movies[] = $row;
		}
		return $movies;
	}

}