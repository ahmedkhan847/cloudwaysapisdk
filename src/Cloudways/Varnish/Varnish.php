<?php
namespace Cloudways\Varnish;

/**
* Class to handle Varnish
*/
class Varnish extends \Cloudways\Base
{
    /*
    * Change status of Varnish for a server
    */
    public function serverVarnish($serverid, $action)
    {
        try {
            $url = "/service/varnish";
            $this->checkVarnishAction($action);
            $param = [
                'server_id' => $serverid,
                'action' => $action
            ];
            $response = $this->callCloudwaysAPI("post", $url, $param);
            return $response;
        } catch (\Exception $e) {
            $response = array("error" => $e->getMessage());
            return $response;
        }
    }
    
    /*
    * Change status of Varnish for specific application
    */
    public function applicationVarnish($serverid, $appid, $action)
    {
        try {
            $url = "/service/appVarnish";
            $this->checkVarnishAction($action);
            $param = [
                'server_id' => $serverid,
                'app_id' => $appid,
                'action' => $action
            ];
            $response = $this->callCloudwaysAPI("post", $url, $param);
            return $response;
        } catch (\Exception $e) {
            $response = array("error" => $e->getMessage());
            return $response;
        }
    }
    
    /*
    * Get status of Varnish for application
    */
    public function applicationVarnishStatus($serverid, $appid)
    {
        $url = "/service/appVarnish";
        $param = [
                'server_id' => $serverid,
                'app_id' => $appid
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }
    
    private function checkVarnishAction($action)
    {
        $actions = ['enable', 'disable', 'purge'];
        if (in_array($action, $actions)) {
            return true;
        } else {
            throw new \Exception("Varnish action not found");
        }
    }
}
