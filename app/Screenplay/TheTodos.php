<?php


namespace App\Screenplay;


use App\Domain\TodoEntity;

class TheTodos
{
    public static function displayed()
    {
        return new self();
    }

    public function for(Actor $actor)
    {
        return array_map(function (TodoEntity $todo) {
            return $todo->name;
        }, $actor->todoRepository->all());
    }
}
