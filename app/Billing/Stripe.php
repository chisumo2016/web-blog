<?php
/**
 * Created by PhpStorm.
 * User: bundalla
 * Date: 2/1/2017
 * Time: 8:05 PM
 */
namespace  App\Billing;

class  Stripe
{
    protected  $key;
    public function  __construct($key)  // Accepting Api key
    {
        $this->key = $key;
    }
}