<?php

declare(strict_types=1);

require_once 'autoload.php';
require_once 'helper-functions.php';
require_once 'render.php';

$config = Config::getInstance();
$database = MovieDatabase::getInstance($config->getDbConnectionSettings());
$genres = $database->getGenres();

$menuItem = $_REQUEST['menu_item'] ?? 'main';
$query = $_REQUEST['query'] ?? null;

$genreId = getGenreId($menuItem, $genres);
$movies = $database->getMovies($genreId, $query);

if (empty($movies))
{
	$content = renderTemplate('res/layout/plug.php', [
		'plugText' => $config->getString('movies_not_found')
	]);
}
else
{
	$content = renderTemplate('res/layout/movie_list.php', [
		'movies' => $movies
	]);
}

$main = renderTemplate('res/layout/main.php', [
	'genres' => $genres,
	'currentMenuItem' => $menuItem,
	'content' => $content,
	'query' => $query
]);

echo $main;
