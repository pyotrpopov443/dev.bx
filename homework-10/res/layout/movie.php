<?php
/** @var MovieView $movieView */
$movie = $movieView->getMovie();
?>

<div class="movie">
	<div class="movie-overlay">
		<a class="more-btn" href="detailed-movie.php?movie_id=<?= $movie->getId()?>">Подробнее</a>
	</div>
	<div class="poster" style="
		background: url('res/drawable/movie_posters/<?= $movie->getId()?>.jpg') center no-repeat;
		background-size: cover;"></div>
	<div class="movie-header">
		<div class="title"><?= $movie->getTitle()?></div>
		<div class="subtitle"><?= $movie->getOriginalTitle()?></div>
	</div>
	<div class="description"><?= formatDescription($movie->getDescription()) ?></div>
	<div class="movie-footer">
		<div class="movie-duration">
			<div class="movie-duration-icon"></div>
			<div class="movie-duration-text"><?= formatDuration($movie->getDuration())?></div>
		</div>
		<div class="movie-genres"><?= $movie->formatGenres() ?></div>
	</div>
</div>