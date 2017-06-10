<?php
/**
 * Created by PhpStorm.
 * User: aespinoza
 * Date: 6/9/17
 * Time: 4:05 PM
 */

namespace App\Util\Traits;


trait StoreTrait
{
    protected function getStores()
    {
        $options    =   array(
            'auth'  =>  array('my_user','my_password')
        );
        $response   =   $this->guzzle->request(env('STORE_API_URL'), 'v1/services/stores','GET',$options);

        if(is_array($response) && array_key_exists('status',$response) && $response['status'] == 'ok')
        {
            return $response['result'];
        }

        return $response['result'];
    }
}