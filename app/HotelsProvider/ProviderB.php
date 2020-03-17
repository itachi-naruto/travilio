<?php

namespace App\HotelsProvider;

use App\Repositories\Interfaces\TravilioRepositoryInterface;
use App\Repositories\SearchRepository;

class ProviderB
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $searchRepository;

    public function __construct()
    {
       // $this->searchRepository = $searchRepository;
    }


    public function index()
    {
        $url = 'http://www.mocky.io/v2/5e4010ad3300004200b04d15';
        $searchRepository = new SearchRepository();
        $monitors = $searchRepository->searchHotels($url, [
            "from_date" => '4-3-2020',
            "to_date" => '7-3-2020',
            "city_code" => 'EG',
            "no_adults" => 1,
        ]);

        $sortArray = $searchRepository->sortResult($monitors);
        return $sortArray;
    }



}
