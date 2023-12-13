<?php
namespace App\Api;

use GuzzleHttp\Client;

Class ExternalApi {
    protected $client;

    public function __construct(private string $baseUri) {
        $this->newClient();
    }

    /**
     * Creates a new HTTP client instance.
     *
     * @return void
     */
    private function newClient(): void
    {
        $this->client = new Client(['base_uri' => $this->baseUri]);
    }
}