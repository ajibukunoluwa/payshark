<?php

namespace Ibk\Paystack\Supports;

class Link
{

    /**
     * Add query params to the URL passed
     *
     * @param string $url
     *
     * @return Request
     */
    public static function appendQueryParams(array $queryParams) : string
    {
        $url = "";

        if ( ! empty(array_filter($queryParams))) {
           $url = "?" . http_build_query(array_map("self::booleansToString", $queryParams));
        }

        return $url;
    }

    /**
     * Convert booleans to real true and false strings
     * in PHP http_build_query
     *
     * @param $value
     *
     * @return string
     */
    public static function booleansToString ($value)
    {
        if ($value === true) return 'true';    // strict comparison with === is necessary
        if ($value === false) return 'false';
        return $value;
    }

}
