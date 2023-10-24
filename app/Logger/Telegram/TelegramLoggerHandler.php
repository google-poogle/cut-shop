<?php

namespace App\Logger\Telegram;
use App\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLoggerHandler extends AbstractProcessingHandler
{
    public int $chat_id;
    public string $token;
public function __construct(array $config)
{
    // подставим из конфига
    $level = Logger::toMonologLevel($config['level']);
    $this->chat_id = (int)$config['chat_id'];
    $this->token = $config['token'];
    parent::__construct($level);
}

    protected function write(LogRecord $record): void
    {
     /*  app(TelegramBotApi::class)::sendMessage(
        $this->token,
        $this->chat_id,
        $record->formatted
    );*/
           $res = (new \App\Services\Telegram\TelegramBotApi)->sendMessage( $this->token,
           $this->chat_id,
           $record->formatted);

       }
}
