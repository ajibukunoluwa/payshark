<?php

namespace Ibk\Paystack;

use Ibk\Paystack\Supports\Link;
use Ibk\Paystack\Abstracts\BasePaystack;
use Ibk\Paystack\Validation\Rules\TransactionSplitRule;

class TransactionSplit extends BasePaystack
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
     * Create Split
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $url = "/split";

        $this->validator->validate(
            $data, TransactionSplitRule::CREATE_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * List/Search Splits
     *
     * @param array $data
     *
     * @return mixed
     */
    public function list(array $data)
    {
        $url = "/split";

        $this->validator->validate(
            $data, TransactionSplitRule::LIST_REQUIRED_FIELDS
        );

        $url .= Link::appendQueryParams($data);
        $response = $this->request->get($url);

        return $response->getResponse();
    }

    /**
     * Fetch Splits
     *
     * @param int $id
     *
     * @return mixed
     */
    public function fetch(int $id)
    {
        $url = "/split/{$id}";

        $response = $this->request->get($url);

        return $response->getResponse();
    }


    /**
     * Update Split
     *
     * @param array $data
     *
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        $url = "/split/{$id}";

        $this->validator->validate(
            $data, TransactionSplitRule::UPDATE_REQUIRED_FIELDS
        );

        $response = $this->request->put($url, $data);

        return $response->getResponse();
    }

    /**
     * Add/Update Split Subaccount
     *
     * @param array $data
     *
     * @return mixed
     */
    public function addSubaccount(int $id, array $data)
    {
        $url = "/split/{$id}/subaccount/add";

        $this->validator->validate(
            $data, TransactionSplitRule::ADD_SUBACCOUNT_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

    /**
     * Remove Subaccount from Split
     *
     * @param array $data
     *
     * @return mixed
     */
    public function removeSubaccount(int $id, array $data)
    {
        $url = "/split/{$id}/subaccount/remove";

        $this->validator->validate(
            $data, TransactionSplitRule::REMOVE_SUBACCOUNT_REQUIRED_FIELDS
        );

        $response = $this->request->post($url, $data);

        return $response->getResponse();
    }

}
