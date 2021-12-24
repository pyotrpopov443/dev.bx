<?php
/** @var array $genres */
/** @var array $content */
/** @var array $currentMenuItem */
/** @var array $query */

$config = Config::getInstance();
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bitflix</title>
	<link rel="stylesheet" type="text/css" href="res/css/reset.css">
	<link rel="stylesheet" type="text/css" href="res/css/main.css">
</head>
<body>
<div class="wrapper">
	<div class="menu">
		<div class="logo"></div>
		<div class="navigation">
			<div class="menu-item">
				<a href="index.php"
				   class="<?= $currentMenuItem === 'main' ? 'menu-item-active' : ''?>">
					<?= $config->getMenuItem('main')?></a>
			</div>
			<?php foreach ($genres as $genre):?>
				<div class="menu-item">
					<a href="index.php?menu_item=<?= $genre->getCode()?>"
					   class="<?= $currentMenuItem === $genre->getCode() ? 'menu-item-active' : ''?>"><?= $genre->getName()?></a>
				</div>
			<?php endforeach;?>
			<div class="menu-item">
				<a href="favorites.php"
				   class="<?= $currentMenuItem === 'favorites' ? 'menu-item-active' : ''?>">
					<?= $config->getMenuItem('favorites')?></a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="searchbar">
			<div class="search">
				<form action="index.php" method="get" enctype="multipart/form-data" class="search-form">
					<div class="search-line">
						<div class="search-icon"></div>
							<input type="text" id="query" name="query" class="search-field" placeholder="Поиск по каталогу..."
							value="<?= $query?>">
					</div>
					<input type="submit" value="Искать" class="btn search-btn">
				</form>
			</div>
			<a class="btn movie-add-btn" href="add-movie.php">Добавить фильм</a>
		</div>
		<div class="content">
			<?= $content?>
		</div>
	</div>
</div>
</body>
</html>
