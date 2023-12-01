<?php

namespace App\Http\Controllers;

use App\Conversations\Conversation;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;

class BotController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $botman = app('botman');

        $botman->fallback(function (BotMan $bot) {
            $bot->startConversation(new Conversation());
        });

        $botman->listen();
    }
}
