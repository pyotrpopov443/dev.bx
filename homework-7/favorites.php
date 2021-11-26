<?php

require_once 'data/db_connect.php';
require_once 'data/db_movies.php';
require_once 'render.php';
/** @var array $config */
require_once 'config.php';

$database = db_connect($config['db_connection_settings']);
$genres = getGenres($database);

$content = renderTemplate('res/layout/favorites.php');

$main = renderTemplate('res/layout/main.php', [
	'config' => $config,
	'genres' => $genres,
	'currentMenuItem' => $config['menu']['favorites'],
	'content' => $content,
	'query' => ""
]);

echo $main;
