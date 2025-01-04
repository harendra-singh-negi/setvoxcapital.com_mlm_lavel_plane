<?php

declare(strict_types=1);

namespace BTCPayServer\Http;

use BTCPayServer\Exception\ConnectException;
use BTCPayServer\Exception\RequestException;

interface ClientInterface
{
    /**
     * Sends the HTTP request to API server.
     *
     * @param string $method
     * @param string $url
     * @param array $headers
     * @param string $body
     *
     * @return ResponseInterface
     * @throws RequestException
     *
     * @throws ConnectException
     */
    public function request(string $method, string $url, array $headers = [], string $body = ''): ResponseInterface;
}
