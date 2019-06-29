<?php


namespace App\Domain;


class TodoEntity
{
    public $name;
    private $completed;

    protected function __construct(string $name)
    {
        $this->name = $name;
        $this->completed = false;
    }

    public static function named($name): TodoEntity
    {
        return new self($name);
    }

    public function complete()
    {
        $this->completed = true;
    }

    public function isCompleted()
    {
        return $this->completed;
    }
}
