<?php
namespace Cloudways;

/**
* Class which will handle API request and response
*/
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class Base
{
    protected $email;
    protected $apikey;
    const API_URL = "https://api.cloudways.com/api/v1";
    protected $accessToken = null;
    protected $client;
    public function __construct()
    {
        
        if (isset($_ENV['CW_EMAIL']) && isset($_ENV['CW_API_KEY'])) {
            $this->email = $_ENV['CW_EMAIL'];
            $this->apikey = $_ENV['CW_API_KEY'];
        }
        $this->client = new \GuzzleHttp\Client();
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }
    
    public function setKey($value)
    {
        $this->apikey = $value;
    }
    /*
    * Validating params before sending request to API
    */
    protected function validations($post = null)
    {
        $errors = [];
        if (empty($this->apikey)) {
            $errors['key'] = "missing api key";
        }
        if (empty($this->email)) {
            $errors['email'] = "missing email";
        }
        if (!empty($post)) {
            if (isset($post['server_id'])) {
                if (filter_var($post['server_id'], FILTER_VALIDATE_INT) == false) {
                    $errors['server_id'] = "server id must be an integer";
                }
            }
            if (isset($post['destination_server_id'])) {
                if (filter_var($post['destination_server_id'], FILTER_VALIDATE_INT) == false) {
                    $errors['destination_server_id'] = "Destination server id must be an integer";
                }
            }
            if (isset($post['source_server_id'])) {
                if (filter_var($post['source_server_id'], FILTER_VALIDATE_INT) == false) {
                    $errors['source_server_id'] = "Source server id must be an integer";
                }
            }
            if (isset($post['app_id'])) {
                if (filter_var($post['app_id'], FILTER_VALIDATE_INT) == false) {
                    $errors['app_id'] = "app id must be an integer";
                }
            }
            if (isset($post['operationid'])) {
                if (filter_var($post['operationid'], FILTER_VALIDATE_INT) == false) {
                    $errors['operation_id'] = "operation id must be an integer";
                }
            }
            if (isset($post['projectid'])) {
                if (filter_var($post['projectid'], FILTER_VALIDATE_INT) == false) {
                    $errors['project_id'] = "project id must be an integer";
                }
            }
            if (isset($post['lastid'])) {
                if (filter_var($post['lastid'], FILTER_VALIDATE_INT) == false) {
                    $errors['last_id'] = "Alert last id must be an integer";
                }
            }
            if (isset($post['alertid'])) {
                if (filter_var($post['alertid'], FILTER_VALIDATE_INT) == false) {
                    $errors['alert_id'] = "Alert id must be an integer";
                }
            }
            if (isset($post['channel_id'])) {
                if (filter_var($post['channel_id'], FILTER_VALIDATE_INT) == false) {
                    $errors['channel_id'] = "Alert id must be an integer";
                }
            }
        }
        if (!empty($errors)) {
            $error = array("errors"=>$errors);
            throw new \Exception(json_encode($error));
        }
    }
    /*
    * Prepare Access Token
    */
    protected function prepareAccessToken()
    {
        try {
            $url = self::API_URL ."/oauth/access_token";
            $value = ['email' => $this->email,
                      'api_key' => $this->apikey
                     ];
            $response = $this->client->post($url, ['query' => $value]);
            $result = json_decode($response->getBody()->getContents());
            $this->accessToken = $result->access_token;
        } catch (RequestException $e) {
            $response = $this->statusCodeHandling($e);
            return $response;
        }
    }
    /*
    * Send request to Cloudways API
    */
    public function callCloudwaysAPI($method, $request, $post = [])
    {
        try {
            $this->validations($post);
            if ($this->accessToken == null) {
                $this->prepareAccessToken();
            }
            $url = self::API_URL . $request;
            $header = array('Authorization'=>'Bearer ' . $this->accessToken);
            $response = $this->client->request($method, $url, array('query' => $post,'headers' => $header));
            return json_decode($response->getBody()->getContents());
        } catch (RequestException $e) {
            $response = $this->StatusCodeHandling($e);
            if ($response == "token") {
                $this->accessToken = null;
                $this->callCloudwaysAPI($method, $request, $post);
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            $response = json_decode($e->getMessage());
            return $response;
        }
    }
    /*
    * Get Operation Complete Status
    */
    public function getOperationResult($operationid, $wait = 0)
    {
        try {
            $completed = 0;
            while ($completed == 0) {
                sleep($wait);
                $response = $this->getOperation($operationid);
                $completed = $response->operation->is_completed;
            }
            return true;
        } catch (RequestException $e) {
            $response = $this->statusCodeHandling($e);
            return $response;
        } catch (\Exception $e) {
            $response = json_decode($e->getMessage());
            return $response;
        }
    }
    
    /*
    *	Get Operation Status
    */

    public function getOperation($operationid)
    {
        try {
            $this->validations(array('operationid' => $operationid));
            $url = "/operation/$operationid";
            $response = $this->callCloudwaysAPI("get", $url);
            return $response;
        } catch (\Exception $e) {
            $response = json_decode($e->getMessage());
            return $response;
        }
    }
    /*
    *	Status code error handling
    */
    protected function statusCodeHandling($e)
    {
        if ($e->getResponse()->getStatusCode() == '400') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '422') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '500') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '401') {
            $response = "token";
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '403') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } else {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
    }
}
