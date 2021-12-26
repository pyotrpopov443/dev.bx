<?php

class MovieListView extends View
{
	private $movies;

	public function __construct(string $layout)
	{
		$this->layout = $layout;
	}

	public function render(): void
	{
		if (file_exists($this->layout))
		{
			$movieListView = $this;
			include $this->layout;
		}
		else
		{
			echo "Layout not found";
		}
	}

	public function loadMovies(?int $genreId, ?string $query): void
	{
		$config = Config::getInstance();
		$database = MovieDatabase::getInstance($config->getDbConnectionSettings());
		$this->movies = $database->getMovies($genreId, $query);
	}

	public function getMovies(): array
	{
		return $this->movies;
	}

}