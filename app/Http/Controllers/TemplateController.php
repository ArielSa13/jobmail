<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(){
    $templates = auth()->user()->templates;
    return view('templates.index',compact('templates'));
}

public function create(){
    return view('templates.create');
}

public function store(Request $r){
    $originalName = $r->file('cv')->getClientOriginalName();
$filename = time() . '_' . $originalName;

$file = $r->file('cv')->storeAs('cv', $filename, 'public');

    Template::create([
        'user_id'=>auth()->id(),
        'name'=>$r->name,
        'body'=>$r->body,
        'cv_file'=>$file
    ]);

    return redirect('/templates');
}

public function edit(Template $template)
{
    // pastikan template milik user
    if ($template->user_id !== auth()->id()) {
        abort(403);
    }

    return view('templates.edit', compact('template'));
}

public function update(Request $r, Template $template)
{
    if ($template->user_id !== auth()->id()) {
        abort(403);
    }

    $data = [
        'name' => $r->name,
        'body' => $r->body,
    ];

    if ($r->hasFile('cv')) {
    $originalName = $r->file('cv')->getClientOriginalName();
    $filename = time() . '_' . $originalName;

    $file = $r->file('cv')->storeAs('cv', $filename, 'public');
    $data['cv_file'] = $file;
}

    $template->update($data);

    return redirect('/templates')->with('success','Template diupdate');
}

public function destroy(Template $template)
{
    if ($template->user_id !== auth()->id()) {
        abort(403);
    }

    $template->delete();

    return redirect('/templates')->with('success','Template dihapus');
}



}