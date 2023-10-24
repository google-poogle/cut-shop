<?php

namespace App\Providers;

use App\Http\Kernel;
use App\Providers\FakeImgProvider\FakeImgProvider;
use App\Services\Telegram\TeleframBotApiInterface;
use App\Services\Telegram\TelegramBotApi;
use Carbon\CarbonInterval;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
          $this->app->singleton(Generator::class, function() {
            $faker = Factory::create();
            $faker->addProvider(new FakeImgProvider($faker));
            return $faker;
          });

        /*
        $this->app->singleton('Faker', function() {
            $faker = Factory::create();
            $faker->addProvider(new FakeImgProvider($faker));
            return $faker;
        });*/
// регистрируем бота в ТГ
        $this->app->singleton(TeleframBotApiInterface::class, function() {
            return new TelegramBotApi();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!App()->isProduction());
        //выдаст эксепшн если будут передаваться данные которых нет в filable
        Model::preventsSilentlyDiscardingAttributes();
      // мониторинго времени отправки запроса в базу
     /*   DB::whenQueryingForLongerThan(500, function (Connection $connection, QueryExecuted $event) {
            // Глючная история
        });*/

        DB::listen(function ($query) {
            if($query->time > 100) {
                logger()
                    ->channel('telegram')
                    ->debug('Долгий запрос' . $query->sql, $query->bindings);
            }
            // $query->sql;
            // $query->bindings;
            // $query->time;
        });

        // отправит уведомление если запрос реквеста гуляет более * времени
        $kernel = app(Kernel::class);
        $kernel->whenRequestLifecycleIsLongerThan(
            CarbonInterval::second(4),
            function (){
                // отправка
            }
        );

    }
}
