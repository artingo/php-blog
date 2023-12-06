<?php

/**
 * Represents a blog post
 * Until there is a database connection, the ID will be incremented manually
 */
class Post
{
	private static $idCounter = 1;
	public $id;
	public $title;
	public $body;
	public $userId;
	public $categories = [];
	public $created;

	/**
	 * Creates a new blog post
	 * @param string $title
	 * @param string $body
	 * @param int $userId
	 * @param array $categories
	 * @return void
	 */
	public function __construct(string $title, string $body, int $userId, array $categories = [1, 3])
	{
		$this->title = $title;
		$this->body = $body;
		$this->userId = $userId;
		$this->categories = $categories;

		$this->id = self::$idCounter;
		$this->created = date_timestamp_get(date_create());
		Post::$idCounter++;
	}


	/**
	 * Set the ID counter for the Post class
	 *
	 * @param int $idCounter The new value for the ID counter
	 * @return void
	 */
	public static function setIdCounter(int $idCounter): void
	{
		self::$idCounter = $idCounter;
	}

	/**
	 * Get the categories of the post
	 * @return array
	 */
	public function getCategories(): array
	{
		return $this->categories;
	}

	/**
	 * Set the categories of the post
	 * @param array $categories
	 */
	public function setCategories(array $categories): void
	{
		$this->categories = $categories;
	}
}
