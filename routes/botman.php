<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('age', function ($bot) {
    $bot->reply('24!');
});
$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand this message!!');
});
$botman->hears('image',function($bot){
    $image = new Image('https://botman.io/img/logo.png');
    $message = OutgoingMessage::create("this is botman logo")
    ->withAttachment($image);
    $bot->reply($message);
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
