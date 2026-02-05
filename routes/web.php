<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\GmailController;
use Google\Client;
use Google\Service\Gmail;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Public Route (Landing)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Halaman utama setelah login
    Route::get('/dashboard', [SendController::class,'index'])->name('dashboard');
    Route::post('/send', [SendController::class,'send']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Templates
    Route::get('/templates', [TemplateController::class,'index']);
    Route::get('/templates/create', [TemplateController::class,'create']);
    Route::post('/templates/create', [TemplateController::class,'store']);
    Route::get('/templates/{template}/edit', [TemplateController::class,'edit'])->name('templates.edit');
    Route::put('/templates/{template}', [TemplateController::class,'update'])->name('templates.update');
    Route::delete('/templates/{template}', [TemplateController::class,'destroy'])->name('templates.destroy');

    // History
    Route::get('/history', [SendController::class,'history']);
});

/*
|--------------------------------------------------------------------------
| Gmail OAuth
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->get('/google/redirect', function () {

    // Simpan user ID ke session sebelum ke Google
    session(['google_auth_user' => auth()->id()]);

    $client = new Client();
    $client->setAuthConfig(storage_path('app/google-credentials.json'));
    $client->addScope(Gmail::GMAIL_SEND);
    $client->setAccessType('offline');
    $client->setPrompt('consent');
    $client->setRedirectUri('http://localhost:8000/google/callback');

    return redirect($client->createAuthUrl());
});


// Step 2 — Callback dari Google (TIDAK perlu auth)
Route::get('/google/callback', function () {

    $client = new Client();
    $client->setAuthConfig(storage_path('app/google-credentials.json'));
    $client->addScope(Gmail::GMAIL_SEND);
    $client->setRedirectUri('http://localhost:8000/google/callback');

    $token = $client->fetchAccessTokenWithAuthCode(request('code'));

    // Ambil user dari session yang tadi disimpan
    $userId = session('google_auth_user');
    $user = User::find($userId);

    $user->update([
        'google_token' => json_encode($token)
    ]);

    session()->forget('google_auth_user');

    return redirect('/dashboard');
});



require __DIR__.'/auth.php';    