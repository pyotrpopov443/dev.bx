<?php

require_once 'render.php';

/** @var array $config */
require_once 'config.php';

/** @var array $genres */
/** @var array $movies */
require_once 'data/movies.php';
require_once 'helper-functions.php';

$menuItem = $_GET['menu_item'] ?? "Главная";
$genre = in_array($menuItem, $genres) ? $menuItem : "";
$query = $_POST['query'] ?? "";
$addMovie = isset($_GET['add_movie']);

if ($addMovie)
{
	$content = renderTemplate('res/layout/add_movie.php');
}
else if (isset($_GET['movie_id']))
{
	$id = $_GET['movie_id'];
	$content = renderTemplate('res/layout/movie_details.php', [
		'movie' => getMovieById($movies, $id)
	]);
}
elseif ($menuItem === $config['menu']['favorites'])
{
	$content = renderTemplate('res/layout/favorites.php');
}
else
{
	$filteredMovies = getMoviesByGenre($movies, $genre);
	$filteredMovies = getMoviesByQuery($filteredMovies, $query);
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
