<?php

namespace Ibk\Paystack\Traits;

use Ibk\Paystack\Exceptions\InvalidArgumentException;
use Ibk\Paystack\Supports\Request;

trait Response
{

    public function getResponse()
    {
        if ($this->response instanceof Request) {
            return $this->response->getResponse();
        }

        Throw new InvalidArgumentException('Invalid `$response` value set');
    }

    public function asArray()
    {
        if ($this->response instanceof Request) {
            return $this->response->asArray();
        }

        Throw new InvalidArgumentException('Invalid `$response` value set');
    }

    public function asJson()
    {
        if ($this->response instanceOf Request) {
            return $this->response->asJson();
        }

        Throw new InvalidArgumentException('Invalid `$response` value set');
    }

}
