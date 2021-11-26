<?php

declare(strict_types=1);

require_once 'helper-functions.php';
require_once 'data/db_connect.php';
require_once 'data/db_movies.php';
require_once 'render.php';
/** @var array $config */
require_once 'config.php';

$database = db_connect($config['db_connection_settings']);
$genres = getGenres($database);

$menuItem = $_GET['menu_item'] ?? 'main';
$query = $_POST['query'] ?? "";

if (isset($_GET['movie_id']))
{
	$id = is_numeric($_GET['movie_id']) ? (int)$_GET['movie_id'] : 0;
	$movie = getMovieById($database ,$id);
	if ($movie === false)
	{
		$content = renderTemplate('res/layout/plug.php', [
			'plugText' => $config['strings']['movie_not_found']
		]);
	}
	else
	{
		$content = renderTemplate('res/layout/movie_details.php', [
			'movie' => $movie
		]);
	}
}
else
{
	$genre = array_key_exists($menuItem, $genres) ? $genres[$menuItem] : "";
	$movies = getMovies($config['movie_search_columns'], $database, $genres, $genre, trim($query));
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
}

$main = renderTemplate('res/layout/main.php', [
	'config' => $config,
	'genres' => $genres,
	'currentMenuItem' => $menuItem,
	'content' => $content,
	'query' => $query
]);

echo $main;
