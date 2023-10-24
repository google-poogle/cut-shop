<?php

use App\Exceptions\TelegramException;
use App\Models\Brand;
use App\Providers\FakeImgProvider\FakeImgProvider;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\TestController as TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test', 'App\Http\Controllers\TestController@start')->name('get');

Route::get('/', function () {

    $brand_id = Brand::query()->inRandomOrder()->value('id');
    dd($brand_id);

    $faker = app('Faker');
    dd($faker->go('x'));

   // \App\Models\Tag::factory(10)->create();

   // $appName = config('app.TG_CHAT_ID');
//dd(getenv('TG_CHAT_ID'));

    //$faker = \Faker\Factory::create();
   // $faker->addProvider(new FakeImgProvider($faker));
//$faker = app(Generator::class);
//dd($faker->go("lol"));

  /*  $faker = app('Faker');
    dd($faker->go('x'));
*/
   //logger()->channel('telegram')->debug('Helh');
   // Log::info("Служебная информация.");
    //Log::channel('telegram')->error('ку-ку');
  //  throw new TelegramException("Текст с роутера");
    //return view('welcome');


 //   $faker = Faker::create();
 //   dd($faker->go('lol'));
});
