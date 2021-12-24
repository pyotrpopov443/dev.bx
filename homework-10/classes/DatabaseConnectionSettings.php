<?php

class DatabaseConnectionSettings
{
	private $host;
	private $username;
	private $password;
	private $databaseName;

	public function __construct(string $host, string $username, string $password, string $databaseName)
	{
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->databaseName = $databaseName;
	}

	public function getHost(): string
	{
		return $this->host;
	}

	public function getUsername(): string
	{
		return $this->username;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

	public function getDatabaseName(): string
	{
		return $this->databaseName;
	}

}