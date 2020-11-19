<?php

namespace Ibk\Paystack\Supports;

class Reference
{

    /**
     * Generate transaction reference
     *
     * @param string $prefix Prefix reference with a value
     *
     * @return Request
     */
    public static function generateReference(
        string $prefix = "",
        int $noOfCharacters = 12,
        string $delimiter = "_"
    )
    {
        $prefix = empty($prefix) ? "" : "{$prefix}{$delimiter}";
        return "{$prefix}" . substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $noOfCharacters);
    }

}
