<?php

class Member
{
	public $id = 0;
	public $name = '';
	public $speciality = '';

	public function __construct(int $id, string $name, string $speciality)
	{
		$this->id = $id;
		$this->name = $name;
		$this->speciality = $speciality;
	}

	public function toString(): string
	{
		$s = 'Member: ' . $this->id . "\n";
		$s .= 'name: ' . $this->name . "\n";
		$s .= 'speciality: ' . $this->speciality;
		return $s;
	}

}

class Team
{
	public $id = 0;
	public $name = '';
	public $members = [];

	public function __construct(int $id, string $name, array $members)
	{
		$this->id = $id;
		$this->name = $name;
		$this->members = $members;
	}

	public function addMember(Member $member): void
	{
		$this->members[$member->id] = $member;
	}

	public function toString(): string
	{
		$s = 'Team: ' . $this->id . ' ' . $this->name;
		foreach ($this->members as $m)
		{
			$s .= "\n" . $m->toString();
		}
		return $s;
	}

}

$lev = new Member(1, 'Lev', 'developer');

$team = new Team(1, 'Communications', [$lev]);

echo $team->toString();
