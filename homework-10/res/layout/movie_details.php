<?php
/** @var int $movie */
?>

<div class="movie-detailed">
	<div class="movie-detailed--header">
		<div class="movie-detailed--titles">
			<div class="movie-detailed--title"><?= $movie['title'] ." (". $movie['release-date'].")"?></div>
			<div class="movie-detailed--subtitle">
				<div class="movie-detailed--subtitle-text"><?= $movie['original-title']?></div>
				<div class="movie-detailed--subtitle-age"><?= $movie['age-restriction'] . "+"?></div>
			</div>
		</div>
		<div class="movie-detailed--favourite"></div>
	</div>
	<div class="movie-detailed--body">
		<div class="movie-detailed--poster" style="
			background: url('res/drawable/movie_posters/<?= $movie['id']?>.jpg') center no-repeat;
			background-size: cover;"></div>
		<div class="movie-detailed--info">
			<div class="movie-detailed--rating">
				<?php for($i = 1; $i <= 10; $i++):?>
					<div class="rating-square <?= $i > round($movie['rating']) ? 'off' : ''?>"></div>
				<?php endfor;?>
				<div class="movie-detailed--rating-text"><?= $movie['rating']?></div>
			</div>
			<h1 class="movie-detailed--info-block-title">О фильме</h1>
			<div class="movie-detailed--about">
				<div class="movie-detailed--about-block">
					<div class="movie-detailed--about-name">Год производства:</div>
					<div class="movie-detailed--about-text"><?= $movie['release-date']?></div>
				</div>
				<div class="movie-detailed--about-block">
					<div class="movie-detailed--about-name">Режиссер:</div>
					<div class="movie-detailed--about-text"><?= $movie['director']?></div>
				</div>
				<div class="movie-detailed--about-block">
					<div class="movie-detailed--about-name">В главных ролях:</div>
					<div class="movie-detailed--about-text"><?= formatArray($movie['cast'])?></div>
				</div>
			</div>
			<h1 class="movie-detailed--info-block-title">Описание</h1>
			<div class="movie-detailed--description"><?= $movie['description']?></div>
		</div>
	</div>
</div>
