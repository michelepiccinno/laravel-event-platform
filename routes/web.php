<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\Admin\EventController;
/* ... */

Route::get('/', function () {
    return view('welcome');
});

//esempio: restituisco dei dati in json
//Route::get('/prova', function() {
//    return response()->json([
//        "name" => "Mario",
//        "anno di nascita" => 1980
//    ]);
//});

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
          Route::get('/', function () {
            return view("admin.dashboard");
        })->name('dashboard');


        // Admin Post CRUD
        Route::resource('events',EventController::class);
    });

require __DIR__ . '/auth.php';
