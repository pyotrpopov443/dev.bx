<?php
/** @var array $movies */
?>

<div class="movie-list">
	<?php foreach ($movies as $movie): ?>
		<?= renderTemplate("res/layout/movie.php", [
			'movie' => $movie
		]) ?>
	<?php endforeach; ?>
</div>
