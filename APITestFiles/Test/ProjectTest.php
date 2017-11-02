<?php
namespace APITestFiles\Files;

require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Cloudways\Project\Project;

/**
 * 
 */
class ProjectTest extends TestCase
{
    private $project = null;
    

    public function __construct()
    {
        $this->project = new Project();
        $this->project->SetEmail("");
        $this->project->SetKey("");
    }

    public function testGetProjects()
    {
        $this->assertArrayHasKey("projects", (array)$this->project->getProjects());
    }

    public function testCreateProject()
    {
        $name = "php test";
        $app_ids = "184304";
        $this->assertArrayHasKey("project", (array)$this->project->createProject($name, $app_ids));
    }

    public function testDeleteProject()
    {
        $id = "17530";
        $this->assertEmpty((array)$this->project->deleteProjects($id));
    }

    public function testUpdateProject()
    {
        $id = "17530";
        $name = "php test";
        $app_ids = "184304";
        
        $this->assertArrayHasKey("project", (array)$this->project->updateProject($id, $name, $app_ids));
    }
}
