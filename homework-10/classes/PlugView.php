<?php

class PlugView extends View
{
	private $plugText;

	public function __construct(string $layout)
	{
		$this->layout = $layout;
	}

	public function render(): void
	{
		if (file_exists($this->layout))
		{
			$plugView = $this;
			include $this->layout;
		}
		else
		{
			echo "Layout not found";
		}
	}

	public function getPlugText(): string
	{
		return $this->plugText;
	}

	public function setPlugText(string $plugText): void
	{
		$this->plugText = $plugText;
	}

}