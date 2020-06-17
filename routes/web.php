<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'SiteController@index');
Route::get('ticket/status', 'TicketController@view')->name('view-ticket');
Route::post('ticket/status', 'TicketController@show')->name('display-ticket');
Route::resource('ticket', 'TicketController')->except('show');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/agent/ticket/{ticket_id}', 'AgentTicketController@view')->name('ticket-detail');
Route::put('/agent/ticket/{ticket_id}', 'AgentTicketController@response')->name('ticket-response');
