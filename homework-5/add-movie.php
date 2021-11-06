<?php

require_once 'render.php';

/** @var array $config */
require_once 'config.php';

/** @var array $genres */
require_once 'data/movies.php';

$content = renderTemplate('res/layout/add_movie.php');

$main = renderTemplate('res/layout/main.php', [
	'config' => $config,
	'genres' => $genres,
	'currentMenuItem' => $config['menu']['main'],
	'content' => $content,
	'query' => ""
]);

echo $main;
