<?php

class MovieDatabase
{
	private $database;
	private $genres;
	private $actors;

	public function __construct(DatabaseConnectionSettings $settings)
	{
		$this->dbConnect($settings);
		$this->genres = $this->getGenres();
		$this->actors = $this->getActors();
	}

	private function dbConnect(DatabaseConnectionSettings $settings): void
	{
		$this->database = mysqli_init();

		$connectionResult = mysqli_real_connect(
			$this->database,
			$settings->getHost(),
			$settings->getUsername(),
			$settings->getPassword(),
			$settings->getDatabaseName()
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

		if (count($params) > 0)
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
		$dbQuery = "SELECT ID, CODE, NAME FROM dev.genre";

		$result = $this->getResult($dbQuery);

		$genres = [];
		while ($genreData = mysqli_fetch_assoc($result))
		{
			$genres[] = new Genre($genreData);
		}

		return $genres;
	}

	public function getActors(): array
	{
		$dbQuery = "SELECT ID, NAME FROM dev.actor";

		$result = $this->getResult($dbQuery);

		$actors = [];
		while ($actorData = mysqli_fetch_assoc($result))
		{
			$actors[] = new Actor($actorData);
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

	private function prepareMovie(array $movieData): Movie
	{
		$genresIds = explode(', ', $movieData['genres']);
		$movieData['genres'] = getObjectsByIds($genresIds, $this->genres);
		$actorsIds = explode(', ', $movieData['cast']);
		$movieData['cast'] = getObjectsByIds($actorsIds, $this->actors);
		return new Movie($movieData);
	}

	public function getMovies(?int $genreId, ?string $query): array
	{
		$dbQuery = $this->getBaseMoviesQuery();

		$isGenre = isset($genreId);
		$isQuery = isset($query);

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
			$query = escape("%$query%");
			$result = $this->getResult($dbQuery, $genreId, $query);
		}
		else if ($isGenre)
		{
			$result = $this->getResult($dbQuery, $genreId);
		}
		else if ($isQuery)
		{
			$query = escape("%$query%");
			$result = $this->getResult($dbQuery, $query);
		}
		else
		{
			$result = $this->getResult($dbQuery);
		}

		$movies = [];
		while ($movieData = mysqli_fetch_assoc($result))
		{
			$movies[] = $this->prepareMovie($movieData);
		}
		return $movies;
	}

	public function getMovieById(int $id): ?Movie
	{
		$baseDbQuery = $this->getBaseMoviesQuery();

		$dbQuery = $baseDbQuery . "
			where movie.ID = ?
		";

		$result = $this->getResult($dbQuery, $id);
		if ($movieData = mysqli_fetch_assoc($result))
		{
			return $this->prepareMovie($movieData);
		}
		return null;
	}

}