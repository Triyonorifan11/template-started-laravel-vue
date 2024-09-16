<?php

namespace App\Helpers;

class PushNotification {

    public static function fcm($deviceToken, $message) {

        $data = [
            "registration_ids" => $deviceToken,
            "notification" => [
                "title" => "Usulan Baru di Jalan ".$message['road'],
                "body" => $message['proposal_type'],
                "click_action" => "FLUTTER_NOTIFICATION_CLICK"
            ],
            "data" => [
                "proposal_id" => $message['proposal_id'],
                "proposal_type" => $message['proposal_type'],
                "status_type" => $message['status_type'],
                "road" => $message['road'],
                "date" => $message['date']
            ],
        ];

        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . env('FIREBASE_SERVER_KEY'),
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('FIREBASE_SERVER_URL'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        curl_close($ch);

        return $result;
    }

}
