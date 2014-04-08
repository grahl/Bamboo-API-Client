<?php

namespace Peterjmit\Bamboo\Http;

interface ClientInterface
{
    /**
     * Get an url, and return the parsed response
     *
     * @return array
     */
    public function get($url);
}
