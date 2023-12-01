<?php

declare(strict_types=1);

namespace App\Conversations;

use BotMan\Drivers\Telegram\Extensions\Keyboard;
use BotMan\Drivers\Telegram\Extensions\KeyboardButton;

class Conversation extends \BotMan\BotMan\Messages\Conversations\Conversation
{
    public function run(): void
    {
        $keyboard = Keyboard::create()
            ->oneTimeKeyboard()
            ->type(Keyboard::TYPE_KEYBOARD)
            ->resizeKeyboard(true)
            ->addRow(KeyboardButton::create('📝 Register'),
                KeyboardButton::create('🔐 Login'))
            ->addRow(KeyboardButton::create('💬 Help'),
                KeyboardButton::create('ℹ️ Info'))
            ->addRow(KeyboardButton::create('🛠️ Services'));

        $this->ask('Please, choose the option', function (string $answer): void {
            $this->bot->reply("Your answer is $answer");
        }, $keyboard->toArray());

    }
}
