<?php
/** @var array $movie */

function formatDuration(int $duration) : string
{
	$h = $duration/60;
	$m = $duration - 60*$h;
	return "$duration мин. / $h:$m";
}

?>

<div class="movie">
	<div class="poster"></div>
	<div class="movie-header">
		<div class="title"><?= $movie['title']?></div>
		<div class="subtitle"><?= $movie['original-title']?></div>
	</div>
	<div class="description"><?= $movie['description']?></div>
	<div class="movie-footer">
		<div class="movie-duration">
			<div class="movie-duration-icon"></div>
			<div class="movie-duration-text"><?= formatDuration($movie['duration'])?></div>
		</div>
		<div class="movie-genres"><?= print_r(implode(', ',$movie['genres'])) ?></div>
	</div>
</div>