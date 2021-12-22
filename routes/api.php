<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

# Teams
Route::group(['as' => 'team.'], function () {
    Route::get('teams', ['as' => 'catalog', 'uses' => \App\Http\Controllers\Api\Team\CatalogController::class]);
    Route::get('teams/{team}', ['as' => 'show', 'uses' => \App\Http\Controllers\Api\Team\ShowController::class]);
});

# News
Route::group(['as' => 'news.'], function () {
    Route::get('news', ['as' => 'catalog', 'uses' => \App\Http\Controllers\Api\News\CatalogController::class]);
    Route::get('news/{news}', ['as' => 'show', 'uses' => \App\Http\Controllers\Api\News\ShowController::class]);
});

# Country
Route::group(['as' => 'country.'], function () {
    Route::get('countries', ['as' => 'catalog', 'uses' => \App\Http\Controllers\Api\Country\CatalogController::class]);
});

# Contact
Route::group(['as' => 'contact.'], function () {
    Route::get('contacts', ['as' => 'catalog', 'uses' => \App\Http\Controllers\Api\Contact\CatalogController::class]);
});
