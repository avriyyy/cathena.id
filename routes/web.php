<?php

use App\Jobs\SendWaitlistEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('coming-soon');
});

Route::post('/notify', function (Request $request) {
    $data = $request->validate([
        'email' => 'required|email:filter|max:255',
    ], [
        'email.required' => 'Isi alamat email dulu.',
        'email.email' => 'Alamat email tidak valid.',
    ]);

    $existing = DB::table('notify_subscriptions')->where('email', $data['email'])->first();

    if ($existing && $existing->notified_at) {
        return redirect('/')->with('already', true);
    }

    if (! $existing) {
        DB::table('notify_subscriptions')->insert([
            'email' => $data['email'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    SendWaitlistEmail::dispatch($data['email']);

    return redirect('/')->with('notified', true);
})->middleware('throttle:10,1')->name('notify.store');
