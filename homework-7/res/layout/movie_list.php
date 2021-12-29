<?php
/** @var array $movies */
?>

<div class="movie-list">
	<?php foreach ($movies as $movie): ?>
		<?= renderTemplate("res/layout/movie_card.php", [
			'movie' => $movie
		]) ?>
	<?php endforeach; ?>
</div>
