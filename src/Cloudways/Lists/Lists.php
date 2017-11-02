<?php
namespace Cloudways\Lists;

class Lists extends \Cloudways\Base
{

    /*
    * Get All Providers
    */
    public function getCloudProviders()
    {
        $url =  "/providers";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get All Regions
    */
    public function getServerRegions()
    {
        $url =  "/regions";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get All Servers Sizes
    */
    public function getServerSizes()
    {
        $url =  "/server_sizes";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get All Applications
    */
    public function getApps()
    {
        $url =  "/apps";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get All Packages
    */
    public function getPackages()
    {
        $url =  "/packages";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get All Settings
    */
    public function getSettings()
    {
        $url =  "/settings";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get Backup Frequency
    */
    public function getBackupFrequencies()
    {
        $url =  "/backup-frequencies";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get Countries
    */
    public function getCountries()
    {
        $url =  "/countries";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get Monitor Durations
    */
    public function getMonitorDurations()
    {
        $url =  "/monitor_durations";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }

    /*
    * Get Monitor Targets
    */
    public function getMonitorTargets()
    {
        $url =  "/monitor_targets";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }
}
