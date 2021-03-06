A PHP-SDK for Cloudways API.
----------------------------

You can clone it to start working on it or use composer to install it.

Type the following command to install SDK using composer

`$composer require "cloudwaysapi/phpsdk:1.0.0.x-dev"`

Or create a new file name it `composer.json` and paste the following code in it.
```
    {
    	"require": {
    		        "ahmedkhan847/cloudwaysapiphpsdk" : "1.0.0.x-dev"
    	    }
    }
```

Cloudways API PHP-SDK also provides you two function to check the status of operation id. The first is  `getOperation($operationid)` which will return the result from which you have to extract whether the operation is completed. The second one is `getOperationResult($operationid, $wait)` which take the `$operationid` and `$wait` parameter (in seconds) and returns `true` when the operation is completed. If it reaches the maximum execution time for PHP, the code will stop and you need to run the function again.  

To learn more about using it read the following guide: [Possibilities of Cloudways API PHP-SDK](https://www.cloudways.com/blog/introducing-cloudways-api-php-sdk/).

# Creating a New Server#


```
#!php

<?php
require "vendor/autoload.php";

use Cloudways\Server\Server;

$server = new Server();
$server->SetEmail("ahmed.khan@cloudways.com");
$server->SetKey("gR1YywOMN2gG8L0FZC6Rd3QSsr0jlM");

$value['cloud'] = "do";
$value['region'] ="lon1";
$value['instance_type'] ="512MB";
$value['memory_size'] ="";
$value['application'] ="phpstack";
$value['app_version'] ="5.4";
$value['project_name'] ="";
$value['this->server_label'] ="abc";
$value['app_label'] ="abc";
$value['db_volume_size'] ="";
$value['data_volume_size'] ="";

$result = $server->create_server($value);
```

#Using this SDK in Laravel

For laravel define email and api key in `.env` file

```
CW_EMAIL=ahmed.khan@cloudways.com
CW_API_KEY=gR1YywOMN2gG8L0FZC6Rd3QSsr0jlM
```
Then in your control add the namespace and start using it. 

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudways\Lists\Lists;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = new Lists();
        $result = [];
        $result[] = $list->getServerRegions();
        $result[] = $list->getCloudProviders();
        $result[] = $list->getServerSizes();
        $result[] = $list->getApps();
        $result[] = $list->getPackages();
        $result[] = $list->getSettings();
        $result[] = $list->getBackupFrequencies();
        $result[] = $list->getCountries();
        $result[] = $list->getMonitorDurations();
        $result[] = $list->getMonitorTargets();
        return $result;
    }
}
?>
```
