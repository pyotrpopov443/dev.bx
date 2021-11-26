<?php

function formatDuration(int $duration): string
{
	$h = (int)($duration/60);
	$m = $duration - 60 * $h;

	$hours = str_pad((string)$h, 2, "0", STR_PAD_LEFT);
	$minutes = str_pad((string)$m, 2, "0", STR_PAD_LEFT);
	return "$duration мин. / $hours:$minutes";
}

function formatDescription(string $description): string
{
	return mb_strimwidth($description, 0, 180, "...");
}

function formatArray(array $arr): string
{
	return implode(', ', $arr);
}

function genresFromIds(array $genreIds, array $genres): array
{
	$genresNames = [];
	foreach ($genreIds as $id)
	{
		$genresNames[] = $genres[$id];
	}
	return $genresNames;
}
