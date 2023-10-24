<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TelegramException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     */
    public function render($request): Response
    {
      //  if ($exception instanceof TelegramException) {
            return response()->view(
                'welcome',
                array(
                    'exception' => $this
                )
            );
      //  }
    }
}
