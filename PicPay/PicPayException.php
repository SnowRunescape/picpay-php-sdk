<?php
/**
 * PicPay Integration Library
 * Access PicPay for payments integration
 *
 * @author SnowRunescape
 *
 */

class PicPayException extends Exception {
    public function __construct($message, $code = 500, Exception $previous = null) {
        // Default code 500
        parent::__construct($message, $code, $previous);
    }
}