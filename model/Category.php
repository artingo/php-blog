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
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->id = self::$id_counter;
        self::$id_counter++;
    }

    /**
     * Get the ID of the category
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of the category
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
