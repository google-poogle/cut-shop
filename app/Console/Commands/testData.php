<?php

namespace App\Console\Commands;
use App\Models\Brand;
use App\Models\Tag;
use App\Services\TestService;
use Faker\Factory as Faker;
use Illuminate\Console\Command;

class testData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(TestService $x)
    {
        print 'lol';
      dd(
          Brand::inRandomOrder()
              ->limit(1)
              ->get()
      );
        return self::SUCCESS;
    }
}
