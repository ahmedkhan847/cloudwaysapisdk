<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Server\Server;

/**
 * 
 */
class ServerTest extends TestCase
{
    // public function setUp(){ }
    // public function tearDown(){ }
    private $server = null;
    

    public function __construct()
    {
        $this->server = new Server();
        $this->server->SetEmail("");
        $this->server->SetKey("");
    }


    public function testGetServer()
    {
        $this->assertArrayHasKey("status", (array)$this->server->getServers());
    }
    public function testCreateServer()
    {
        $value['cloud'] = "do";
        $value['region'] ="lon1";
        $value['instance_type'] ="512MB";
        $value['memory_size'] ="";
        $value['application'] ="phpstack";
        $value['app_version'] ="5.4";
        $value['project_name'] ="";
        $value['this->server_label'] ="abc";
        $value['app_label'] ="abc";
        $value['db_volume_size'] ="";
        $value['data_volume_size'] ="";
       // $this->assertContains("operation_id",(array)$this->server->createServer($value));
    }

    public function testDeleteServer()
    {
        $server_id = "59727";
        // $this->assertArrayHasKey("operation_id",(array)$this->server->deleteServer($server_id));
    }

    public function testStopServer()
    {
        $server_id = "59727";
        //$this->assertArrayHasKey("message",(array)$this->server->stopServer($server_id));
    }

    public function testStartServer()
    {
        $server_id = "59727";
        //$this->assertArrayHasKey("operation_id",(array)$this->server->startServer($server_id));
    }

    public function testRestartServer()
    {
        $server_id = "59727";
        //$this->assertArrayHasKey("operation_id",(array)$this->server->restartServer($server_id));
    }

    public function testCloneServer()
    {
        $value['cloud'] = "d";
        $value['region'] ="lon1";
        $value['instance_type'] ="512MB";
        $value['application_id'] ="5.4";
        $value['source_server_id'] ="59727";
        
        //$this->assertArrayHasKey("message",(array)$this->server->cloneServer($value));
    }

    public function testChangeServerLabel()
    {
        $server_id = "59727";
        $label = "Test";
        //$this->assertArrayHasKey("operation_id",(array)$this->server->updateServer($server_id,$label));
    }

    public function testGetDiskUsage()
    {
        $server_id = "59727";
        $this->assertArrayHasKey("data", (array)$this->server->getDiskUsage($server_id));
    }
}
