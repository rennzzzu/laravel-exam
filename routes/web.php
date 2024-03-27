<?php

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;

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

Route::get('/', function ( Request $request ) {
    
$total_albums_sold_per_artist = DB::table('albums')
    ->select('artists.name', 'albums.sales')
    ->join('artists', 'albums.artist_id', '=', 'artists.id')
    ->get();
$combined_album_sales_per_artist = DB::table('albums')
    ->select('artists.name', DB::raw('SUM(albums.sales) as totalsales'))
    ->join('artists', 'albums.artist_id', '=', 'artists.id')
    ->groupBy('artists.name')
    ->get();
$top_one =                          DB::table('albums')
    ->select('artists.name', DB::raw('SUM(albums.sales) as totalsales'))
    ->join('artists', 'albums.artist_id', '=', 'artists.id')
    ->groupBy('artists.name')
    ->orderBy(DB::raw('SUM(albums.sales)'), 'desc')
    ->limit(1)
    ->get();

$search_artist = DB::table('albums')
    ->select('albums.name')
    ->join('artists', 'albums.artist_id', '=', 'artists.id')
    ->where('artists.name', '=', $request->artist)
    ->get();

    return view('index',[
        'total_albums_sold_per_artist' => $total_albums_sold_per_artist,
        'combined_album_sales_per_artist' => $combined_album_sales_per_artist,
        'top_one' => $top_one,
        'search_artist' => $search_artist
    ]);
});

// Artist
Route::get('/artist', [ArtistController::class, 'index']);

Route::get('/artist/{artist}/edit', [ArtistController::class, 'edit']);

Route::put('/artist/{artist}', [ArtistController::class, 'update']);

Route::delete('/artist/{artist}', [ArtistController::class, 'destroy']);

Route::get('/artist/{artist}', [ArtistController::class, 'show']);

// Album
Route::get('/album', [AlbumController::class, 'index']);

Route::get('/album/{album}/edit', [AlbumController::class, 'edit']);

Route::put('/album/{album}', [AlbumController::class, 'update']);

Route::delete('/album/{album}', [AlbumController::class, 'destroy']);

Route::get('/album/{album}', [AlbumController::class, 'show']);


// Users
Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);



