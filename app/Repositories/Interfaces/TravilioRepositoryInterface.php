<?php
/**
 * Created by PhpStorm.
 * User: GOPRO
 * Date: 3/15/2020
 * Time: 6:13 AM
 */
namespace App\Repositories\Interfaces;



interface TravilioRepositoryInterface
{


    public function searchHotels($uri, $post_params);

    public function sortResult($result);
}
