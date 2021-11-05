<?php
/** @var array $movie */
?>

<div class="movie">
	<div class="movie-overlay">
		<a class="more-btn" href="index.php?movie_id=<?= $movie['id']?>">Подробнее</a>
	</div>
	<div class="poster" style="
		background: url('res/drawable/movie_posters/<?= $movie['id']?>.jpg') center no-repeat;
		background-size: cover;"></div>
	<div class="movie-header">
		<div class="title"><?= $movie['title']?></div>
		<div class="subtitle"><?= $movie['original-title']?></div>
	</div>
	<div class="description"><?= formatDescription($movie['description']) ?></div>
	<div class="movie-footer">
		<div class="movie-duration">
			<div class="movie-duration-icon"></div>
			<div class="movie-duration-text"><?= formatDuration($movie['duration'])?></div>
		</div>
		<div class="movie-genres"><?= formatArray($movie['genres']); ?></div>
	</div>
</div>