<?php

/**
 * Represents a blog category
 * Until there is a database connection, the ID will be incremented manually
 */

class Category
{
    private static $id_counter = 1;
    public $id;
    public $name;

    /**
     * Creates a new blog category
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->id = self::$id_counter;
        self::$id_counter++;
    }
}