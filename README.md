# Telegram Library

A simple PHP library for sending messages to Telegram.

## Installation

Use [Composer](https://getcomposer.org/) to install the library:

```bash
composer require nqa/telegram-library
# composer.json init
{
    "require": {
        "nqa/telegram-library": "1.0.0"
    }
}

# Usage
Include the Composer autoloader in your PHP file:
require_once 'vendor/autoload.php';
Create an instance of the TelegramLibrary class using your bot token:

use TelegramBots\TelegramLibrary\TelegramLibrary;

$botToken = "YOUR_BOT_TOKEN";
$telegramLibrary = new TelegramLibrary($botToken);

#Send a Simple Message
$chatId = "TARGET_CHAT_ID";
$messageText = "Hello, this is a simple message.";
$telegramLibrary->sendMessage($chatId, $messageText);
#Send Order Information
$orderData = [
    'Order ID' => '123456',
    'Product' => 'Example Product',
    'Quantity' => 2,
    'Total Amount' => '$50.00',
    'Customer Name' => 'John Doe',
    // ... additional order details
];

$telegramLibrary->sendMessage($chatId, $orderData);
#Send a Button Command
$buttons = [
    ['text' => 'Button 1', 'command' => '/id'],
    ['text' => 'Button 2', 'command' => '/command2'],
    ['text' => 'Button 3', 'command' => '/command3'],
];

$buttonCommandText = "Choose an option:";
$telegramLibrary->sendFlexibleButtonCommand($chatId, $buttonCommandText, $buttons, true, false);
#License
This library is open-source software licensed under the MIT License.


Make sure to replace `"YOUR_BOT_TOKEN"` and `"TARGET_CHAT_ID"` with your actual bot token and target chat ID. Additionally, customize the usage examples based on your library's functionality.
#Sample Code

<?php

// Include Composer autoloader
require_once 'vendor/autoload.php';

// Use the TelegramLibrary namespace
use TelegramBots\TelegramLibrary\TelegramLibrary;

// Your bot token
$botToken = "YOUR_BOT_TOKEN";

// Create an instance of the TelegramLibrary
$telegramLibrary = new TelegramLibrary($botToken);

// Target chat ID
$chatId = "TARGET_CHAT_ID";

// Example: Send a simple message
$messageText = "Hello, this is a simple message.";
$telegramLibrary->sendMessage($chatId, $messageText);

// Example: Send order information
$orderData = [
    'Order ID' => '123456',
    'Product' => 'Example Product',
    'Quantity' => 2,
    'Total Amount' => '$50.00',
    'Customer Name' => 'John Doe',
    // ... additional order details
];

$telegramLibrary->sendMessage($chatId, $orderData);

// Example: Send a button command
$buttons = [
    ['text' => 'Button 1', 'command' => '/id'],
    ['text' => 'Button 2', 'command' => '/command2'],
    ['text' => 'Button 3', 'command' => '/command3'],
];

$buttonCommandText = "Choose an option:";
$telegramLibrary->sendFlexibleButtonCommand($chatId, $buttonCommandText, $buttons, true, false);

