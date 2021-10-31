<?php

// region Strings
function formatMessage(string $text, string $fillSymbol = "#", int $outputLength = 40) : string
{
	if (strlen($text) > 10)
	{
		$text = substr($text, 0, 10) . "...";
	}

	$result = str_repeat($fillSymbol, $outputLength) . "\n";
	$result .= str_pad($text, $outputLength, $fillSymbol, STR_PAD_BOTH) . "\n";
	$result .= str_repeat($fillSymbol, $outputLength) . "\n";
	return $result;
}

$text = "text";

//echo formatMessage($text);

//endregion

//region Numbers

function calculateTips(int $cost) : int
{
	$tipPercent = random_int(0, 100)/100;
	return round($cost * $tipPercent);
}

$cost = 100;

//echo "$cost\$ + " . calculateTips(100) . "\$ as tip";

//endregion

//region Arrays

$todos = [
	[
		"id" => 1,
		"title" => "read a book",
		"completed" => false
	],
	[
		"id" => 2,
		"title" => "wash dishes",
		"completed" => true
	],
	[
		"id" => 3,
		"title" => "wash floors",
		"completed" => false
	]
];

/**
 * returns todo by its name
 * @param array $todos
 * @param string $name
 *
 * @return false|array
 */
function getTodoByName(array $todos, string $name)
{
	$key = array_search($name, array_column($todos, "title"), true);

	if ($key == false)
	{
		return false;
	}

	return $todos[$key];
}

function getTodoByStatus(array $todos, bool $status) : array
{
	return array_filter($todos, function($todo) use ($status) {
		return $todo['completed'] === $status;
	});
}

function setTodosCompleted(array $todos): array
{
	return array_map(function($todo){
		$todo["completed"] = true;
		return $todo;
	}, $todos);
}

//$result = getTodoByName($todos, "wash dishes");
//$result = getTodoByStatus($todos, true);
//$result = setTodosCompleted($todos);

//endregion

//region Dates

function getDaysUntil(string $date): int
{
	$seconds = strtotime($date);
	$secondsNow = time();

	$diff = $seconds - $secondsNow;
	if ($diff < 0)
	{
		return 0;
	}

	$secondsInDays = 60 * 60 * 24;
	return round($diff/$secondsInDays);
}

$result = getDaysUntil("29.10.2021");
//echo "$result days left";

//endregion

include "template-functions.php";

function getTodosByStatus(array $todos, bool $status): array
{
	return array_filter($todos, function($todo) use ($status){
		return $todo['completed'] === $status;
	});
}

if (isset($_GET["completed"]))
{
	$status = $_GET["completed"] === true;
	echo $status;
	$todos = getTodosByStatus($todos, $status);
}

$todosListPage = renderTemplate("todos-list.php", [
	'todos' => $todos
]);

echo $todosListPage;
