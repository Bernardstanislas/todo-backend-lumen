<?php

use PHPUnit\Framework\TestCase;
use App\Domain\TodoEntity;

class TodoEntityTest extends TestCase
{
    /**
     * @var TodoEntity
     */
    private $todo;

    public function setUp()
    {
        $this->todo = TodoEntity::named('Bring some milk');
    }

    /**
     * @test
     */
    public function it_can_create_an_entity()
    {
        $this->assertInstanceOf(TodoEntity::class, $this->todo);
    }

    /**
     * @test
     */
    public function a_todo_is_not_completed_by_default()
    {
        $this->assertFalse($this->todo->isCompleted());
    }

    /**
     * @test
     */
    public function a_todo_is_marked_as_completed_with_a_public_method()
    {
        $this->todo->complete();

        $this->assertTrue($this->todo->isCompleted());
    }
}
