<?php

namespace UHack\Pronto\Repositories;

use GuzzleHttp\Client as GuzzleClient;

class UnionBankAPI
{
    protected $baseUrl = 'https://api-uat.unionbankph.com/partners/';

    protected $client;

    protected $clientId;

    protected $clientSecret;

    protected $redirectUrl;

    public function __construct($config = [])
    {
        $this->clientId = $config['client_id'] ?? null;
        $this->clientSecret = $config['client_secret'] ?? null;
        $this->redirectUrl = $config['redirect_url'] ?? null;

        $this->client = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'client_id' => $this->clientId
        ]);
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function getHttpClient()
    {
        return $this->client;
    }

    /**
     * Return Authorization URL for generating access token
     *
     * @param string $scope
     * @param string $responseType = 'code'|'token'
     *
     * @return string
     */
    public function authorizeUrl($scope = 'payments', $responseType = 'code')
    {
        $queryParams = http_build_query([
            'client_id' => $this->getClientId(),
            'scope' => $scope,
            'response_type' => $responseType,
            'redirect_url' => $this->getRedirectUrl(),
        ]);

        return "{$this->baseUrl}sb/convergent/v1/oauth2/authorize?{$queryParams}";
    }

}