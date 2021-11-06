<?php

declare(strict_types=1);

require_once 'render.php';

/** @var array $config */
require_once 'config.php';

/** @var array $genres */
/** @var array $movies */
require_once 'data/movies.php';
require_once 'helper-functions.php';

$menuItem = $_GET['menu_item'] ?? 'main';
$genre = array_key_exists($menuItem, $genres) ? $genres[$menuItem] : "";
$query = $_POST['query'] ?? "";

if (isset($_GET['movie_id']))
{
	$id = is_numeric($_GET['movie_id']) ? (int)$_GET['movie_id'] : 0;
	$movie = getMovieById($movies, $id);
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
	$filteredMovies = getMoviesByGenre($movies, $genre);
	$filteredMovies = getMoviesByQuery($filteredMovies, $query, $config);
	if (empty($filteredMovies))
	{
		$content = renderTemplate('res/layout/plug.php', [
			'plugText' => $config['strings']['movies_not_found']
		]);
	}
	else
	{
		$content = renderTemplate('res/layout/movie_list.php', [
			'movies' => $filteredMovies
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
