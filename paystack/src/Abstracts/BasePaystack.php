<?php

namespace Ibk\Paystack\Abstracts;

use Ibk\Paystack\Traits\Response;
use Ibk\Paystack\Supports\Request;
use Ibk\Paystack\Validation\Validator;

abstract class BasePaystack
{
    use Response;

    /**
     * Instance of Request
     *
     * @var Request
     */
    protected $request;

    /**
     * API response
     *
     * @var object
     */
    protected $response;

    /**
     * Input Validator
     *
     * @var validator
     */
    protected $validator;

    /**
     * Set total number of data to retrieve per page
     *
     * @var string
     */
    protected $perPage;

    /**
     * Set headers for request
     *
     * @var array
     */
    protected $headers;

    /**
     * Create instance of Paystack
     *
     * @return void
     */
    public function __construct()
    {
        $this->request      = new Request(config('paystack.api_url'));
        $this->validator    = new Validator();

        $this->setHeaders();
    }

    /**
     * Set per page value
     *
     * @return Transaction
     */
    public function perPage(int $perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }


    /**
     * Set headers
     *
     * @return object
     */
    protected function setHeaders()
    {
        $this->request->setHeaders([
            'Authorization' => "Bearer " . config('paystack.secret_key')
        ]);
    }
}
