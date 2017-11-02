<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Security\Security;

/**
 * 
 */
class SecurityTest extends TestCase
{
    private $security = null;
    
    public function __construct()
    {
        $this->security = new Security();
        $this->security->SetEmail("");
        $this->security->SetKey("");
    }

    public function testCreateCsr()
    {
        $value["server_id"] = "59727";
        $value["app_id"] = "161633";
        $value['ssl_country'] = 'paksitan';
        $value['ssl_state'] = 'newyork';
        $value['ssl_locality'] = 'newyork';
        $value['ssl_organization'] = 'abc';
        $value['ssl_organizational_unit'] = 'asd';
        $value['ssl_email'] = 'ahmed.khan@cloudways.com';
        $value['ssl_domain'] = 'phpstack-13267-59727-161633.cloudwaysapps.com';

        $this->assertEmpty((array)$this->security->createCsr($value));
    }

    public function testGetCsr()
    {
        $server_id = "59727";
        $app_id ="159866";
        $this->assertArrayHasKey("csr", (array)$this->security->getCsr($server_id, $app_id));
    }

    public function testSetCrt()
    {
        $value["server_id"] = "59727";
        $value["app_id"] = "159866";
        $value["ssl_crt"] = "asd";
        $value["ca_crt"] = "asd";
        //Assert Failed
        $this->assertArrayHasKey("message", (array)$this->security->setCrt($value));
    }

    public function testGetWhitelisted()
    {
        $server_id = "59727";
        $this->assertArrayHasKey("ip_list", (array)$this->security->getWhitelisted($server_id));
    }

    public function testSetWhitelisted()
    {
        $server_id = "59727";
        $ip = ["192.168.1.5","192.168.5.4"];
        $this->assertArrayHasKey("response", (array)$this->security->setWhitelisted($server_id, $ip));
    }

    public function testGetIsBlacklisted()
    {
        $server_id = "59727";
        $ip = "192.168.5.4";
        $this->assertArrayHasKey("ip_status", (array)$this->security->getIsBlacklisted($server_id, $ip));
    }

    public function testSetSiab()
    {
        $server_id = "59727";
        $ip = "192.168.5.4";
        $this->assertEmpty((array)$this->security->setSiab($server_id, $ip));
    }

    public function testSetAdminer()
    {
        $server_id = "59727";
        $ip = "192.168.5.4";
        $this->assertEmpty((array)$this->security->setAdminer($server_id, $ip));
    }
}
