<?php

namespace Peterjmit\Bamboo;

use Peterjmit\Bamboo\Http;

/**
 * Bamboo API client
 */
class Bamboo
{
    /** @var Http\ClientInterface Client used to make HTTP requests */
    private $client;

    /**
     * Constructor
     *
     * @param HttpClientInterface $client
     */
    public function __construct(Http\ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Create a new API client with the guzzle http client
     *
     * @param  string $url         Base url for the bamboo rest API instance
     * @param  string $username
     * @param  string $password
     * @param  string $apiVersion  API version number
     *
     * @return Bamboo
     */
    public static function create($url, $username, $password, $apiVersion = 'latest')
    {
        return new static(new Http\GuzzleClient($url, $apiVersion, $username, $password));
    }

    /**
     * Return all builds on the bamboo server
     *
     * @return array
     */
    public function getAllBuildResults()
    {
        return $this->client->get('result');
    }

    /**
     * Return build results for a specific plan
     *
     * @param  string $project  Project name
     * @param  string $plan     Plan name
     *
     * @return array
     */
    public function getPlanResults($project, $plan)
    {
        return $this->client->get(sprintf('result/%s-%s', $project, $plan));
    }

    /**
     * Return build results for a specific plan branch
     *
     * @param  string $project  Project name
     * @param  string $plan     Plan name
     *
     * @return array
     */
    public function getPlanBranchResults($project, $plan, $branch)
    {
        return $this->client->get(sprintf('result/%s-%s/branch/%s', $project, $plan, $branch));
    }

    /**
     * Return a branch for a specific plan
     *
     * @param  string $project  Project name
     * @param  string $plan     Plan name
     *
     * @return array
     */
    public function getPlanBranch($project, $plan, $branch)
    {
        return $this->client->get(sprintf('plan/%s-%s/branch/%s', $project, $plan, $branch));
    }
}
