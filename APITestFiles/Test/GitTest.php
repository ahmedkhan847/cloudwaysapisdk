<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Git\Git;

/**
*
*/
class GitTest extends TestCase
{
    private $git = null;
    
    public function __construct()
    {
        $this->git = new Git();
        $this->git->SetEmail("");
        $this->git->SetKey("");
    }
    
    public function testGenerateKey()
    {
        $server_id = "59727";
        $app_id ="159866";
        //$this->assertArrayHasKey("key",(array)$this->git->generateKey($server_id,$app_id));
    }
    
    public function testGetKey()
    {
        $server_id = "59727";
        $app_id ="159866";
        //$this->assertArrayHasKey("key",(array)$this->git->getKey($server_id,$app_id));
    }
    
    public function testGetBranches()
    {
        $server_id = "59727";
        $app_id ="159866";
        $git_url ="git@bitbucket.org:ahmedkhan847/cloudwaysapisdk.git";
        
        //$this->assertArrayHasKey("branches",(array)$this->git->gitBranches($server_id,$app_id,$git_url));
    }
    
    public function testGitClone()
    {
        $value['server_id'] = "59727";
        $value['app_id'] ="159866";
        $value['git_url'] ="git@bitbucket.org:ahmedkhan847/cloudwaysapisdk.git";
        $value['branch_name'] ="master";
        $value['deploy_path'] ="";
        //$this->assertArrayHasKey("operation_id",(array)$this->git->gitClone($value));
    }
    
    public function testGitPull()
    {
        $value['server_id'] = "59727";
        $value['app_id'] ="159866";
        $value['git_url'] ="git@bitbucket.org:ahmedkhan847/cloudwaysapisdk.git";
        $value['branch_name'] ="master";
        $value['deploy_path'] ="";
        //$this->assertArrayHasKey("operation_id",(array)$this->git->gitPull($value));
    }

    public function testGitHistory()
    {
        $server_id = "59727";
        $app_id ="159866";
        $this->assertArrayHasKey("logs", (array)$this->git->gitHistory($server_id, $app_id));
    }
}
