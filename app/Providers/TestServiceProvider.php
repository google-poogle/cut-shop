<?php

namespace App\Providers;

use App\Providers\FakeImgProvider\FakeImgProvider;
use App\Services\TestService;
use Faker\Factory;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton('Faker', function() {
            $faker = Factory::create();
            $faker->addProvider(new FakeImgProvider($faker));
            return $faker;
        });

        $this->app->singleton(TestService::class, function() {
            return new TestService('ok');
        });

    }
    public function boot(): void
    {
    }
}
