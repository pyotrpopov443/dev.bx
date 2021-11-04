<?php

require_once 'render.php';

/** @var array $genres */
/** @var array $movies */
require_once 'data/movies.php';
require_once 'helper-functions.php';


if (isset($_GET['movie_id']))
{
	$content = renderTemplate('res/layout/movie_details.php', [
		'id' => $_GET['movie_id'],
		'movies' => $movies
	]);
}
else
{
	$genre = $_GET['genre'] ?? "";
	$content = renderTemplate('res/layout/movie_list.php', [
		'movies' => getMoviesByGenre($movies, $genre)
	]);
}

$main = renderTemplate('res/layout/main.php', [
	'genres' => $genres,
	'content' => $content
]);

echo $main;
