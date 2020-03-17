<?php
/**
 * Created by PhpStorm.
 * User: GOPRO
 * Date: 3/15/2020
 * Time: 8:18 AM
 */
namespace App\Transformers;

use App\HotelsProvider\ProviderB;
use App\HotelsProvider\ProviderA;
use League\Fractal\TransformerAbstract;

class SearchTransformer extends TransformerAbstract
{
    public function transform(ProviderA $a,ProviderB $b)
    {
        return [
            'Hotel1' => $a->index(),
            'Hotel2' => $b->index(),
        ];
    }
}
