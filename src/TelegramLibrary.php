<?php
class TelegramLibrary {
    private $token;
    private $apiUrl;

    public function __construct($token) {
        $this->token = $token;
        $this->apiUrl = "https://api.telegram.org/bot" . $this->token;
    }

public function sendMessage($chatId, $orderData) {
    $messageText = "ℹ️ *Order Information*\n\n";

    foreach ($orderData as $key => $value) {
        $messageText .= "*$key*: $value\n";
    }

    $params = [
        'chat_id' => $chatId,
        'text' => $messageText,
        'parse_mode' => 'Markdown',
    ];

    $this->sendRequest('sendMessage', $params);
}


    public function sendButtonCommand($chatId, $text, $buttons) {
        $keyboard = [
            'keyboard' => $buttons,
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
        ];

        $params = [
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => json_encode($keyboard),
        ];

        $this->sendRequest('sendMessage', $params);
    }

    public function sendFlexibleButtonCommand($chatId, $text, $buttons, $resize = true, $oneTime = true) {
        $keyboard = [
            'keyboard' => $buttons,
            'resize_keyboard' => $resize,
            'one_time_keyboard' => $oneTime,
        ];

        $params = [
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => json_encode($keyboard),
        ];

        $this->sendRequest('sendMessage', $params);
    }

    private function sendRequest($method, $params = []) {
        $url = $this->apiUrl . '/' . $method;

        $response = $this->performHttpRequest($url, $params);

        if ($response === false || !$this->isResponseOk($response)) {
            // Handle error if needed
        }
    }

private function performHttpRequest($url, $params) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        $this->logError("Curl error: $error");
    }

    curl_close($ch);

    return $response;
}


    private function isResponseOk($response) {
        $responseData = json_decode($response, true);
        return $responseData && $responseData['ok'];
    }
}

?>