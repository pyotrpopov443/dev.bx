<?php

declare(strict_types=1);

require_once 'autoload.php';
require_once 'helper-functions.php';
require_once 'render.php';

$config = Config::getInstance();
$database = MovieDatabase::getInstance($config->getDbConnectionSettings());
$genres = $database->getGenres();

$id = is_numeric($_REQUEST['movie_id']) ? (int)$_REQUEST['movie_id'] : 0;
$movie = $database->getMovieById($id);

if (is_null($movie))
{
	$content = renderTemplate('res/layout/plug.php', [
		'plugText' => $config->getString('movie_not_found')
	]);
}
else
{
	$content = renderTemplate('res/layout/movie_details.php', [
		'movie' => $movie
	]);
}

$main = renderTemplate('res/layout/main.php', [
	'genres' => $genres,
	'currentMenuItem' => 'null',
	'content' => $content,
	'query' => ''
]);

echo $main;
