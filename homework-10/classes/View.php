<?php

abstract class View
{
	protected $layout;

	abstract public function render(): void;

	protected function renderView(string $name, View $view): void
	{
		if (file_exists($this->layout))
		{
			$$name = $view;
			include $this->layout;
		}
		else
		{
			echo "$name Layout not found";
		}
	}
}