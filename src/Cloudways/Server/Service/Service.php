<?php
namespace Cloudways\Server\Service;

/**
 *Class to handle Mangage Server Service
 */
class Service extends \Cloudways\Server\Server
{

    /*
    *Get services for a server
    */
    public function getServices($server_id)
    {
        $url = "/service";
        $param = [
                'server_id' => $server_id
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /*
    *Manage services for a server
    */
    public function manageServices($server_id, $service, $state)
    {
        try {
            $url = "/service/state";
            $param = [
                'server_id' => $server_id,
                'service' => $service,
                'state' => $state
            ];
            $this->checkServiceAction($param);
            $response = $this->callCloudwaysAPI("post", $url, $param);
            return $response;
        } catch (\Exception $e) {
            $response = array("error" => $e->getMessage());
            return $response;
        }
    }

    /*
    *Check Service or State is exists or not before sending request to API
    */
    private function checkServiceAction($param)
    {
        $states = ['start', 'stop', 'restart'];
        $services = ['mysql', 'apache2', 'nginx', 'memcached', 'varnish', 'redis-server', 'php5-fpm','elasticsearch'];
        if (!in_array($param['state'], $states) && !in_array($param['service'], $services)) {
            throw new \Exception("Undefined service or state");
        }
    }
}
