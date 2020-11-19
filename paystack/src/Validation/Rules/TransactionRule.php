<?php

namespace Ibk\Paystack\Validation\Rules;

final class TransactionRule
{
    /**
     * Fields required when initialize transaction endpoint is called
     *
     * @return array
     */
    const INITIALIZE_REQUIRED_FIELDS = [
        'email' => [
            'type'  => 'string'
        ],
        'amount' => [
            'type'  => 'integer'
        ],
    ];

    /**
     * Fields required when the charge authorization endpoint is called
     *
     * @return array
     */
    const CHARGE_AUTHORIZATION_REQUIRED_FIELDS = [
        'email' => [
            'type'  => 'string'
        ],
        'amount' => [
            'type'  => 'integer'
        ],
        'authorization_code' => [
            'type'  => 'string'
        ],
    ];

    /**
     * Fields required when the check authorization endpoint is called
     *
     * @return array
     */
    const CHECK_AUTHORIZATION_REQUIRED_FIELDS = [
        'email' => [
            'type'  => 'string'
        ],
        'amount' => [
            'type'  => 'integer'
        ],
        'authorization_code' => [
            'type'  => 'string'
        ],
    ];

    /**
     * Fields required when the partial debit endpoint is called
     *
     * @return array
     */
    const PARTIAL_DEBIT_REQUIRED_FIELDS = [
        'authorization' => [
            'type'  => 'string'
        ],
        'amount' => [
            'type'  => 'integer'
        ],
        'currency' => [
            'type'  => 'string'
        ],
    ];


}
