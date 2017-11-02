<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\CloudwaysBot\CloudwaysBot;

/**
*
*/
class CloudwaysBotTest extends TestCase
{
    private $cloudwaysbot = null;
    
    public function __construct()
    {
        $this->cloudwaysbot = new CloudwaysBot();
        $this->cloudwaysbot->SetEmail("");
        $this->cloudwaysbot->SetKey("");
    }
    
    public function testGetAlerts()
    {
        $this->assertArrayHasKey("alerts", (array)$this->cloudwaysbot->getAlerts());
    }
    
    public function testGetAlertsByLastId()
    {
        $last_id = "262365";
        $this->assertArrayHasKey("alerts", (array)$this->cloudwaysbot->getAlerts($last_id));
    }
    public function testMarkAlertRead()
    {
        $alert_id = "262365";
        $this->assertEmpty((array)$this->cloudwaysbot->markReadAlerts($alert_id));
    }
    
    public function testGetCreateIntegration()
    {
        $this->assertArrayHasKey("events", (array)$this->cloudwaysbot->getCreateIntegrations());
    }
    
    public function testGetIntegration()
    {
        $this->assertArrayHasKey("integrations", (array)$this->cloudwaysbot->getIntegrations());
    }

    public function testCreateIntegration()
    {
        $value['name'] = "Email Integration";
        $value['channel'] = "2";
        $value['events'] = [5,12];
        $value['to'] = "shahroze.nawaz@cloudways.com";
        $value['is_active'] = "true";
        $this->assertArrayHasKey("integration", (array)$this->cloudwaysbot->createIntegrations($value));
    }

    public function testDeleteIntegration()
    {
        $channel_id = "53643";
        $this->assertEmpty((array)$this->cloudwaysbot->deleteIntegrations($channel_id));
    }

    public function testUpdateIntegration()
    {
        $value['channel_id'] = "53642";
        $value['name'] = "Email Integration";
        $value['channel'] = "2";
        $value['events'] = [1,4,5,12];
        $value['to'] = "shahroze.nawaz@cloudways.com";
        $value['is_active'] = "false";
        $this->assertArrayHasKey("integration", (array)$this->cloudwaysbot->updateIntegrations($value));
    }
}
