<?php

namespace App\Services\Telegram;

use App\Exceptions\TelegramException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Throwable;

class TelegramBotApi implements TeleframBotApiInterface
{
public const HOST = 'https://api.telegram.org/bot';

    public function sendMessage(string $token, int $chat_id, string $text) : bool {
       // Storage::disk('local')->put('example.txt', self::HOST . $token . '/sendMessage');
        try {
        $response = Http::get(self::HOST . $token . '/sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        ])->json();
        return $response['ok'] ?? false;

        } catch (Throwable $e) {
           report(new TelegramException($e->getMessage()));
        }



      /*  if (!$response['ok']) {
            throw new ModelNotFoundException('User not found by ID ' . $user_id);
        }*/

      //  return $response;
    }

}
