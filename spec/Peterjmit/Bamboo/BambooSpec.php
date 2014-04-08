<?php

namespace spec\Peterjmit\Bamboo;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Peterjmit\Bamboo\Http\ClientInterface;

class BambooSpec extends ObjectBehavior
{
    function let(ClientInterface $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Peterjmit\Bamboo\Bamboo');
    }

    function it_gets_all_build_results(ClientInterface $client)
    {
        $client->get('result')->shouldBeCalled();

        $this->getAllBuildResults();
    }

    function it_gets_results_for_a_plan(ClientInterface $client)
    {
        $client->get('result/AN-EXAMPLE')->shouldBeCalled();

        $this->getPlanResults('AN', 'EXAMPLE');
    }

    function it_gets_results_for_a_plan_branch(ClientInterface $client)
    {
        $client->get('result/AN-EXAMPLE/branch/test-branch')->shouldBeCalled();

        $this->getPlanBranchResults('AN', 'EXAMPLE', 'test-branch');
    }

    function it_gets_the_plan_for_a_branch(ClientInterface $client)
    {
        $client->get('plan/AN-EXAMPLE/branch/test-branch')->shouldBeCalled();

        $this->getPlanBranch('AN', 'EXAMPLE', 'test-branch');
    }
}
