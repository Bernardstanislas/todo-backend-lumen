<?php

use App\Domain\TodoEntity;
use App\Domain\TodoRepository;
use PHPUnit\Framework\TestCase;

class TodoRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_saves_new_todos()
    {
        $todoRepository = new TodoRepository();
        $todosCountBefore = count($todoRepository->all());
        $todo = TodoEntity::named('Bring some milk');

        $todoRepository->save($todo);

        $todosCountAfter = count($todoRepository->all());

        $this->assertEquals($todosCountBefore + 1, $todosCountAfter);
    }
}
