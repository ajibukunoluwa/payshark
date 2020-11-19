<?php

namespace Ibk\Paystack\Validation\Rules;

final class CustomerRule
{
    /**
     * Fields required when the create customer endpoint is called
     *
     * @return array
     */
    const CREATE_REQUIRED_FIELDS = [
        'email' => [
            'type'  => 'string'
        ]
    ];

    /**
     * Fields required when the validate customer endpoint is called
     *
     * @return array
     */
    const VALIDATE_REQUIRED_FIELDS = [
        'country' => [
            'type'  => 'string'
        ],
        'type' => [
            'type'  => 'string'
        ],
        'value' => [
            'type'  => 'string'
        ],
    ];

    /**
     * Fields required when the blacklist/whitelist customer endpoint is called
     *
     * @return array
     */
    const SET_RISK_ACTION_REQUIRED_FIELDS = [
        'customer' => [
            'type'  => 'string'
        ],
    ];

    /**
     * Fields required when the deactivate authorization endpoint is called
     *
     * @return array
     */
    const DEACTIVATE_AUTHORIZATION_REQUIRED_FIELDS = [
        'authorization_code' => [
            'type'  => 'string'
        ],
    ];

}
