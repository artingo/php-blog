<?php
/**
 * Represents a blog user
 * Until there is a database connection, the ID will be incremented manually
 */
class User
{
	private static $idCounter = 1;
//	private static $cipher = "aes-256-ctr";
//	private static $encryption_key = "!%!!!)/=";
//	private static $encryption_iv = '1234567891011121';
	public $id;
	public $name;
	public $email;
	public $password;
	public $created;
	public $avatarUrl;

	/**
	 * Creates a new user. The password is encrypted.
	 * @param $name
	 * @param $email
	 * @param $password
	 */
	public function __construct($name, $email, $password, $avatarUrl = "/img/avatar.png")
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
//		TODO: encrypt password
//		$this->password = openssl_encrypt($password, self::$cipher, self::$encryption_key, 0, self::$encryption_iv);
		$this->avatarUrl = $avatarUrl;

		$this->id = self::$idCounter;
		$this->created = date_timestamp_get(date_create());
		self::$idCounter++;
	}

	public static function fromObject($user) : User {
		$instance = new self($user->name, $user->email, $user->password, $user->avatarUrl);
		$instance->id = $user->id;
		return $instance;
	}
	/**
	 * Returns the decrypted password
	 * @return false|string
	 */
	public function getPassword()
	{
//		$decrypted = openssl_decrypt($this->password, self::$cipher, self::$encryption_key, 0, self::$encryption_iv);
		return $this->password;
	}

	public static function setIdCounter($idCounter)
	{
		self::$idCounter = $idCounter;
	}

}