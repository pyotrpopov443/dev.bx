<?php

declare(strict_types=1);

require_once 'autoload.php';

$mainView = new MainView('res/layout/main.php');
$addMovieView = new AddMovieView('res/layout/add_movie.php');
$mainView->setContent($addMovieView);
$mainView->render();
