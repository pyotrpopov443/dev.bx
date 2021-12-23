<?php

declare(strict_types=1);
require_once 'data/MovieDatabase.php';
require_once 'helper-functions.php';
require_once 'render.php';
/** @var array $config */
require_once 'config.php';

$database = new MovieDatabase($config['db_connection_settings']);
$genres = $database->getGenres();

$menuItem = $_GET['menu_item'] ?? 'main';
$query = $_GET['query'] ?? '';

$genreId = array_key_exists($menuItem, $genres) ? $menuItem : ''; //TODO: change method
$movies = $database->getMovies($genreId, $query);

if (empty($movies))
{
	$content = renderTemplate('res/layout/plug.php', [
		'plugText' => $config['strings']['movies_not_found']
	]);
}
else
{
	$content = renderTemplate('res/layout/movie_list.php', [
		'movies' => $movies
	]);
}

$main = renderTemplate('res/layout/main.php', [
	'config' => $config,
	'genres' => $genres,
	'currentMenuItem' => $menuItem,
	'content' => $content,
	'query' => $query
]);

echo $main;
