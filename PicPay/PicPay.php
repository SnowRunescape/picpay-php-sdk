<?php
/**
 * PicPay Integration Library
 * Access PicPay for payments integration
 *
 * @author SnowRunescape
 *
 */

require_once 'PicPayException.php';
require_once 'PicPayRestClient.php';

class PicPay {
	const version = '1.0.0';
	
	private $x_picpay_token;
	private $x_seller_token;

    function __construct(){
        $i = func_num_args();

        if($i != 2){
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
    public function create_preference($preference){
        $request = [
            'uri' => '/payments',
			'headers' => [
				'x-picpay-token' => $this->x_picpay_token
			],
            'data' => $preference
        ];

        $preference_result = PicPayRestClient::post($request);
		
        return $preference_result;
    }
	
    /**
     * Get a checkout preference
     * @param string $id
     * @return array(json)
     */
    public function get_preference($id){
        $request = [
            'uri' => "/payments/{$id}/status",
			'headers' => [
				'x-picpay-token' => $this->x_picpay_token
			]
        ];

        $preference_result = PicPayRestClient::get($request);
		
        return $preference_result;
    }
}