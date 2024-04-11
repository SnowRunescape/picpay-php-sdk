<?php

namespace PicPay;

class PicPay
{
    const VERSION = '1.0.0';

    private $x_picpay_token;
    private $x_seller_token;

    public function __construct()
    {
        $i = func_num_args();

        if ($i != 2) {
            throw new PicPayException('Invalid arguments. Use X-PICPAY-TOKEN and X-SELLER-TOKEN');
        }

        $this->x_picpay_token = func_get_arg(0);
        $this->x_seller_token = func_get_arg(1);
    }

    /**
     * Create a checkout preference
     * @param array $preference
     * @return array(json)
     */
    public function create_preference($preference)
    {
        return PicPayRestClient::post([
            'uri' => '/payments',
            'headers' => [
                'x-picpay-token' => $this->x_picpay_token
            ],
            'data' => $preference
        ]);
    }

    /**
     * Get a checkout preference
     * @param string $id
     * @return array(json)
     */
    public function get_preference($id)
    {
        return PicPayRestClient::get([
            'uri' => "/payments/{$id}/status",
            'headers' => [
                'x-picpay-token' => $this->x_picpay_token
            ]
        ]);
    }
}
