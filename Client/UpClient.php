<?php

namespace MauticPlugin\TwilioCallbacksBundle\Client;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UpClient.
 */
class UpClient
{
    const CLIENT_URL = 'https://sms-api-gateway.n0d.dev';

    /**
     * @var Client
     */
    private $client;

    /**
     * UpClient constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string phone
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSendPossibility($phone)
    {
        $response = $this->client->get(self::CLIENT_URL . '/sms/send-possibility/' . $phone);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            return [];
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string phone
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFailedCallbacks($phone)
    {
        $response = $this->client->get(self::CLIENT_URL . '/sms/failed-callbacks/' . $phone);

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            return [];
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}