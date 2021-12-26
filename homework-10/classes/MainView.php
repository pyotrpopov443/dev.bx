<?php

class MainView extends View
{
	private $genres;
	private $currentMenuItem;
	private $query;
	private $content;

	public function __construct(string $layout)
	{
		$this->layout = $layout;

		$config = Config::getInstance();
		$database = MovieDatabase::getInstance($config->getDbConnectionSettings());
		$this->genres = $database->getGenres();
		$this->currentMenuItem = $_REQUEST['menu_item'] ?? 'main';
		$this->query = $_REQUEST['query'] ?? null;
	}

	public function render(): void
	{
		if (file_exists($this->layout))
		{
			$mainView = $this;
			include $this->layout;
		}
		else
		{
			echo "Layout not found";
		}
	}

	public function setContent(View $content): void
	{
		$this->content = $content;
	}

	public function renderContent(): void
	{
		$this->content->render();
	}

	public function getGenres(): array
	{
		return $this->genres;
	}

	public function getCurrentMenuItem(): string
	{
		return $this->currentMenuItem;
	}

	public function getQuery(): ?string
	{
		return $this->query;
	}

	public function getGenreId(): ?int
	{
		return getGenreId($this->currentMenuItem, $this->genres);
	}

}