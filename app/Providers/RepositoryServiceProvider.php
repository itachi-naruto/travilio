<?php
/**
 * Created by PhpStorm.
 * User: GOPRO
 * Date: 3/15/2020
 * Time: 7:20 AM
 */

namespace App\Providers;


use App\Repositories\Interfaces\TravilioRepositoryInterface;
use App\Repositories\SearchRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TravilioRepositoryInterface::class, SearchRepository::class);
    }
}
