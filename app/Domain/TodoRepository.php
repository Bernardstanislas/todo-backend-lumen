<?php


namespace App\Domain;


class TodoRepository
{
    private $todos;

    public function __construct()
    {
        $this->todos = [];
    }

    public function all()
    {
        return $this->todos;
    }

    public function save(TodoEntity $todo)
    {
        $this->todos[] = $todo;
    }
}
