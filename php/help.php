<?php
declare(strict_types=1);
/** @var array $config */
require_once "./config/app.php";
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";


// prepare page content
$todosListPage = renderTemplate("./resources/pages/howto.php");

// render layout
renderLayout(
	$todosListPage,
	[
		'config' => $config,
		'currentPage' => getFileName(__FILE__)
	]
);