<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Hotspot\HotspotController;
use App\Http\Controllers\ODP\ODPController;
use App\Http\Controllers\PPPoE\PPPoEController;
use App\Http\Controllers\Report\MrkReportController;
use App\Http\Controllers\Tiang\TiangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//login::Auth
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.access');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.access');

// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// DASHBOARD REAL TIME
Route::get('/dashboard/cpu', [DashboardController::class, 'cpu'])->name('dashboard.cpu');
Route::get('/dashboard/uptime', [DashboardController::class, 'uptime'])->name('dashboard.uptime');
Route::get('/dashboard/{traffic}', [DashboardController::class, 'traffic'])->name('dashboard.traffic');
Route::get('/dashboard/traffic/report', [DashboardController::class, 'report'])->name('dashboard.report');


//PPoE::API
Route::get('/pppoe/secret', [PPPoEController::class, 'index'])->name('pppoe.secret');
Route::post('/pppoe/secret/add', [PPPoEController::class, 'store'])->name('add.pppoe.secret');
Route::get('/pppoe/secret/edit/{id}', [PPPoEController::class, 'edit'])->name('edit.page.pppoe.secret');
Route::post('/pppoe/secret/disabled', [PPPoEController::class, 'nonaktif'])->name('disabled.page.pppoe.secret');
Route::post('/pppoe/secret/update', [PPPoEController::class, 'update'])->name('update.pppoe.secret');
Route::get('/pppoe/secret/delete/{id}', [PPPoEController::class, 'delete'])->name('delete.pppoe.secret');
//PPoE::API


// Hotspot::API
Route::get('/hotspot/users', [HotspotController::class, 'index'])->name('hotspot.users');
Route::post('/hotspot/users/add', [HotspotController::class, 'store'])->name('add.hotspot.users');
Route::get('/hotspot/users/edit/{id}', [HotspotController::class, 'edit'])->name('edit.page.hotspot.users');
Route::post('/hotspot/users/update', [HotspotController::class, 'update'])->name('update.hotspot.users');
Route::get('/hotspot/users/delete/{id}', [HotspotController::class, 'delete'])->name('delete.hotspot.users');
// Hotspot::API


// Trafic UP/DOWN
Route::get('/up', [MrkReportController::class, 'up'])->name('up');
Route::get('/down', [MrkReportController::class, 'down'])->name('down');
// Trafic UP/DOWN


// REPORT UP/DOWN
Route::get('report-traffic', [MrkReportController::class, 'index'])->name('traffic.index');
Route::get('report-traffic/search', [MrkReportController::class, 'search'])->name('traffic.search');
Route::get('report-up/load', [MrkReportController::class, 'load'])->name('report-up.load');
Route::get('report-up/search', [MrkReportController::class, 'search'])->name('search.report');
// REPORT UP/DOWN



//ODP
Route::get('ODP-location', [ODPController::class, 'index'])->name('ODP.index');
Route::post('ODP-location/add', [ODPController::class, 'store'])->name('add.odp');
Route::get('ODP-location/edit/{id}', [ODPController::class, 'edit'])->name('edit.odp');
Route::post('ODP-location/update', [ODPController::class, 'update'])->name('update.odp');
Route::get('ODP-location/delete/{id}', [ODPController::class, 'delete'])->name('delete.odp');
//ODP


//Tiang
Route::get('tiang-location', [TiangController::class, 'index'])->name('tiang.index');
Route::post('tiang-location/add', [TiangController::class, 'store'])->name('add.tiang');
Route::get('tiang-location/edit/{id}', [TiangController::class, 'edit'])->name('edit.tiang');
Route::post('tiang-location/update', [TiangController::class, 'update'])->name('update.tiang');
Route::get('tiang-location/delete/{id}', [TiangController::class, 'delete'])->name('delete.tiang');
//Tiang
