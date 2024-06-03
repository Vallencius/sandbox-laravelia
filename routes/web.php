<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PostHog\PostHog;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

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
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/count', function () {
        $visitorsAndPageViews       = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $totalVisitorsAndPageViews  = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
        $mostVisitedPages           = Analytics::fetchMostVisitedPages(Period::days(7));
        $topReferrers               = Analytics::fetchTopReferrers(Period::days(7));
        $userTypes                  = Analytics::fetchUserTypes(Period::days(7));
        $topBrowsers                = Analytics::fetchTopBrowsers(Period::days(7));

        return view('count', compact('visitorsAndPageViews', 'totalVisitorsAndPageViews', 'mostVisitedPages', 'topReferrers', 'userTypes', 'topBrowsers'));
    });
});
