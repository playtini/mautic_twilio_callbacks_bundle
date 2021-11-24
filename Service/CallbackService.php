<?php

namespace MauticPlugin\TwilioCallbacksBundle\Service;

use MauticPlugin\TwilioCallbacksBundle\Client\UpClient;
use Psr\Log\LoggerInterface;

class CallbackService
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var UpClient
     */
    private $upClient;

    /**
     * CallbackProcessor constructor.
     *
     * @param UpClient $upClient
     * @param LoggerInterface $logger
     */
    public function __construct(UpClient $upClient, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->upClient = $upClient;
    }

    /**
     * @params string $phone
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function isSendPossible($phone)
    {
        $isSendPossible = $this->upClient->getSendPossibility($phone);

        return $isSendPossible['result'];
    }

    /**
     * @params string $phone
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFailedCallbacks($phone)
    {
        $failedCallbacks = $this->upClient->getFailedCallbacks($phone);

        return json_encode($failedCallbacks['result']);
    }
}