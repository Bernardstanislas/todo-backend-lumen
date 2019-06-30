<?php

use App\Screenplay\Action;
use App\Screenplay\Actor;
use App\Screenplay\AddTodo;
use App\Screenplay\Assertion;
use App\Screenplay\HaveTodo;
use App\Screenplay\Start;
use App\Screenplay\TheTodos;
use Hamcrest\MatcherAssert;

class GivenThat
{
    private $actor;

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    public function wasAbleTo(Action $action)
    {
        $action->performAs($this->actor);
    }
}

function givenThat(Actor $actor)
{
    return new GivenThat($actor);
}

class When
{
    private $actor;

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    public function attemptsTo(Action $action)
    {
        $action->performAs($this->actor);
    }
}

function when(Actor $actor)
{
    return new When($actor);
}

class Then
{
    private $actor;

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    public function should(Assertion $assertion)
    {
        $assertion->assertAs($this->actor);
    }
}

function then(Actor $actor)
{
    return new Then($actor);
}

function seeThat($target, $matcher)
{
    return new Assertion($target, $matcher);
}

class TodoCreationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws Throwable
     */
    public function runBare(): void
    {
        MatcherAssert::resetCount();
        try {
            parent::runBare();
        } catch (Throwable $e) {
        }
        $this->addToAssertionCount(MatcherAssert::getCount());
        if (isset($e)) {
            throw $e;
        }
    }

    /**
     * @test
     */
    public function james_can_create_a_todo()
    {
        $james = Actor::named('James');

        givenThat($james)->wasAbleTo(Start::withAnEmptyTodoList());
        when($james)->attemptsTo(AddTodo::called('Buy some milk'));
        then($james)->should(seeThat(TheTodos::displayed(), HaveTodo::called('Buy some milk')));
    }
}
