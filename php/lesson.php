<?php

// region Strings
function formatMessage(string $text, int $textLength = 10, string $fillSymbol = "#", int $outputLength = 40): string
{
	if (strlen($text) > $textLength)
	{
		$text = substr($text, 0, $textLength) . "...";
	}

	$result = str_repeat($fillSymbol, $outputLength) . "\n";
	$result .= str_pad($text, $outputLength, $fillSymbol, STR_PAD_BOTH) . "\n";
	$result .= str_repeat($fillSymbol, $outputLength) . "\n";

	return $result;
}

$text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. A asperiores at autem cupiditate, dolorem dolorum eius enim error, fugiat nesciunt optio praesentium provident quo ratione repellendus repudiandae tempore unde velit. Aliquid blanditiis, cum debitis eaque facilis id, illum laboriosam laborum libero nisi quidem quisquam, tempora veniam voluptas voluptatem! Adipisci, numquam.";
//echo formatMessage($text);
// endregion

// region Numbers
function calculateTips(int $cost): int
{
	$tipPercent = random_int(0, 100);

	return round($cost * ($tipPercent / 100));
}

function generateTips(int $cost, int $iterations): array
{
	$tips = [];

	for ($i = 0; $i < $iterations; $i++)
	{
		$tips[] = calculateTips($cost);
	}
	
	return $tips;
}

$tips = generateTips(1000, 100);
$minTip = min(...$tips);
$maxTip = max(...$tips);
//echo "Min tip is - {$minTip}" . "\n";
//echo "Max tip is - {$maxTip}" . "\n";
// endregion

// region Arrays


$todos = [
	[
		"id" => 1,
		"title" => "Clean the house",
		"completed" => true
	],
	[
		"id" => 2,
		"title" => "Do the dishes",
		"completed" => false
	],
	[
		"id" => 3,
		"title" => "Go shopping",
		"completed" => true
	],
	[
		"id" => 4,
		"title" => "Read a book",
		"completed" => false
	],
];
$tomorrowTodos = [
	[
		"id" => 5,
		"title" => "Walk the dog",
		"completed" => true
	],
	[
		"id" => 6,
		"title" => "Meet with friends",
		"completed" => false
	]
];
$todos = array_merge($todos, $tomorrowTodos);

/**
 * @param array $todos
 * @param string $name
 *
 * @return false|array
 */
function getTodoByName(array $todos, string $name)
{
	$key = array_search($name, array_column($todos, "title"), true);

	if ($key === false)
	{
		return false;
	}

	return $todos[$key];
}

function getTodosByStatus(array $todos, bool $status): array
{
	return array_filter($todos, function($todo) use ($status){
		return $todo['completed'] === $status;
	});
}

function completeTodos(array $todos): array
{
	return array_map(function($todo){
		return array_merge($todo, ['completed' => true]);
	}, $todos);
}

//$result = getTodoByName($todos, "Walk the dog");
//$result = getTodosByStatus($todos, true);
//$result = completeTodos($todos);
//var_dump($result);

// endregion

// region Dates

function getDaysUntil(string $dateUntil): int
{
	$secondsUntil = strtotime($dateUntil);
	$secondsNow = time();

	$diff = $secondsUntil - $secondsNow;
	if ($diff < 0)
	{
		return 0;
	}

	$secondsInDay = 60 * 60 * 24;

	return round($diff / $secondsInDay);
}

//var_dump(getDaysUntil("01.06.2022"));

// endregion