<?php

declare(strict_types=1);
require_once 'data/MovieDatabase.php';
require_once 'render.php';
/** @var array $config */
require_once 'config.php';

$database = new MovieDatabase($config['db_connection_settings']);
$genres = $database->getGenres();

$content = renderTemplate('res/layout/add_movie.php');

$main = renderTemplate('res/layout/main.php', [
	'config' => $config,
	'genres' => $genres,
	'currentMenuItem' => $config['menu']['main'],
	'content' => $content,
	'query' => ""
]);

echo $main;
