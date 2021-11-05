<?php

require_once 'render.php';

/** @var array $genres */
/** @var array $movies */
require_once 'data/movies.php';
require_once 'helper-functions.php';

$genre = $_GET['genre'] ?? "";

if (isset($_GET['movie_id']))
{
	$id = $_GET['movie_id'];
	$content = renderTemplate('res/layout/movie_details.php', [
		'movie' => getMovieById($movies, $id)
	]);
}
else
{
	$content = renderTemplate('res/layout/movie_list.php', [
		'movies' => getMoviesByGenre($movies, $genre)
	]);
}

$currentMenuItem = $genre === "" ? 'Главная' : $genre;

$main = renderTemplate('res/layout/main.php', [
	'genres' => $genres,
	'currentMenuItem' => $currentMenuItem,
	'content' => $content
]);

echo $main;
