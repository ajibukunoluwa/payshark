<?php

namespace Ibk\Paystack;

use Ibk\Paystack\Supports\Link;
use Ibk\Paystack\Supports\Reference;
use Ibk\Paystack\Abstracts\BasePaystack;
use Ibk\Paystack\Validation\Rules\TransactionRule;

class Transaction extends BasePaystack
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
     * Initiate a Paystack transaction
     *
     * @param array $data
     *
     * @return Transaction
     */
    public function initialize(array $data) : Transaction
    {
        $url = "/transaction/initialize";

        $this->validator->validate(
            $data, TransactionRule::INITIALIZE_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        $this->response = $response;

        return $this;
    }

    /**
     * Verify a Paystack transaction
     *
     * Confirm the status of a transaction
     *
     * @param string $reference
     *
     * @return array
     */
    public function verify(string $reference)
    {
        $url = "/transaction/verify/{$reference}";

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * List Paystack transactions
     *
     * @param   int     $page     Specify exactly what page you want to retrieve.
     *
     * @return  array
     */
    public function list(int $page = null)
    {
        $url = "/transaction";

        $url .= Link::appendQueryParams([
            'page'      => $page,
            'perPage'   => $this->perPage,
        ]);

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * Fetch transaction by ID
     *
     * Get details of a transaction.
     *
     * @param int $transactionId
     *
     * @return array
     */
    public function fetch(int $transactionId)
    {
        $url = "/transaction/{$transactionId}";

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * Charge authorization
     *
     * All authorizations marked as reusable
     * can be charged with this
     *
     * @param array $data
     *
     * @return array
     */
    public function chargeAuthorization(array $data)
    {
        $url = "/transaction/charge_authorization";

        $this->validator->validate(
            $data, TransactionRule::CHARGE_AUTHORIZATION_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * Check authorization
     *
     * All mastercard and visa authorizations can be checked
     * with this endpoint to know if they have funds
     * for the payment you seek.
     *
     * @param array $data
     *
     * @return array
     */
    public function checkAuthorization(array $data)
    {
        $url = "/transaction/check_authorization";

        $this->validator->validate(
            $data, TransactionRule::CHECK_AUTHORIZATION_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * Transaction Timeline
     *
     * View the timeline of a transaction
     *
     * @param int|string $transactionId
     *
     * @return array
     */
    public function timeline($transactionIdOrReference)
    {
        $url = "/transaction/{$transactionIdOrReference}";

        $response = $this->request->get($url);

        return $response->getResponse();
    }


    /**
     * List Paystack transactions
     *
     * @param   int     $page     Specify exactly what page you want to retrieve.
     *
     * @return  array
     */
    public function totals(int $page = null)
    {
        $url = "/transaction/totals";

        $url .= Link::appendQueryParams([
            'page'      => $page,
            'perPage'   => $this->perPage,
        ]);

        $response = $this->request->get($url);

        return $response->getResponse();
    }


    /**
     * Transaction Timeline
     *
     * View the timeline of a transaction
     *
     * @param int|string $transactionId
     *
     * @return array
     */
    public function export(int $page = null)
    {
        $url = "/transaction/export";

        $url .= Link::appendQueryParams([
            'page'      => $page,
            'perPage'   => $this->perPage,
        ]);

        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * Partial Debit
     *
     * Retrieve part of a payment from a customer
     *
     * @param array $data
     *
     * @return array
     */
    public function partialDebit(array $data)
    {
        $url = "/transaction/partial_debit";

        $this->validator->validate(
            $data, TransactionRule::PARTIAL_DEBIT_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * Generate transaction reference
     *
     * @return string
     */
    public function generateReference(
        string $prefix = "",
        int $noOfCharacters = 12,
        string $delimiter = "_"
    )
    {
        return Reference::generateReference($prefix, $noOfCharacters, $delimiter);
    }

    /**
     * Redirect to the `authorization_url`
     *
     */
    public function doRedirect()
    {
        $response        = $this->response->asJson()->getResponse();
        $responseToArray = json_decode($response, true);

        if ($responseToArray['status']) {
            $url = $responseToArray['data']['authorization_url'];

            return redirect()->away($url);
        } else {
            Throw new \Exception('An error occurred, could not get authorization url. ' . $response);
        }

    }

}
