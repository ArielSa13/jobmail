<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Services\GmailService;
use App\Models\ApplicationLog;


class SendController extends Controller
{
    public function index()
    {
        $templates = auth()->user()->templates;
        return view('send', compact('templates'));
    }

    public function history()
    {
        $logs = \App\Models\ApplicationLog::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('history', compact('logs'));
    }

    public function send(Request $r)
    {
        $template = Template::find($r->template_id);

        $body = str_replace(
            '{{company}}',
            $r->company,
            $template->body
        );

       $cvPath = storage_path('app/public/' . $template->cv_file);


        // ✅ Pakai GmailService, bukan facade
        GmailService::send(
            $r->email,
            $r->subject,
            $body,
            $cvPath
        );

        $subject = $r->subject;

// Ambil teks sebelum tanda "-"
$parts = explode('-', $subject);
$positionRaw = trim($parts[0]);

// Kalau ada kata "Lamaran", hapus
$position = preg_replace('/^lamaran\s+/i', '', $positionRaw);

        ApplicationLog::create([
        'user_id' => auth()->id(),
        'company' => $r->company,
        'position' => $position,
        'location' => $r->location,
    ]);

        return back()->with('success', 'Lamaran berhasil dikirim 🚀');
    }
}