<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Lists\Lists;

/**
*
*/
class ListsTest extends TestCase
{
    private $lists = null;
    
    public function __construct()
    {
        $this->lists = new Lists();
        $this->lists->SetEmail("");
        $this->lists->SetKey("");
    }
    
    public function testGetCloudProviders()
    {
        $this->assertArrayHasKey("providers", (array)$this->lists->getCloudProviders());
    }
    
    public function testGetServerRegions()
    {
        $this->assertArrayHasKey("regions", (array)$this->lists->getServerRegions());
    }
    
    public function testGetServerSizes()
    {
        $this->assertArrayHasKey("sizes", (array)$this->lists->getServerSizes());
    }
    
    public function testGetApps()
    {
        $this->assertArrayHasKey("apps", (array)$this->lists->getApps());
    }
    
    public function testGetPackages()
    {
        $this->assertArrayHasKey("packages", (array)$this->lists->getPackages());
    }
    
    public function testGetSettings()
    {
        $this->assertArrayHasKey("settings", (array)$this->lists->getSettings());
    }
    
    public function testGetBackup()
    {
        $this->assertArrayHasKey("frequencies", (array)$this->lists->getBackupFrequencies());
    }
    
    public function testGetCountries()
    {
        //$this->assertContains(["iso"=>"AF","name"=>"AFGHANISTAN"],(array)$this->lists->getCountries());
    }
    
    public function testMonitorDuration()
    {
        $this->assertArrayHasKey("durations", (array)$this->lists->getMonitorDurations());
    }
    
    public function testMonitorTargets()
    {
        $this->assertArrayHasKey("targets", (array)$this->lists->getMonitorTargets());
    }
}
