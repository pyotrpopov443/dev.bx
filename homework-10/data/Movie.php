<?php

class Movie
{
	private $id;
	private $title;
	private $original_title;
	private $description;
	private $duration;
	private $director;
	private $age_restriction;
	private $release_date;
	private $rating;
	private $genres;
	private $cast;

	public function __construct(array $movieData)
	{
		$this->id = $movieData['id'];
		$this->title = $movieData['title'];
		$this->original_title = $movieData['original-title'];
		$this->description = $movieData['description'];
		$this->duration = $movieData['duration'];
		$this->director = $movieData['director'];
		$this->age_restriction = $movieData['age-restriction'];
		$this->release_date = $movieData['release-date'];
		$this->rating = $movieData['rating'];
		$this->genres =  $movieData['genres'];
		$this->cast = $movieData['cast'];
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getOriginalTitle(): string
	{
		return $this->original_title;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getDuration(): int
	{
		return $this->duration;
	}

	public function getDirector(): string
	{
		return $this->director;
	}

	public function getAgeRestriction(): int
	{
		return $this->age_restriction;
	}

	public function getReleaseDate(): int
	{
		return $this->release_date;
	}

	public function getRating(): float
	{
		return $this->rating;
	}

	public function getGenres(): array
	{
		return $this->genres;
	}

	public function formatGenres(): string
	{
		$genres = [];
		foreach ($this->genres as $genre)
		{
			$genres[] = $genre->getName();
		}
		return implode(', ', $genres);
	}

	public function getActors(): array
	{
		return $this->cast;
	}

	public function formatCast(): string {
		$actors = [];
		foreach ($this->cast as $actor)
		{
			$actors[] = $actor->getName();
		}
		return implode(', ', $actors);
	}

}
