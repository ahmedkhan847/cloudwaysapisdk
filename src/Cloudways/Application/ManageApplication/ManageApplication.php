<?php
namespace Cloudways\Application\ManageApplication;

use GuzzleHttp\Exception\RequestException;

/**
 *
 */
class ManageApplication extends \Cloudways\Application\Application
{
    /**
    * Add a new cname
    */
    public function addCname($server_id, $app_id, $cname)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'cname' => $cname
            ];
        $url = "/app/manage/cname";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Delete a cname
    */
    public function deleteCname($server_id, $app_id)
    {
        $url = "/app/manage/cname";
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $response = $this->callCloudwaysAPI("delete", $url, $param);
        return $response;
    }

    /**
    * Restore application
    */
    public function restoreApplication($server_id, $app_id, $time)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'time' => $time
            ];
        $url = "/app/manage/restore";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Rollback application
    */
    public function rollbackApplication($server_id, $app_id)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $url = "/app/manage/rollback";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Delete application backup
    */
    public function deleteBackup($server_id, $app_id)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $url = "/app/manage/backup";
        $response = $this->callCloudwaysAPI("delete", $url, $param);
        return $response;
    }

    /**
    * Get Backups
    */
    public function getBackup($server_id, $app_id)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $url = "/app/manage/backup";
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /**
    * Update Aliases
    */
    public function updateAliases($server_id, $app_id, array $aliases)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'aliases' => $aliases
            ];
        $url = "/app/manage/aliases";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Get Cron Lists
    */
    public function getCronList($server_id, $app_id)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $url = "/app/manage/cronList";
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /**
    * Create Cron Lists
    */
    public function createCronList($param)
    {
        $url = "/app/manage/cronList";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Update Database password
    */
    public function updateDbPassword($server_id, $app_id, $password)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'password' => $password
            ];
        $url = "/app/manage/dbPassword";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Update Application Symlink
    */
    public function updateSymlink($server_id, $app_id, $symlink)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'symlink' => $symlink
            ];
        $url = "/app/manage/symlink";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Update Application Webroot
    */
    public function setWebroot($server_id, $app_id, $webroot)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'webroot' => $webroot
            ];
        $url = "/app/manage/webroot";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Reset file permissions
    */
    public function resetPermissions($server_id, $app_id)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $url = "/app/manage/reset_permissions";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Get current FPM settings
    */
    public function getFpmSetting($server_id, $app_id)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $url = "/app/manage/fpm_setting";
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /**
    * Set new FPM settings
    */
    public function setFpmSetting($server_id, $app_id, $fpm_setting)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'fpm_setting' => $fpm_setting
            ];
        $url = "/app/manage/fpm_setting";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Get all Varnish settings
    */
    public function getVarnishSetting($server_id, $app_id)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id
            ];
        $url = "/app/manage/varnish_setting";
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /**
    * Set new Varnish settings
    */
    public function setVarnishSetting($server_id, $app_id, array $vcl_list)
    {
        $param = [
                'server_id' => $server_id,
                'app_id' => $app_id,
                'vcl_list' => $vcl_list
            ];
        $url = "/app/manage/varnish_setting";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
}
