<?php


namespace App\Screenplay;


use Hamcrest\Matchers;

class HaveTodo
{
    private $todoName;

    public function __construct(string $todoName)
    {
        $this->todoName = $todoName;
    }

    public static function called(string $todoName)
    {
        return new self($todoName);
    }

    public function getMatcher()
    {
        return Matchers::hasItemInArray($this->todoName);
    }
}
