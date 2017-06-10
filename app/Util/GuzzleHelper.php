<?php
namespace App\Util;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\SeekException;
use GuzzleHttp\Exception\TransferException;
use Psy\Exception\ErrorException;

class GuzzleHelper
{
    /**
     * @param $base_url
     * @param $url
     * @param string $method
     * @param array $options
     * @return array|mixed
     */
    public function request($base_url, $url, $method = 'GET', $options = [])
    {
        $client = new Client([
            'base_uri'        => $base_url,
            'timeout'         => 300.0,
            'allow_redirects' => true
        ]);

        return $this->makeRequest($method, $url, $options, $client);
    }

    /**
     * @param $method
     * @param $url
     * @param array $options
     * @param $client
     * @return array|mixed
     */
    private function makeRequest($method, $url, $options = [], $client)
    {
        $result = array();
        try {
            $response = $this->doRequest($method , $url , $options , $client);
            Log::info('The request was successful '.$url.', GuzzleHelper on method makeRequest ' . date('l jS \of F Y h:i:s A'));

            $result = array('status' => 'ok', 'result' => $response);

        } catch (BadResponseException $e) {
            $errorResponse = $e->getResponse()->getBody()->getContents();
            $errorCode      = $e->getCode();
            $errorMessage   = $e->getMessage();
            Log::error('An error  happened at the request the method makeRequest fail '.$url.' in the process with this exception code: ' .$errorCode. ', message: ' . $errorMessage . date('l jS \of F Y h:i:s A'));

            $result = array('status' => 'error', 'result' => $this->getResponse($errorResponse));
        } catch (ConnectException $error) {
            Log::error('An error  happened at the request the method makeRequest fail '.$url.' in the process with this exception code: ' . $error->getCode() . ', message: ' . $error->getMessage() . ', at ' . date('l jS \of F Y h:i:s A'));

            $result = array('status' => 'error', 'result' => array('Code' => $error->getCode(), 'Message' => $error->getMessage()));
        }
        catch (RequestException $error) {
            Log::error('An error  happened at the request the method makeRequest fail '.$url.' in the process with this exception code: ' . $error->getCode() . ', message: ' . $error->getMessage() . ', at ' . date('l jS \of F Y h:i:s A'));

            $result = array('status' => 'error', 'result' => array('Code' => $error->getCode(), 'Message' => $error->getMessage()));
        }
        catch (SeekException $error) {
            Log::error('An error  happened at the request the method makeRequest fail '.$url.' in the process with this exception code: ' . $error->getCode() . ', message: ' . $error->getMessage() . ', at ' . date('l jS \of F Y h:i:s A'));

            $result = array('status' => 'error', 'result' => array('Code' => $error->getCode(), 'Message' => $error->getMessage()));
        }
        catch (TransferException $error) {
            Log::error('An error  happened at the request the method makeRequest fail '.$url.' in the process with this exception code: ' . $error->getCode() . ', message: ' . $error->getMessage() . ', at ' . date('l jS \of F Y h:i:s A'));

            $result = array('status' => 'error', 'result' => array('Code' => $error->getCode(), 'Message' => $error->getMessage()));
        }
        catch (\Exception $error) {
            Log::error('An error  happened at the request the method makeRequest fail '.$url.' in the process with this exception code: ' . $error->getCode() . ', message: ' . $error->getMessage() . ', at ' . date('l jS \of F Y h:i:s A'));

            $result = array('status' => 'error', 'result' => array('Code' => $error->getCode(), 'Message' => $error->getMessage()));
        }
        finally{
            return $result;
        }
    }

    /**
     * @param $method
     * @param $url
     * @param $options
     * @param $client
     * @return mixed
     */
    private function doRequest($method , $url , $options , $client)
    {
        $response = $client->request($method , $url , $options);


        $response = $response->getBody()->getContents();


        return $this->getResponse($response);
    }

    /**
     * @param $response
     * @return mixed
     */
    private function getResponse($response)
    {
        if(!is_null(json_decode($response))){
            return json_decode($response);
        }
        else if($this->isValidXml($response) == true && $this->isHTML($response) !== false){
            return simplexml_load_string($response);
        }
        return $response;
    }
    /**
     * @param $xml
     * @return bool
     */
    private function isValidXml($xml)
    {
        libxml_use_internal_errors(true);

        $doc = new \DOMDocument('1.0', 'utf-8');
        try
        {
            if (!is_string($xml)){
                $doc->loadXML($xml);
            }

        }
        catch (ErrorException $errorException)
        {
            Log::error('THe reponse  from the request is not a xml');

            return false;
        }

        $errors = libxml_get_errors();

        if(empty($errors)){
            return true;
        }

        $error = $errors[0];
        if($error->level < 3){
            return true;
        }

        return false;
    }

    private function isHTML($html)
    {
        $doc = new \DOMDocument('1.0', 'utf-8');
        if ($doc->loadHTML($html) == true){
            return true;
        }

        return false;
    }

}