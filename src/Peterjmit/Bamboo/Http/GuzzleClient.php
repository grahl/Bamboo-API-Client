<?php

namespace Peterjmit\Bamboo\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Url;

/**
 * Guzzle implementation of ClientInterface
 */
class GuzzleClient implements ClientInterface
{
    /* @var $client \GuzzleHttp\Client; */
    private $client;
    private $username;
    private $password;

  /**
     * @param string $url
     * @param string $apiVersion
     * @param string $username
     * @param string $password
     * @param Client $client     optional guzzle client
     */
    public function __construct($url, $apiVersion, $username, $password)
    {
        $this->client = new Client([
            'base_uri' => $this->buildUrl($url, $apiVersion)
        ]);

        $this->configureClient($username, $password);
    }

    /**
     * {@inheritDoc}
     */
    public function get($url)
    {
        $response = $this->client->get($url, [
          'headers', ['Accept' => 'application/json'],
          'auth', [$this->username, $this->password],
          'query', ['os_authType' => 'basic']
        ]);

        return json_decode($response->getBody());
    }

    /**
     * Parse the url provided to the client
     *
     * @param  string $url
     * @param  string $apiVersion
     * @return string
     */
    private function buildUrl($url, $apiVersion)
    {
      return $url . '/rest/api/' . $apiVersion . '/';
    }

    private function configureClient($username, $password)
    {
        $this->client->setDefaultOption('headers', ['Accept' => 'application/json']);
        $this->client->setDefaultOption('auth', [$username, $password]);
        $this->client->setDefaultOption('query', ['os_authType' => 'basic']);
    }
}
