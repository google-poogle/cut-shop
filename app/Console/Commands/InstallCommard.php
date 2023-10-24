<?php

namespace App\Console\Commands;

use App\Models\Brand;
use Illuminate\Console\Command;

class InstallCommard extends Command
{

    protected $signature = 'shop:install';

    protected $description = 'Установка';

    public function handle()
    {
        //
        dd(
            Brand::inRandomOrder()
                ->limit(1)
                ->get()->toArray()[0]['id']
        );

        //$this->call('storage:link');
        return self::SUCCESS;
    }
}
