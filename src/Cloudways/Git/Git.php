<?php
namespace Cloudways\Git;

/**
*
*/
class Git extends \Cloudways\Base
{
    
    /**
    * Generate SSH Key for Git
    */
    public function generateKey($server_id, $app_id)
    {
        $url = "/git/generateKey";
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /**
    * Return SSH Key
    */
    public function getKey($server_id, $app_id)
    {
        $url = "/git/key";
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }
    
    /**
    * Get Git Branches
    */
    public function getBranches($server_id, $app_id, $git_url)
    {
        $url = "/git/branchNames";
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'git_url' => $git_url
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }
    
    /**
    * Clone Git Repository
    */
    public function gitClone($param)
    {
        $url = "/git/clone";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /**
    * Pull Repo
    */
    public function gitPull($param)
    {
        $url = "/git/pull";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /**
    * Git History
    */
    public function gitHistory($server_id, $app_id)
    {
        $url = "/git/history";
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }
}
