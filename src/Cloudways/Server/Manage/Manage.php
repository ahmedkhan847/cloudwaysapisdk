<?php
namespace Cloudways\Server\Manage;

/**
*Class to handle Mangage Server
*/
class Manage extends \Cloudways\Server\Server
{
    /*
    * Take Backup of Server
    */
    public function getBackup($server_id)
    {
        $url = "/server/manage/backup";
        $param = [
                'server_id' => $server_id
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    *Manage Snapshot
    */
    public function manageSnapshot($server_id, $snapshot_frequency)
    {
        $url = "/server/manage/snapshotFrequency";
        $param = [
                'server_id' => $server_id,
                'snapshot_frequency' => $snapshot_frequency
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    * Manage Backup Settings
    */
    public function manageBackup($param)
    {
        $url = "/server/manage/backupSettings";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    * Manage Packages
    */
    public function managePackages($server_id, $package_name, $package_version)
    {
        $url = "/server/manage/backupSettings";
        $param = [
                'server_id' => $server_id,
                'package_name' => $spackage_name,
                'package_version' => $package_version
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    * Get Server Settings
    */
    public function getSettings($server_id)
    {
        $url = "/server/manage/settings";
        $param = [
                'server_id' => $server_id
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /*
    * Set Server Settings
    */
    public function setSettings($param)
    {
        $url = "/server/manage/settings";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    * Monitor Graph
    */
    public function getGraph($param)
    {
        $url = "/server/manage/monitorGraph";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    * Set Master Username
    */
    public function setMasterUsername($server_id, $username)
    {
        $url = "/server/manage/masterUsername";
        $param = [
                'server_id' => $server_id,
                'username' => $username
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    * Set Master Password
    */
    public function setMasterPassword($server_id, $password)
    {
        $url = "/server/manage/masterPassword";
        $param = [
                'server_id' => $server_id,
                'password' => $password
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
}
