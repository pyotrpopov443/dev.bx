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

function escape(string $str): string
{
	return htmlspecialchars(trim($str), ENT_QUOTES);
}

function getObjectsByIds(array $ids, array $objects): array
{
	$result = [];
	foreach ($objects as $object)
	{
		if (in_array((string)$object->getId(), $ids, true))
		{
			$result[] = $object;
		}
	}
	return $result;
}

function getGenreId(?string $code, array $genres): ?int
{
	foreach ($genres as $genre)
	{
		if ($genre->getCode() === $code)
		{
			return $genre->getId();
		}
	}
	return null;
}
