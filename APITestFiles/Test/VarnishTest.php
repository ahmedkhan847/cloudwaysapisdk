<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Varnish\Varnish;

/**
*
*/
class VarnishTest extends TestCase
{
    private $varnish = null;
    
    
    public function __construct()
    {
        $this->varnish = new Varnish();
        $this->varnish->SetEmail("");
        $this->varnish->SetKey("");
    }
    
    public function testDisableVarnish()
    {
        $value['server_id'] = "59727";
        $value['action'] = "disable";
        $this->assertArrayHasKey("response", (array)$this->varnish->serverVarnish($value));
    }
    
    public function testEnableVarnish()
    {
        $value['server_id'] = "59727";
        $value['action'] = "enable";
        $this->assertArrayHasKey("response", (array)$this->varnish->serverVarnish($value));
    }
    
    public function testPurgeVarnish()
    {
        $value['server_id'] = "59727";
        $value['action'] = "purges";
        //assert fail
        $this->assertArrayHasKey("error", (array)$this->varnish->serverVarnish($value));
    }
    
    
    public function testEnableApplicationVarnish()
    {
        $value['server_id'] = "59727";
        $value['action'] = "enable";
        $value['app_id'] = "173142";
        $this->assertEmpty((array)$this->varnish->applicationVarnish($value));
    }
    
    public function testStatusApplicationVarnish()
    {
        $value['server_id'] = "59727";
        $value['app_id'] = "173142";
        $this->assertArrayHasKey("varnish_enabled", (array)$this->varnish->applicationVarnishStatus($value));
    }
}
