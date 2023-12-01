<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    public function handle(Request $request)
    {
        $botman = app('botman');

        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello!');
        });

        $botman->listen();
    }
}
