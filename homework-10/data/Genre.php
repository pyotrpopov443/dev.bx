<?php

class Genre
{
	private $id;
	private $code;
	private $name;

	public function __construct(array $genreData)
	{
		$this->id = $genreData['ID'];
		$this->code = $genreData['CODE'];
		$this->name = $genreData['NAME'];
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getCode(): string
	{
		return $this->code;
	}

	public function getName(): string
	{
		return $this->name;
	}

}