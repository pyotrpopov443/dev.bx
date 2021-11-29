<?php

require_once 'helper-functions.php';
require_once 'data/db_connect.php';
require_once 'data/db_movies.php';
require_once 'render.php';
/** @var array $config */
require_once 'config.php';

$database = dbConnect($config['db_connection_settings']);
$genres = getGenres($database);
$actors = getActors($database);

$id = is_numeric($_GET['movie_id']) ? (int)$_GET['movie_id'] : 0;
$movie = getMovieById($database, $id);

if ($movie === false)
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
