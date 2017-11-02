<?php
namespace Cloudways\KbSearch;

/**
 * Class to search for Cloudways KB
 */
class KbSearch extends \Cloudways\Base
{
    /**
    * Search for Cloudways KB
    */
    public function search($q)
    {
        $url =  "/kb/search";
        $response = $this->callCloudwaysAPI("get", $url, ['kb_title' => $q]);
        return $response;
    }
}
