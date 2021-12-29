<?php
/** @var DetailedMovieView $detailedMovieView */

$movie = $detailedMovieView->getMovie();
?>

<?php if(isset($movie)) {?>
	<div class="movie-detailed">
		<div class="movie-detailed--header">
			<div class="movie-detailed--titles">
				<div class="movie-detailed--title"><?= $movie->getTitle() ." (". $movie->getReleaseDate().")"?></div>
				<div class="movie-detailed--subtitle">
					<div class="movie-detailed--subtitle-text"><?= $movie->getOriginalTitle()?></div>
					<div class="movie-detailed--subtitle-age"><?= $movie->getAgeRestriction() . "+"?></div>
				</div>
			</div>
			<div class="movie-detailed--favourite"></div>
		</div>
		<div class="movie-detailed--body">
			<div class="movie-detailed--poster" style="
				background: url('res/drawable/movie_posters/<?= $movie->getId()?>.jpg') center no-repeat;
				background-size: cover;"></div>
			<div class="movie-detailed--info">
				<div class="movie-detailed--rating">
					<?php for($i = 1; $i <= 10; $i++):?>
						<div class="rating-square <?= $i > round($movie->getRating()) ? 'off' : ''?>"></div>
					<?php endfor;?>
					<div class="movie-detailed--rating-text"><?= $movie->getRating()?></div>
				</div>
				<h1 class="movie-detailed--info-block-title">О фильме</h1>
				<div class="movie-detailed--about">
					<div class="movie-detailed--about-block">
						<div class="movie-detailed--about-name">Год производства:</div>
						<div class="movie-detailed--about-text"><?= $movie->getReleaseDate()?></div>
					</div>
					<div class="movie-detailed--about-block">
						<div class="movie-detailed--about-name">Режиссер:</div>
						<div class="movie-detailed--about-text"><?= $movie->getDirector()?></div>
					</div>
					<div class="movie-detailed--about-block">
						<div class="movie-detailed--about-name">В главных ролях:</div>
						<div class="movie-detailed--about-text"><?= $movie->formatCast()?></div>
					</div>
				</div>
				<h1 class="movie-detailed--info-block-title">Описание</h1>
				<div class="movie-detailed--description"><?= $movie->getDescription()?></div>
			</div>
		</div>
	</div>
<?php
	}
	else
	{
		$config = Config::getInstance();
		$plugView = new PlugView('res/layout/plug.php');
		$plugView->setPlugText($config->getString('movie_not_found'));
		$plugView->render();
	}
?>
