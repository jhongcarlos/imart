<?php
require_once(__DIR__ . '/vendor/autoload.php');
$MessageBird = new \MessageBird\Client('jrhAjYRFmkhhGJyCNRQF2cO9G'); // Set your own API access key here.
$Message             = new \MessageBird\Objects\Message();
$Message->originator = 'MessageBird';
$Message->recipients = array(639969032200);
$Message->body       = 'This is a test message.';
try {
    $MessageResult = $MessageBird->messages->create($Message);
    var_dump($MessageResult);
} catch (\MessageBird\Exceptions\AuthenticateException $e) {
    // That means that your accessKey is unknown
    echo 'wrong login';
} catch (\MessageBird\Exceptions\BalanceException $e) {
    // That means that you are out of credits, so do something about it.
    echo 'no balance';
} catch (\Exception $e) {
    echo $e->getMessage();
}