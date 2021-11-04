<?php

require_once 'render.php';

/** @var array $genres */
/** @var array $movies */
require_once 'data/movies.php';

$movieListPage = "";

$main = renderTemplate('res/layout/main.php', [
	'genres' => $genres,
	'content' => $movieListPage
]);

echo $main;