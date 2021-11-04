<?php

declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
/** @var array $todos */
require_once "./data/todos.php";
require_once "./lib/helper-functions.php";
require_once "./lib/todos-functions.php";
require_once "./lib/template-functions.php";

$todos = getTodosByStatus($todos, true);

// prepare page content
$todosListPage = renderTemplate(
	"./resources/pages/todos-list.php",
	[
		'todos' => $todos
	]
);

// render layout
renderLayout(
	$todosListPage,
	[
		'config' => $config
	]
);