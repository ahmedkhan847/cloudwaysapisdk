<?php
namespace Cloudways\Security;

/*
* Manage Server Security
*/
class Security extends \Cloudways\Base
{
    /**
    * Get CSR Certificate
    */
    public function getCsr($server_id, $app_id)
    {
        $url = "/security/csr";
        $param = [
                'server_id'=>$server_id,
                'app_id'=>$app_id
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /**
    * Create CSR Certificate
    */
    public function createCsr($param)
    {
        $url = "/security/csr";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Set SSL Certificate
    */
    public function setCrt($param)
    {
        $url = "/security/crt";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
    
    /**
    * Install LetsEncrypt SSL Certificate
    */
    public function installLetsEncrypt($param)
    {
        $url = "/security/lets_encrypt_install";
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Automate LetsEncrypt SSL Certificate
    */
    public function automateLetsEncrypt($server_id, $app_id, $auto = true)
    {
        $url = "/security/lets_encrypt_auto";
        $param = [
                'server_id'=>$server_id,
                'app_id'=>$app_id,
                'auto'=>$auto
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Update LetsEncrypt SSL Certificate
    */
    public function revokeLetsEncrypt($server_id, $app_id, $ssl_domain)
    {
        $url = "/security/lets_encrypt_revoke";
        $param = [
                'server_id'=>$server_id,
                'app_id'=>$app_id,
                'ssl_domain'=>$ssl_domain
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Get Whitelisted IPs
    */
    public function getWhitelisted($server_id)
    {
        $url = "/security/whitelisted";
        $param = [
                'server_id'=>$server_id
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /**
    * Add a new Whitelisted IPs
    */
    public function setWhitelisted($server_id, array $ip)
    {
        $url = "/security/whitelisted";
        $param = [
                'server_id'=>$server_id,
                'ip'=>$ip
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Check IP is Blacklisted or not
    */
    public function getIsBlacklisted($server_id, $ip)
    {
        $url = "/security/isBlacklisted";
        $param = [
                'server_id'=>$server_id,
                'ip'=>$ip
            ];
        $response = $this->callCloudwaysAPI("get", $url, $param);
        return $response;
    }

    /**
    * Add a new siab IPs
    */
    public function setSiab($server_id, $ip)
    {
        $url = "/security/siab";
        $param = [
                'server_id'=>$server_id,
                'ip'=>$ip
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /**
    * Add a new adminer IPs
    */
    public function setAdminer($server_id, $ip)
    {
        $url = "/security/adminer";
        $param = [
                'server_id'=>$server_id,
                'ip'=>$ip
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }
}
