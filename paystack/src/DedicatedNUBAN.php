<?php

namespace Ibk\Paystack;

use Ibk\Paystack\Supports\Link;
use Ibk\Paystack\Abstracts\BasePaystack;
use Ibk\Paystack\Validation\Rules\DedicatedNUBANRule;

class DedicatedNUBAN extends BasePaystack
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
     * Create DedicatedNUBAN
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $url = "/dedicated_account";

        $this->validator->validate(
            $data, DedicatedNUBANRule::CREATE_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * List Dedicated Accounts
     * List dedicated accounts available on your integration
     *
     * @param array $data
     *
     * @return mixed
     */
    public function list(array $data, int $page = null)
    {
        $url = "/dedicated_account";

        $url .= Link::appendQueryParams(array_merge([
            'page'      => $page,
            'perPage'   => $this->perPage,
        ], $data));

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * List Dedicated Accounts
     * Get details of a dedicated account on your integration.
     *
     * @param int $dedicated_account_id
     *
     * @return mixed
     */
    public function fetch(int $dedicated_account_id)
    {
        $url = "/dedicated_account/{$dedicated_account_id}";

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * Deactivate Dedicated Account
     * Deactivate a dedicated account on your integration.
     *
     * @param int $dedicated_account_id
     *
     * @return mixed
     */
    public function deactivate(int $dedicated_account_id)
    {
        $url = "/dedicated_account/{$dedicated_account_id}";

        $response = $this->request->delete($url);

        return $response->getResponse();
    }

}
