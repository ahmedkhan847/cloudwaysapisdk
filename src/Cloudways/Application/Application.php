<?php
namespace Cloudways\Application;

/**
 *
 */
class Application extends \Cloudways\Base
{
    /**
    * Add a new application
    */
    public function addApplication($param)
    {
        $url = "/app";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Clone an application
    */
    public function cloneApplication($server_id, $app_id, $app_label)
    {
        $url = "/app/clone";
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'app_label' => $app_label
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Clone application to other server
    */
    public function cloneToOtherServer($param)
    {
        $url = "/app/cloneToOtherServer";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Delete application
    */
    public function deleteApplication($app_id)
    {
        try {
            $this->validations(['app_id' => $app_id]);
            $url = "/app/".$app_id;
            $response = $this->callCloudwaysAPI("delete", $url, $param);
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }

    /**
    * Update application
    */
    public function updateApplication($app_id, $server_id, $label)
    {
        try {
            $this->validations(['app_id' => $app_id]);
            $url = "/app/".$app_id;
            $param = [
                'server_id' => $server_id,
                'label' => $label
            ];
            $response = $this->callCloudwaysAPI("put", $url, $param);
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }
}
