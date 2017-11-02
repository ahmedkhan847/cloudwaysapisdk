<?php
namespace Cloudways\Server;

/**
*Class to handle Server Requests
*/
class Server extends \Cloudways\Base
{
    /*
    *Get All Servers
    */
    public function getServers()
    {
        $url = "/server";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }
    
    /*
    *Create a New Server
    */
    public function createServer($param)
    {
        $url = "/server";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Clone Server
    */
    public function cloneServer($param)
    {
        $url = "/server/cloneServer";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Start a stop server
    */
    public function startServer($server_id)
    {
        $url = "/server/start";
        $param = ['server_id' => $server_id];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Stop a server
    */
    public function stopServer($server_id)
    {
        $url = "/server/stop";
        $param = ['server_id' => $server_id];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Restart a server
    */
    public function restartServer($server_id)
    {
        $url = "/server/restart";
        $param = ['server_id' => $server_id];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Delete a server
    */
    public function deleteServer($server_id)
    {
        try {
            $this->validations(['server_id' => $server_id]);
            $url = "/server/".$server_id;
            $response = $this->callCloudwaysAPI("delete", $url);
            return $response;
        } catch (\Exception $e) {
            $response = json_decode($e->getMessage());
            return $response;
        }
    }
    
    /*
    *Scale Server Instance
    */
    public function scaleServer($server_id, $instance_type)
    {
        $param = [
                'server_id' => $server_id,
                'instance_type' => $instance_type
            ];
        $url = "/server/scaleServer";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Scale Server Volume
    */
    public function scaleVolume($server_id, $volume_type = "data", $volume_size)
    {
        $param = [
                'server_id' => $server_id,
                'volume_type' => $volume_type,
                'volume_size' => $volume_size
            ];
        $url = "/server/scaleVolume";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Scale Server Volume
    */
    public function scaleResources($param)
    {
        $url = "/server/scaleResources";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Set Server AutoScale
    */
    public function setServerAutoscale($param)
    {
        $url = "/server/autoScalePolicy";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /*
    *Get Server Disk Usage
    */
    public function getDiskUsage($server_id)
    {
        try {
            $this->validations(['server_id' => $server_id]);
            $url = "/server/".$server_id."/diskUsage";
            $response = $this->callCloudwaysAPI("get", $url);
            return $response;
        } catch (\Exception $e) {
            $response = json_decode($e->getMessage());
            return $response;
        }
    }
    
    /*
    *Update Sever Name
    */
    public function updateServer($server_id, $label)
    {
        try {
            $this->validations(['server_id' => $server_id]);
            $url = "/server/$server_id";
            $param = [
            'label' => $label
            ];
            $response = $this->callCloudwaysAPI("put", $url, $param);
            return $response;
        } catch (\Exception $e) {
            $response = json_decode($e->getMessage());
            return $response;
        }
    }
}
