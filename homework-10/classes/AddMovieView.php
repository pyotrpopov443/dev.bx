<?php

class AddMovieView extends View
{

	public function __construct(string $layout)
	{
		$this->layout = $layout;
	}

	public function render(): void
	{
		$this->renderView('addMovieView', $this);
	}

}