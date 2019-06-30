<?php


namespace App\Screenplay;


use App\Domain\TodoEntity;

class AddTodo extends Action
{
    private $todo;

    public function __construct(TodoEntity $todo)
    {
        $this->todo = $todo;
    }

    public static function called($todoName)
    {
        return new self(TodoEntity::named($todoName));
    }

    public function performAs(Actor $actor)
    {
        $actor->todoRepository->save($this->todo);
    }
}
