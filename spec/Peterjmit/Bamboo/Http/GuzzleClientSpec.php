<?php

namespace spec\Peterjmit\Bamboo\Http;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleClientSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('bamboo.com', 'latest', 'user', 'password');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Peterjmit\Bamboo\Http\GuzzleClient');
    }
}
