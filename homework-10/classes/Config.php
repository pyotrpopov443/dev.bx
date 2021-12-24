<?php

class Config
{
	private static $instance = null;

	private $menu;
	private $strings;
	private $db_connection_settings;

	private function __construct()
	{
		$this->menu = [
			'main' => 'Главная',
			'favorites' => 'Избранное'
		];
		$this->strings = [
			'movie_not_found' => 'Такого фильма не существует.',
			'movies_not_found' => 'По вашему запросу не найдено ни одного фильма.'
		];
		$this->db_connection_settings = new DatabaseConnectionSettings(
			'localhost', 'student', 'student', 'dev');
	}

	public static function getInstance(): Config
	{
		if (static::$instance === null)
		{
			static::$instance = new static();
		}
		return static::$instance;
	}

	public function getMenuItem(string $name): string
	{
		return $this->menu[$name];
	}

	public function getString(string $name): string
	{
		return $this->strings[$name];
	}

	public function getDbConnectionSettings(): DatabaseConnectionSettings
	{
		return $this->db_connection_settings;
	}

}
