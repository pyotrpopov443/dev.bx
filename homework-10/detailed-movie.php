<?php

declare(strict_types=1);

require_once 'autoload.php';
require_once 'helper-functions.php';

$mainView = new MainView('res/layout/main.php');
$detailedMovie = new DetailedMovieView('res/layout/movie_details.php');
$mainView->setContent($detailedMovie);
$mainView->render();
