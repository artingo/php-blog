<?php

/**
 * Represents a blog user
 * Until there is a database connection, the ID will be incremented manually
 */
class User
{
    private static $id_counter = 1;
    public $id;
    public $name;
    public $email;
    public $password;
    public $created;

    /**
     * Creates a new user. The password is encrypted.
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        $this->id = self::$id_counter;
        $this->created = new DateTime();
        self::$id_counter++;
    }

}