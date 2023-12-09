<?php

namespace App\Http\Controllers;

use App\Helpers\CodeHelper;
use App\User;
use Illuminate\Http\Request;
use Modules\Space\Models\Space;

class DevController extends Controller
{

    public function fixLocations()
    {
        $spaces = Space::where('map_lat', 0)->whereNotNull('address')->where('address', '!=', '""')->orderBy('id', 'asc')->limit(250)->get();
        if ($spaces != null) {
            foreach ($spaces as $space) {
                //echo $space->id;die;
                $address = $space->address;
                //echo $address;
                $pageUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=AIzaSyCRu_qlT0HNjPcs45NXXiOSMd3btAUduSc';
                $addressResponse = CodeHelper::pageResponse($pageUrl);
                if (is_array($addressResponse)) {
                    if (array_key_exists('results', $addressResponse)) {
                        $results = $addressResponse['results'];
                        //print_r($results);die;
                        if (is_array($results) && array_key_exists(0, $results)) {
                            $addressComponent = $results[0];
                            if (is_array($addressComponent)) {
                                $geo = $addressComponent['geometry']['location'];
                                if (is_array($geo)) {
                                    if (array_key_exists('lat', $geo) && array_key_exists('lng', $geo)) {
                                        $space->map_lat = (string)$geo['lat'];
                                        $space->map_lng = (string)$geo['lng'];
                                        $space->update();

                                        echo $address . " --> LAT " . $space->map_lat . "  --> LANG " . $space->map_lng . "</br>";

                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}
