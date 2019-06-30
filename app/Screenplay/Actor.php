<?php


namespace App\Screenplay;


use App\Domain\TodoRepository;

class Actor
{
    public $name;

    /**
     * @var TodoRepository
     */
    public $todoRepository;

    protected function __construct($name)
    {
        $this->name = $name;
    }

    public static function named(string $name)
    {
        return new self($name);
    }
}
