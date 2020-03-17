<?php
/**
 * Created by PhpStorm.
 * User: GOPRO
 * Date: 3/15/2020
 * Time: 6:16 AM
 */
namespace App\Repositories;

use GuzzleHttp\Client;

use App\Repositories\Interfaces\TravilioRepositoryInterface;

class SearchRepository implements TravilioRepositoryInterface
{

    public function searchHotels($uri = null, $post_params = [])
    {
        $full_path = $uri;
        $client = new Client();
        $request = $client->post($full_path, [
            'form_params'     => $post_params,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return  $response;
        }

        return null;
    }

    public function sortResult($result)
    {
        $sortResult = json_decode($result, true);
        array_multisort(array_map(function ($element) {
            return $element['Rate'];
        }, $sortResult), SORT_DESC, $sortResult);
        return $sortResult;
    }
}
