<?php

$config = [
	'menu' => [
		'main' => 'Главная',
		'favorites' => 'Избранное'
	],
	'strings' => [
		'movie_not_found' => 'Такого фильма не существует.',
		'movies_not_found' => 'По вашему запросу не найдено ни одного фильма.'
	],
	'movie_search_columns' => ['title', '`original-title`', 'description', 'director', '`release-date`', 'actors', 'genreNames'],
	'db_connection_settings' => [
		'host' => 'localhost',
		'username' => 'student',
		'passwd' => 'student',
		'dbname' => 'dev'
	]
];
