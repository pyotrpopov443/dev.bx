<?php
/** @var array $config */
/** @var string $content */
/** @var string $userName */
/** @var string $currentPage */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $config['title'] ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./resources/css/style.css">
</head>
<body>
	<header class="header">
		<div class="header-inner">
			<div class="header-inner-left">
				<div class="header-title"><?= $config['title'] ?></div>
			</div>
			<div class="header-inner-center">
				<?php foreach($config['menu'] as $code => $name): ?>
				<div class="header-inner-menu-item">
					<a class="header-inner-menu-item-link <?= $currentPage === $code ? "active" : "" ?>" href="<?= $code . ".php" ?>"><?= $name ?></a>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="header-inner-right">
				<div class="header-user-name"><?= escape($config['user-name']) ?></div>
				<div class="header-avatar"></div>
			</div>
		</div>
	</header>
	<main class="content-container">
		<div class="content">
			<?= $content ?>
		</div>
	</main>
	<footer class="footer">
		<div class="footer-content">
			<div class="footer-title">That's a simple footer with not so important info</div>
			<div class="footer-date"><?= $config['current-year'] ?></div>
		</div>
	</footer>
</body>
</html>