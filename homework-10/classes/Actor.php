<?php

class Actor
{
	private $id;
	private $name;

	public function __construct(array $actorData)
	{
		$this->id = $actorData['ID'];
		$this->name = $actorData['NAME'];
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

}