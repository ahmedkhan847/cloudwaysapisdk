<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Application\Application;

/**
*
*/
class ApplicationTest extends TestCase
{
    private $application = null;
    
    public function __construct()
    {
        $this->application = new Application();
        $this->application->SetEmail("");
        $this->application->SetKey("");
    }
    
    public function testAddApplication()
    {
        $value['server_id'] = "59727";
        $value['application'] = "phpstack";
        $value['app_version'] ="5.4";
        $value['app_label'] = "created with test";
        $value['project_name'] ="laravel2";
        //$this->assertArrayHasKey("operation_id",(array)$this->application->addApplication($value));
    }
    
    public function testDeleteApplication()
    {
        $appId = "160761";
        //$this->assertArrayHasKey("operation_id",(array)$this->application->deleteApplication($appId));
    }
    
    public function testUpdateApplication()
    {
        $server_id = "59727";
        $app_id = "163543";
        $label = "New PHP App";
        $this->assertEmpty((array)$this->application->updateApplication($app_id, $server_id, $label));
    }

    public function testCloneApplication()
    {
        $server_id = "59727";
        $app_id = "163543";
        $label = "New PHP App";
        $this->assertArrayHasKey("operation_id", (array)$this->application->cloneApplication($app_id, $server_id, $label));
    }

    public function testCloneToOtherServer()
    {
        $value['server_id'] = "59727";
        $value['app_id'] = "173142";
        $value['destination_server_id'] = "59727";
        //$this->assertArrayHasKey("operation_id",(array)$this->application->cloneToOtherServer($value));
    }
}
