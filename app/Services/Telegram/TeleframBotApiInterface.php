<?php

namespace App\Services\Telegram;

interface TeleframBotApiInterface
{
    public function sendMessage(string $token,int $chat_id, string $text) : bool;
}
