<?php
namespace Cloudways\CloudwaysBot;

/**
 *
 */
class CloudwaysBot extends \Cloudways\Base
{
    /**
    * Get All Alerts
    */
    public function getAlerts($last_id = null)
    {
        try {
            $url = "/alerts/";
            $response = null;
            
            if (!empty($last_id)) {
                $this->validations(['lastid' => $last_id]);
                $url .= $last_id;
                $response = $this->callCloudwaysAPI("get", $url);
            } else {
                $response = $this->callCloudwaysAPI("get", $url);
            }
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }

    /**
    * Mark an Alert read
    */
    public function markReadAlerts($alert_id)
    {
        try {
            $this->validations(['alertid' => $alert_id]);
            $url = "/alert/markAsRead/".$alert_id;
            $response = $this->callCloudwaysAPI("post", $url);
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }

    /**
    * Get all the integrations which can be created
    */
    public function getCreateIntegrations()
    {
        $url = "/integrations/create";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /**
    * Get all created integrations
    */
    public function getIntegrations()
    {
        $url = "/integrations";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /**
    * Create an integrations
    */
    public function createIntegrations($param)
    {
        $url = "/integrations";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Delete an integration
    */
    public function deleteIntegrations($channel_id)
    {
        try {
            $this->validations(['channel_id' => $channel_id]);
            $url = "/integrations/".$channel_id;
            $response = $this->callCloudwaysAPI("delete", $url);
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }

    /**
    * Update an integration
    */
    public function updateIntegrations($param)
    {
        try {
            $url = "/integrations/".$param['channel_id'];
            $response = $this->callCloudwaysAPI("put", $url, $param);
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }
}
