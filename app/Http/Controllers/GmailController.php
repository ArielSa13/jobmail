<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GmailController extends Controller
{
    public function redirect()
    {
        $params = [
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/gmail.send',
            'access_type' => 'offline',
            'prompt' => 'consent'
        ];

        $url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);

        return redirect($url);
    }

    public function callback(Request $request)
    {
        $client = new Client();

        $response = $client->post('https://oauth2.googleapis.com/token', [
            'form_params' => [
                'code' => $request->code,
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
                'grant_type' => 'authorization_code',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        session(['gmail_token' => $data['access_token']]);

        return "Gmail Connected. Tutup halaman ini.";
    }

}