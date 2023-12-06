<?php

/**
 * Represents a blog user
 * Until there is a database connection, the ID will be incremented manually
 */
class User
{
	private static $idCounter = 1;
	public $id;
	public $name;
	public $email;
	public $password;
	public $created;
	public $avatarUrl;

	/**
	 * Creates a new user. The password is encrypted.
	 * @param string $name
	 * @param string $email
	 * @param string $password
	 * @param string $avatarUrl
	 */
	public function __construct(string $name, string $email, string $password, string $avatarUrl = "/img/avatar.png")
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
		$this->avatarUrl = $avatarUrl;

		$this->id = self::$idCounter;
		$this->created = date_timestamp_get(date_create());
		self::$idCounter++;
	}

	/**
	 * Creates a new user from an object
	 * @param $user
	 * @return User
	 */
	public static function fromObject($user): User
	{
		$instance = new self($user->name, $user->email, $user->password, $user->avatarUrl);
		$instance->id = $user->id;
		return $instance;
	}
	/**
	 * Returns the decrypted password
	 * @return false|string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	public static function setIdCounter($idCounter)
	{
		self::$idCounter = $idCounter;
	}
}
