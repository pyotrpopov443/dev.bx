<?php

declare(strict_types=1);

require_once 'autoload.php';
require_once 'helper-functions.php';

$mainView = new MainView('res/layout/main.php');
$movieListView = new MovieListView('res/layout/movie_list.php');
$movieListView->loadMovies($mainView->getGenreId(), $mainView->getQuery());
$mainView->setContent($movieListView);
$mainView->render();
