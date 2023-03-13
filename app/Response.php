<?php

namespace Miniframework;

class Response
{
    protected $body;
    protected $headers = [];
    protected $statusCode = 200;

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body): Response
    {
        $this->body = $body;
        return $this;
    }

    public function setStatusCode(int $statusCode): Response
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function withJson($body) : Response
    {
        $this->body = json_encode($body);
        return $this;
    }


    public function getHeaders(): array
    {
        return $this->headers;
    }
    public function withHeader($name, $value): Response
    {
        $this->headers[] = [$name, $value];
        return $this;
    }
}