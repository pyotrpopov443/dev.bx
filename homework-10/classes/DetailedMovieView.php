<?php

class DetailedMovieView extends View
{
	private $movie;

	public function __construct(string $layout)
	{
		$this->layout = $layout;
		$config = Config::getInstance();
		$database = MovieDatabase::getInstance($config->getDbConnectionSettings());
		if (isset($_REQUEST['movie_id']))
		{
			$id = is_numeric($_REQUEST['movie_id']) ? (int)$_REQUEST['movie_id'] : 0;
			$this->movie = $database->getMovieById($id);
		}
	}

	public function render(): void
	{
		$this->renderView('detailedMovie', $this);
	}

	public function getMovie(): ?Movie
	{
		return $this->movie;
	}

}
