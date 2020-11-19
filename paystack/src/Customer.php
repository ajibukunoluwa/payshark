<?php

namespace Ibk\Paystack;

use Ibk\Paystack\Supports\Link;
use Ibk\Paystack\Abstracts\BasePaystack;
use Ibk\Paystack\Validation\Rules\CustomerRule;

class Customer extends BasePaystack
{

    /**
     * Set
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Create Customer
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $url = "/customer";

        $this->validator->validate(
            $data, CustomerRule::CREATE_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * List Customers
     *
     * @param int $page
     *
     * @return mixed
     */
    public function list(int $page = null)
    {
        $url = "/customer";

        $url .= Link::appendQueryParams([
            'page'      => $page,
            'perPage'   => $this->perPage,
        ]);

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * Fetch Customers
     * Get details of a customer on your integration.
     *
     * @param string $email_or_code
     *
     * @return mixed
     */
    public function fetch(string $email_or_code)
    {
        $url = "/customer/{$email_or_code}";

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * Update Customer
     * Update a customer's details on your integration.
     *
     * @param string $code
     *
     * @return mixed
     */
    public function update(string $code, array $data)
    {
        $url = "/customer/{$code}";

        $response = $this->request->put($url, $data);

        return $response->getResponse();
    }

    /**
     * Validate Customer
     * Validate a customer's identity
     *
     * @param string $code
     *
     * @return mixed
     */
    public function validate(string $code, array $data)
    {
        $url = "/customer/{$code}/identification";

        $this->validator->validate(
            $data, CustomerRule::VALIDATE_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * Whitelist/Blacklist Customer
     * Whitelist or blacklist a customer on your integration
     *
     * @param array $data
     *
     * @return mixed
     */
    public function setRiskAction(array $data)
    {
        $url = "/customer/set_risk_action";

        $this->validator->validate(
            $data, CustomerRule::SET_RISK_ACTION_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * Deactivate Authorization
     * Deactivate an authorization when the card needs to be forgotten
     *
     * @param array $data
     *
     * @return mixed
     */
    public function deactivateAuthorization(array $data)
    {
        $url = "/customer/deactivate_authorization";

        $this->validator->validate(
            $data, CustomerRule::DEACTIVATE_AUTHORIZATION_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }
}
