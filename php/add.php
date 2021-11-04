<?php
declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
require_once "./lib/helper-functions.php";
require_once "./lib/template-functions.php";
require_once "./lib/validate-functions.php";

$newTodo = null;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
	$validationResult = validateTodo();
	if (!$validationResult['newTodo'])
	{
		$errors = $validationResult['errors'];
	}
	else
	{
		$newTodo = $validationResult['newTodo'];
	}
}

// prepare page content
$todosListPage = renderTemplate("./resources/pages/add-todo.php", [
	'newTodo' => $newTodo,
	'errors' => $errors
]);

// render layout
renderLayout($todosListPage, [
	'config' => $config,
	'currentPage' => getFileName(__FILE__)
]);