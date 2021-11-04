<?php

function getTodosByStatus(array $todos, bool $status): array
{
	return array_filter($todos, function($todo) use ($status){
		return $todo['completed'] === $status;
	});
}