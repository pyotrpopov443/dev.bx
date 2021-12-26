<?php

class FavoritesView extends View
{

	public function __construct(string $layout)
	{
		$this->layout = $layout;
	}

	public function render(): void
	{
		$this->renderView('favoritesView', $this);
	}

}