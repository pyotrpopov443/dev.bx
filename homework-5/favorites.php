<?php

require_once 'render.php';

/** @var array $config */
require_once 'config.php';

/** @var array $genres */
/** @var array $movies */
require_once 'data/movies.php';

$content = renderTemplate('res/layout/favorites.php');

$main = renderTemplate('res/layout/main.php', [
	'config' => $config,
	'genres' => $genres,
	'currentMenuItem' => $config['menu']['favorites'],
	'content' => $content,
	'query' => ""
]);

echo $main;
