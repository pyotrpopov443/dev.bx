<?php

declare(strict_types=1);
require_once 'data/MovieDatabase.php';
require_once 'helper-functions.php';
require_once 'render.php';
/** @var array $config */
require_once 'config.php';

$database = new MovieDatabase($config['db_connection_settings']);
$genres = $database->getGenres();
$actors = $database->getActors();

$id = is_numeric($_GET['movie_id']) ? (int)$_GET['movie_id'] : 0;
$movie = $database->getMovieById($id);

if (is_null($movie))
{
	$content = renderTemplate('res/layout/plug.php', [
		'plugText' => $config['strings']['movie_not_found']
	]);
}
else
{
	$movie = formatMovie($movie, $genres, $actors);
	$content = renderTemplate('res/layout/movie_details.php', [
		'movie' => $movie
	]);
}

$main = renderTemplate('res/layout/main.php', [
	'config' => $config,
	'genres' => $genres,
	'currentMenuItem' => 'null',
	'content' => $content,
	'query' => ''
]);

echo $main;
