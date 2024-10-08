<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class BaseTestCase extends TestCase
{
    use RefreshDatabase;

    protected array $headers = [
        'Accept' => 'application/json',
    ];

    protected string $uri;

    protected TestResponse $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'DatabaseSeeder']);
    }

    protected function givenIHaveThisRoute(string $route): void
    {
        $this->uri = $route;
    }

    protected function whenICallThisEndpoint(string $method, string $uri, array $data = [], array $headers = []): void
    {
        $this->response = $this->json(
            method: $method,
            uri: $uri,
            data: $data,
            headers: $headers,
        );
    }

    protected function thenIExpectAResponse(int $code): void
    {
        $this->response->assertStatus($code);
    }
}
