<?php

namespace App\Services;

use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;

class GmailService
{
    public static function send($to, $subject, $body, $attachmentPath)
    {
        $client = new Client();

        // 1️⃣ Identitas aplikasi (WAJIB)
        $client->setAuthConfig(storage_path('app/google-credentials.json'));
        $client->addScope(Gmail::GMAIL_SEND);

        // 2️⃣ Token hasil login Gmail kamu (WAJIB)
        $token = json_decode(auth()->user()->google_token, true);
        $client->setAccessToken($token);

        $service = new Gmail($client);

        $boundary = uniqid(rand(), true);

        $rawMessageString = "From: Me <me>\r\n";
        $rawMessageString .= "To: <$to>\r\n";
        $rawMessageString .= "Subject: $subject\r\n";
        $rawMessageString .= "MIME-Version: 1.0\r\n";
        $rawMessageString .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n\r\n";

        $rawMessageString .= "--$boundary\r\n";
        $rawMessageString .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
        $rawMessageString .= "$body\r\n\r\n";

        $fileData = base64_encode(file_get_contents($attachmentPath));
        $displayName = explode('_', basename($attachmentPath), 2)[1] ?? basename($attachmentPath);

        $rawMessageString .= "--$boundary\r\n";
        $rawMessageString .= "Content-Type: application/pdf; name=\"".$displayName."\"\r\n";
$rawMessageString .= "Content-Transfer-Encoding: base64\r\n";
$rawMessageString .= "Content-Disposition: attachment; filename=\"".$displayName."\"\r\n\r\n";

        $rawMessageString .= chunk_split($fileData) . "\r\n";
        $rawMessageString .= "--$boundary--";

        $rawMessage = base64_encode($rawMessageString);
        $rawMessage = str_replace(['+', '/', '='], ['-', '_', ''], $rawMessage);

        $message = new Message();
        $message->setRaw($rawMessage);

        $service->users_messages->send('me', $message);
    }
}