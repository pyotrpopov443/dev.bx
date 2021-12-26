<?php

class MovieView extends View
{
	private $movie;

	public function __construct(string $layout, Movie $movie)
	{
		$this->layout = $layout;
		$this->movie = $movie;
	}

	public function render(): void
	{
		if (file_exists($this->layout))
		{
			$movieView = $this;
			include $this->layout;
		}
		else
		{
			echo "Layout not found";
		}
	}

	public function getMovie(): Movie
	{
		return $this->movie;
	}

}