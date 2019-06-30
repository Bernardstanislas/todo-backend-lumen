<?php


namespace App\Screenplay;


use App\Domain\TodoRepository;

class Start extends Action
{
    public static function withAnEmptyTodoList()
    {
        return new self();
    }

    public function performAs(Actor $actor)
    {
        $actor->todoRepository = new TodoRepository();
    }
}
