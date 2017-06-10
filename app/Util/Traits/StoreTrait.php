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
            'auth'  =>  array(env('STORE_API_USER'),env('STORE_API_PW'))
        );
        $response   =   $this->guzzle->request(env('STORE_API_URL'), 'v1/services/stores','GET',$options);

        if(is_array($response) && array_key_exists('status',$response) && $response['status'] == 'ok')
        {
            return $response['result'];
        }

        return $response['result'];
    }

    protected function saveStores($formParams)
    {
        $options    =   array(
            'auth'          =>  array(env('STORE_API_USER'),env('STORE_API_PW')),
            'form_params'   =>  $formParams
        );
        $response   =   $this->guzzle->request(env('STORE_API_URL'), 'v1/services/stores','POST',$options);

        if(is_array($response) && array_key_exists('status',$response) && $response['status'] == 'ok')
        {
            return $response['result'];
        }

        return $response['result'];
    }
}