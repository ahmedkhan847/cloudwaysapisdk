<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Server\Manage\Manage;

/**
 * 
 */
class ServerManageTest extends TestCase
{
    private $server = null;
    

    public function __construct()
    {
        $this->server = new Manage();
        $this->server->SetEmail("");
        $this->server->SetKey("");
    }

    public function testGetBackup()
    {
        $server_id = "59727";
        //$this->assertArrayHasKey("operation_id",(array)$this->server->getBackup($server_id));
    }

    public function testManageSnapshot()
    {
        $server_id = "59727";
        $snapshot_frequency = "";
        $this->assertEmpty((array)$this->server->manageSnapshot($server_id, $snapshot_frequency));
    }

    public function testManageBackup()
    {
        $value['server_id'] = "59727";
        $value['backup_frequency'] = "2";
        $value['backup_retention'] = "8";
        $value['local_backups'] = "true";
        $this->assertEmpty((array) $this->server->manageBackup($value));
    }

    public function testManagePackage()
    {
        $server_id = "59727";
        $package_name = "redis";
        $package_version = "0";
        //$this->assertArrayHasKey("operation_id",(array)$this->server->managePackages($server_id, $package_name, $package_version));
    }

    public function testGetSettings()
    {
        $server_id = "59727";
        $this->assertArrayHasKey("settings", (array)$this->server->getSettings($server_id));
    }

    public function testSetSettings()
    {
        $value['server_id'] = "59727";
        $value['display_errors'] = "On";
        $this->assertEmpty((array)$this->server->setSettings($value));
    }

    public function testGetGraph()
    {
        $value['server_id'] = "59727";
        $value['target'] = "json";
        $value['duration'] = "1day";
        $value['timezone'] = "1day";
        $value['output_format'] = "json";
       // $this->assertArrayHasKey("contents",(array)$this->server->getGraph($value));
    }

    public function testSetMasterUsername()
    {
        $server_id = "59727";
        $username = "ahmed92";
        //assert failed
        $this->assertArrayHasKey("message", (array)$this->server->setMasterUsername($server_id, $username));
    }

    public function testSetMasterPassword()
    {
        $server_id = "59727";
        $password = "ahmedkhan";
        $this->assertEmpty((array)$this->server->setMasterPassword($server_id, $password));
    }
}
