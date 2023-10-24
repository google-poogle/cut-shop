<?php

namespace App\Providers\FakeImgProvider;

use Faker\Provider\Base;

class FakeImgProvider extends Base
{
    public function go($str): string
    {
        return "Go Go Go";
    }

}
