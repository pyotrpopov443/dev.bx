<?php
/** @var array $genres */
/** @var array $content */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="res/css/reset.css">
	<link rel="stylesheet" type="text/css" href="res/css/main.css">
</head>
<body>

<div class="wrapper">

	<div class="menu">
		<div class="logo"></div>
		<div class="navigation">
			<div class="menu-item">
				<a href="index.php">Главная</a>
			</div>

			<?php foreach ($genres as $genre):?>
				<div class="menu-item">
					<a href="index.php?genre=<?= $genre?>"><?= $genre?></a>
				</div>
			<?php endforeach;?>

			<div class="menu-item">
				<a href="#Избранное">Избранное</a>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="searchbar">
			<div class="search">
				<div class="search-line">
					<div class="search-icon"></div>
					<div class="search-field">Поиск по каталогу...</div>
				</div>
				<div class="btn search-btn">Искать</div>
			</div>
			<div class="btn movie-add-btn">Добавить фильм</div>
		</div>

		<div class="content">
			<?= $content;?>
		</div>
	</div>

</div>

</body>
</html>
