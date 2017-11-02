<?php
namespace Cloudways\Project;

/*
 * Class To Manage Projects
 */
class Project extends \Cloudways\Base
{
    /*
    *	Get all Projects
    */
    public function getProjects()
    {
        $url = "/project";
        $response = $this->callCloudwaysAPI("get", $url);
        return $response;
    }
    /*
    *	Create a New Project
    */
    public function createProject($name, $app_ids)
    {
        $url = "/project";
        $param = [
                'name' => $name,
                'app_ids' => $app_ids
            ];
        $response = $this->callCloudwaysAPI("post", $url, $param);
        return $response;
    }

    /*
    *	Delete a Project
    */
    public function deleteProjects($id)
    {
        try {
            $this->validations(['projectid'=>$id]);
            $url = "/project/".$id;
            $response = $this->callCloudwaysAPI("delete", $url);
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }

    /*
    *	Update a project
    */
    public function updateProject($id, $name = null, $app_ids = null)
    {
        try {
            $this->validations(['projectid'=>$id]);
            $url = "/project/".$id;
            $param = [
                'name' => $name,
                'app_ids' => $app_ids
            ];
            $response = $this->callCloudwaysAPI("put", $url, $param);
            return $response;
        } catch (\Exception $e) {
            return json_decode($e->getMessage());
        }
    }
}
