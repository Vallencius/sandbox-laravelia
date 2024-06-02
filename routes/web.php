<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PostHog\PostHog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::domain('{subdomain}.' . env('APP_URL'))->group(function () {
    Route::get('/', function (Request $request, $subdomain) {
        $user = Auth::user() ?? 'guest';
        PostHog::capture([
            'distinctId' => $subdomain . '-' . $request->ip() . '-' . $user,
            'event' => 'visitor-count'
        ]);
    
        return view('welcome');
    });
});