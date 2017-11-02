<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Application\ManageApplication\ManageApplication;

/**
*
*/
class ApplicationTest extends TestCase
{
    private $application = null;
    
    public function __construct()
    {
        $this->application = new ManageApplication();
        $this->application->SetEmail("");
        $this->application->SetKey("");
    }
    
    public function testGetBackup()
    {
        $server_id = "59727";
        $app_id = "160761";
        $this->assertArrayHasKey("restore_backup", (array)$this->application->getBackup($server_id, $app_id));
    }
    
    public function testGetCronLists()
    {
        $server_id = "59727";
        $app_id = "160761";
        $this->assertArrayHasKey("basic", (array)$this->application->getCronList($server_id, $app_id));
    }
    
    public function testUpdateSymlinks()
    {
        $server_id = "59727";
        $app_id = "160761";
        $symlink = "wordpresss";
        $this->assertEmpty((array)$this->application->updateSymlink($server_id, $app_id, $symlink));
    }

    public function testRestoreApplications()
    {
        $server_id = "59727";
        $app_id = "160761";
        $time = "2017-01-02T06:00:36";
       // $this->assertArrayHasKey("operation_id",(array)$this->application->restoreApplication($server_id,$app_id,$time));
    }

    public function testRollbackApplications()
    {
        $server_id = "59727";
        $app_id = "160761";
        //$this->assertArrayHasKey("operation_id",(array)$this->application->rollbackApplication($server_id,$app_id));
    }
    
    public function testCronList()
    {
        $value['server_id'] = "59727";
        $value['app_id'] = "173142";
        $value['is_script'] = "true";
        $value['crons'] = "0  0  1  1  * php script.php";
        $this->assertArrayHasKey("script", (array)$this->application->createCronList($value));
    }
    
    public function testUpdateDbPasswords()
    {
        $server_id = "59727";
        $app_id = "160761";
        $password = "ahmedkhan";
        $this->assertEmpty((array)$this->application->updateDbPassword($server_id, $app_id, $password));
    }

    public function testSetWebroot()
    {
        $server_id = "59727";
        $app_id = "160761";
        $webroot = "admiin";
        $this->assertEmpty((array)$this->application->setWebroot($server_id, $app_id, $webroot));
    }

    public function testResetPermissions()
    {
        $server_id = "59727";
        $app_id = "160761";
        $this->assertArrayHasKey("response", (array)$this->application->resetPermissions($server_id, $app_id));
    }

    public function testGetFpmSettings()
    {
        $server_id = "59727";
        $app_id = "160761";
        $this->assertArrayHasKey("response", (array)$this->application->getFpmSetting($server_id, $app_id));
    }

    public function testSetFpmSettings()
    {
        $server_id = "59727";
        $app_id = "160761";
        $fpm_setting = "php_admin_flag[log_errors] = on";
        $this->assertArrayHasKey("response", (array)$this->application->setFpmSetting($server_id, $app_id, $fpm_setting));
    }

    public function testGetVarnishSettings()
    {
        $server_id = "59727";
        $app_id = "160761";
        $this->assertArrayHasKey("response", (array)$this->application->getVarnishSetting($server_id, $app_id));
    }

    public function testSetVarnishSettings()
    {
        $value['server_id'] = "59727";
        $value['app_id'] = "173142";
        $value['vcl_list'] = json_encode([[
                            "method" => "exclude",
                            "type" => "url",
                            "value"=> "\/index2.php"
        ]]);
        $this->assertArrayHasKey("response", (array)$this->application->setVarnishSetting($value));
    }
}
