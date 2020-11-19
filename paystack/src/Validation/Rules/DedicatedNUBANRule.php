<?php

namespace Ibk\Paystack\Validation\Rules;

final class DedicatedNUBANRule
{
    /**
     * Fields required when the create Dedicated NUBAN endpoint is called
     *
     * @return array
     */
    const CREATE_REQUIRED_FIELDS = [
        'customer' => [
            'type'  => 'string'
        ]
    ];

}
