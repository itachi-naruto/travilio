<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\SearchHotels;

class TravilioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchHotels(SearchHotels $uptime_api)
    {
        $full_path = array('http://www.mocky.io/v2/5e400f423300005500b04d0c','http://www.mocky.io/v2/5e4010ad3300004200b04d15');
        $param=[
            [
                "dateFrom",
                "dateTo",
                "city",
                "adults"
            ],
            [
                "from_date",
                "to_date",
                "city_code",
                "no_adults"
            ]
        ];

        foreach($full_path as $k=>$url) {
            foreach ($param[$k] as $ky => $val) {
                $monitors = $uptime_api->postResponse($url, [
                    $param[$k][$ky] => '4-3-2020',
                    $param[$k][$ky] => '7-3-2020',
                    $param[$k][$ky] => 'EG',
                    $param[$k][$ky] => 1,
                ]);
            }


            $someArray = json_decode($monitors[0], true);
            array_multisort(array_map(function($element) {
                return $element['Rate'];
            }, $someArray), SORT_DESC, $someArray);
            echo '<pre>';
            echo json_encode($someArray);
        }
    }

    public function postRequest()
    {
        $client = new \GuzzleHttp\Client();
        $full_path = array('http://www.mocky.io/v2/5e400f423300005500b04d0c','http://www.mocky.io/v2/5e4010ad3300004200b04d15');
          $param=[
                [
                    "dateFrom",
                    "dateTo",
                    "city",
                    "adults"
                ],
                [
                    "from_date",
                    "to_date",
                    "city_code",
                    "no_adults"
                ]
              ];
        foreach($full_path as $k=>$v) {
        foreach($param[$k] as $ky=>$val) {
            $response = $client->request('POST', $v, [
                $param[$k][$ky] => '4-3-2020',
                $param[$k][$ky] => '7-3-2020',
                $param[$k][$ky] => 'EG',
                $param[$k][$ky] => 1,
            ]);
            }
            $response = $response->getBody()->getContents();

        echo '<pre>';
        print_r($response);
    }}


}
