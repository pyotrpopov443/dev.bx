<?php
/** @var array $genres */
/** @var array $content */
/** @var array $currentMenuItem */
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
				   class="<?= $currentMenuItem==='Главная' ? 'menu-item-active' : '';?>">Главная</a>
			</div>

			<?php foreach ($genres as $genre):?>
				<div class="menu-item">
					<a href="index.php?genre=<?= $genre?>"
					   class="<?= $currentMenuItem===$genre ? 'menu-item-active' : '';?>">
						<?= $genre?>
					</a>
				</div>
			<?php endforeach;?>

			<div class="menu-item">
				<a href="#Избранное"
				   class="<?= $currentMenuItem==='Избранное' ? 'menu-item-active' : '';?>">Избранное</a>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="searchbar">
			<div class="search">
				<form action="" method="post" enctype="multipart/form-data" class="search-form">
					<div class="search-line">
						<div class="search-icon"></div>
							<input type="text" id="query" name="query" class="search-field" placeholder="Поиск по каталогу...">
					</div>
					<input type="submit" value="Искать" class="btn search-btn">
				</form>
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
