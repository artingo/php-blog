<?php

/**
 * Represents a blog post
 * Until there is a database connection, the ID will be incremented manually
 */
class Post
{
    private static $id_counter = 1;
    public $id;
    public $title;
    public $body;
    public $user_id;
    public $categories = [];
    public $created;

    /**
     * Creates a new blog entry
     * @param $title
     * @param $body
     * @param $user_id
     * @param $category_id
     */
    public function __construct($title, $body, $user_id, $category_id = 1)
    {
        $this->title = $title;
        $this->body = $body;
        $this->user_id = $user_id;
        $this->categories[] = $category_id;

        $this->id = self::$id_counter;
        $this->created = new DateTime();
        self::$id_counter++;
    }

}