<?php

function validateTodo(): array
{
	$result = [
		'errors' => [],
		'newTodo' => null
	];

	// 1. required fields
	$requiredFields = [
		'title' => 'Title',
		'description' => 'Task description'
	];

	foreach ($requiredFields as $code => $name)
	{
		if (!isset($_POST[$code]) || $_POST[$code] === '')
		{
			$result['errors'][] = "{$name} is required";
		}
	}

	$title = $_POST['title'];
	$description = $_POST['description'];
	$completed = isset($_POST['completed']) ? "Yes" : "No";
	$image = null;
	if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === 0)
	{
		$image = $_FILES['image'];
	}

	// 2. check fields format
	if (strlen($title) < 5)
	{
		$result['errors'][] = "Title should be longer than 4 symbols";
	}

	if (strlen($description) < 10)
	{
		$result['errors'][] = "Description should be longer than 10 symbols";
	}

	// 2.5 check file
	if ($image && !checkTodoImage($image))
	{
		$result['errors'][] = "Wrong file. Upload jpeg or png image.";
	}

	// 3. if no errors - create newTodo
	if (empty($result['errors']))
	{
		if ($image)
		{
			move_uploaded_file($image['tmp_name'], './upload/' . $image['name']);
		}

		$result['newTodo'] = [
			'title' => $title,
			'description' => $description,
			'completed' => $completed
		];
	}

	return $result;
}

function checkTodoImage(array $file): bool
{
	$allowedTypes = ['image/jpeg', 'image/png'];
	$type = mime_content_type($file['tmp_name']);

	return in_array($type, $allowedTypes, true);
}