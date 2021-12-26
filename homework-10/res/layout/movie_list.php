<?php
/** @var MovieListView $movieListView */

$config = Config::getInstance();
$movies = $movieListView->getMovies();
?>

<div class="movie-list">
	<?php
		if (empty($movies))
		{
			$plugView = new PlugView('res/layout/plug.php');
			$plugView->setPlugText($config->getString('movies_not_found'));
			$plugView->render();
		}
		else
		{
			foreach ($movies as $movie)
			{
				$movieView = new MovieView('res/layout/movie.php', $movie);
				$movieView->render();
			}
		}
	?>
</div>
