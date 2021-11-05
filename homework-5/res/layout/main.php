<?php
/** @var array $config */
/** @var array $genres */
/** @var array $content */
/** @var array $currentMenuItem */
/** @var array $query */
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
				<a href="index.php"
				   class="<?= $currentMenuItem===$config['menu']['main'] ? 'menu-item-active' : '';?>">
					<?=$config['menu']['main']?></a>
			</div>

			<?php foreach ($genres as $genre):?>
				<div class="menu-item">
					<a href="index.php?menu_item=<?= $genre?>"
					   class="<?= $currentMenuItem===$genre ? 'menu-item-active' : '';?>"><?= $genre?></a>
				</div>
			<?php endforeach;?>

			<div class="menu-item">
				<a href="index.php?menu_item=<?= $config['menu']['favorites']?>"
				   class="<?= $currentMenuItem===$config['menu']['favorites'] ? 'menu-item-active' : '';?>">
					<?=$config['menu']['favorites']?></a>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="searchbar">
			<div class="search">
				<form action="index.php" method="post" enctype="multipart/form-data" class="search-form">
					<div class="search-line">
						<div class="search-icon"></div>
							<input type="text" id="query" name="query" class="search-field" placeholder="Поиск по каталогу..."
							value="<?= $query?>">
					</div>
					<input type="submit" value="Искать" class="btn search-btn">
				</form>
			</div>
			<a class="btn movie-add-btn" href="index.php?add_movie=true">Добавить фильм</a>
		</div>

		<div class="content">
			<?= $content;?>
		</div>
	</div>

</div>

</body>
</html>
