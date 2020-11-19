<?php

namespace Ibk\Paystack\Validation\Rules;

final class TransactionSplitRule
{
    /**
     * Fields required when the create split endpoint is called
     *
     * @return array
     */
    const CREATE_REQUIRED_FIELDS = [
        'name' => [
            'type'  => 'string'
        ],
        'type' => [
            'type'  => 'string'
        ],
        'currency' => [
            'type'  => 'string'
        ],
        'subaccounts' => [
            'type'  => 'array'
        ],
    ];

    /**
     * Fields required when the list/search Splits endpoint is called
     *
     * @return array
     */
    const LIST_REQUIRED_FIELDS = [
        'name' => [
            'type'  => 'string'
        ],
        'active' => [
            'type'  => 'boolean'
        ]
    ];

    /**
     * Fields required when the update split endpoint is called
     *
     * @return array
     */
    const UPDATE_REQUIRED_FIELDS = [
        'name' => [
            'type'  => 'string'
        ],
        'active' => [
            'type'  => 'boolean'
        ]
    ];

    /**
     * Fields required when the add/update split subaccount endpoint is called
     *
     * @return array
     */
    const ADD_SUBACCOUNT_REQUIRED_FIELDS = [
        'subaccount' => [
            'type'  => 'string'
        ],
        'share' => [
            'type'  => 'integer'
        ]
    ];

    /**
     * Fields required when the remove split subaccount endpoint is called
     *
     * @return array
     */
    const REMOVE_SUBACCOUNT_REQUIRED_FIELDS = [
        'subaccount' => [
            'type'  => 'string'
        ]
    ];

}
