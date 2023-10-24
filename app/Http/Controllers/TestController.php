<?php

namespace App\Http\Controllers;

use App\Services\Telegram\TelegramBotApi;
use App\Services\TestService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    public function __construct(TelegramBotApi $tg)
    {
        $tg->sendMessage(getenv('TG_TOKEN'), getenv('TG_CHAT_ID'), 'Send test!');

    }

    public function start() : void {

    }

}
