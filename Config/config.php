<?php

return [
    'name'        => 'Twilio callbacks bundle',
    'description' => 'Get twilio callbacks',
    'version'     => '1.0',
    'author'      => 'Alexander Plitka',
    'routes'   => [
        'main' => [
            'mautic_contact_action' => [
                'path'       => '/contacts/view/{objectId}',
                'controller' => 'TwilioCallbacksBundle:LeadView:view',
            ],
            'mautic_sms_callbacks_action' => [
                'path'       => '/contacts/sma-callbacks/view/{objectId}',
                'controller' => 'TwilioCallbacksBundle:LeadView:viewCallbacks',
            ],
        ]
    ],
    'services' => [
        'other' => [
            'mautic.plugin.twilio_callbacks.client.up_client' => [
                'class' => \MauticPlugin\TwilioCallbacksBundle\Client\UpClient::class,
                'arguments' => [
                    'mautic_integration.pipedrive.guzzle.client'
                ]
            ],
            'mautic.plugin.twilio_callbacks.service.callback_service' => [
                'class' => \MauticPlugin\TwilioCallbacksBundle\Service\CallbackService::class,
                'arguments' => [
                    'mautic.plugin.twilio_callbacks.client.up_client',
                    'monolog.logger.mautic'
                ]
            ]
        ]
    ]
];