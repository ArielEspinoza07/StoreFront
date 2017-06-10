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

    protected function showStore($id)
    {
        $options    =   array(
            'auth'  =>  array(env('STORE_API_USER'),env('STORE_API_PW'))
        );
        $response   =   $this->guzzle->request(env('STORE_API_URL'), 'v1/services/stores/'.$id,'GET',$options);

        if(is_array($response) && array_key_exists('status',$response) && $response['status'] == 'ok')
        {
            return $response['result'];
        }

        return $response['result'];
    }

    protected function showStoreArticles($id)
    {
        $options    =   array(
            'auth'  =>  array(env('STORE_API_USER'),env('STORE_API_PW'))
        );
        $response   =   $this->guzzle->request(env('STORE_API_URL'), 'v1/services/stores/'.$id.'/articles','GET',$options);

        if(is_array($response) && array_key_exists('status',$response) && $response['status'] == 'ok')
        {
            return $response['result']->store;
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

    protected function updateStores($id,$formParams)
    {
        $options    =   array(
            'auth'          =>  array(env('STORE_API_USER'),env('STORE_API_PW')),
            'form_params'   =>  $formParams
        );
        $response   =   $this->guzzle->request(env('STORE_API_URL'), 'v1/services/stores/'.$id,'PUT',$options);

        if(is_array($response) && array_key_exists('status',$response) && $response['status'] == 'ok')
        {
            return $response['result'];
        }

        return $response['result'];
    }

    protected function deleteStore($id)
    {
        $options    =   array(
            'auth'  =>  array(env('STORE_API_USER'),env('STORE_API_PW'))
        );
        $response   =   $this->guzzle->request(env('STORE_API_URL'), 'v1/services/stores/'.$id,'DELETE',$options);

        if(is_array($response) && array_key_exists('status',$response) && $response['status'] == 'ok')
        {
            return $response['result'];
        }

        return $response['result'];
    }
}