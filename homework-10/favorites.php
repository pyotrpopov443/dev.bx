<?php

declare(strict_types=1);

require_once 'autoload.php';

$mainView = new MainView('res/layout/main.php');
$favoritesView = new FavoritesView('res/layout/favorites.php');
$mainView->setContent($favoritesView);
$mainView->render();
