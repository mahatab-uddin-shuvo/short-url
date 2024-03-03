<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

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
Route::get('/srt/{shortUrl}', [ShortUrlController::class, 'redirect']);


Route::get('/', [ShortUrlController::class, 'create']);
Route::post('/short-url', [ShortUrlController::class, 'store']);

