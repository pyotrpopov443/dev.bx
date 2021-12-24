<?php

declare(strict_types=1);

require_once 'autoload.php';
require_once 'render.php';

$config = Config::getInstance();
$database = new MovieDatabase($config->getDbConnectionSettings());
$genres = $database->getGenres();

$content = renderTemplate('res/layout/add_movie.php');
$main = renderTemplate('res/layout/main.php', [
	'genres' => $genres,
	'currentMenuItem' => 'main',
	'content' => $content,
	'query' => ''
]);

echo $main;
