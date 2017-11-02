<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Server\Service\Service;

/**
 * 
 */
class ServerServiceTest extends TestCase
{
    private $server = null;
    

    public function __construct()
    {
        $this->server = new Service();
        $this->server->SetEmail("");
        $this->server->SetKey("");
    }

    public function testGetServerServices()
    {
        $server_id = "59727";
        $this->assertArrayHasKey("services", (array)$this->server->getServices($server_id));
    }

    public function testManageServerServices()
    {
        $server_id = "59727";
        $service = "mysql";
        $state = "restart";
        $this->assertArrayHasKey("service_status", (array)$this->server->manageServices($server_id, $service, $state));
    }
}
