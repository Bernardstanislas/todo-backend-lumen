<?php

namespace App\Screenplay;

use Hamcrest\MatcherAssert;

class Assertion
{
    private $target;
    private $matcher;

    public function __construct($target, $matcher)
    {
        $this->target = $target;
        $this->matcher = $matcher;
    }

    public function assertAs(Actor $actor)
    {
        MatcherAssert::assertThat($this->target->for($actor), $this->matcher->getMatcher());
    }
}
