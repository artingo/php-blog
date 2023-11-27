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
	 * Creates a new blog entry
	 * @param $title
	 * @param $body
	 * @param $userId
	 * @param $categories
	 */
	public function __construct($title, $body, $userId, $categories = [1, 3])
	{
		$this->title = $title;
		$this->body = $body;
		$this->userId = $userId;
		$this->categories = $categories;

		$this->id = self::$idCounter;
		$this->created = date_timestamp_get(date_create());
		Post::$idCounter++;
	}

	public static function setIdCounter($idCounter)
	{
		self::$idCounter = $idCounter;
	}

}