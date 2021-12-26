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
		$this->renderView('movieView', $this);
	}

	public function getMovie(): Movie
	{
		return $this->movie;
	}

}