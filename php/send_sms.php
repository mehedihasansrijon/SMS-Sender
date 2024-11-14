<?php

// Firebase API Key and Server URL
define('FIREBASE_API_KEY', 'YOUR_FCM_API_KEY');
define('FIREBASE_SERVER_URL', 'https://fcm.googleapis.com/fcm/send');

function sendFCMMessage($to, $data) {
    $headers = [
        'Authorization: key=' . FIREBASE_API_KEY,
        'Content-Type: application/json'
    ];

    $notification = [
        'to' => $to,
        'data' => $data
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, FIREBASE_SERVER_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notification));

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

if (isset($_GET['firebaseToken']) && isset($_GET['action']) && isset($_GET['number']) && isset($_GET['body'])) {
    $firebaseToken = $_GET['firebaseToken'];
    $action = $_GET['action'];
    $number = $_GET['number'];
    $body = $_GET['body'];

    $data = [
        'action' => $action,
        'number' => $number,
        'body' => $body
    ];

    $response = sendFCMMessage($firebaseToken, $data);

    echo "Response: " . $response;
} else {
    echo "Required parameters are missing!";
}
?>
