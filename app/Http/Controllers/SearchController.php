<?php
/**
 * Created by PhpStorm.
 * User: GOPRO
 * Date: 3/15/2020
 * Time: 8:24 AM
 */

namespace App\Http\Controllers;

use App\Transformers\SearchTransformer;
use App\HotelsProvider\ProviderB;
use App\HotelsProvider\ProviderA;

class SearchController extends Controller
{

    private $searchTransformer;

    function __construct(SearchTransformer $searchTransformer)
    {

        $this->searchTransformer = $searchTransformer;
    }

    public function index()
    {
        $ProviderA = new ProviderA();
        $ProviderB = new ProviderB();
        $data = (new SearchTransformer)->transform($ProviderA,$ProviderB); // Create a resource collection transformer

        echo '<pre>';
        echo json_encode($data); // Get transformed array of data
    }
}
