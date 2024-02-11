<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Api\EventController as ApiEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//esempio: restituisco dei dati in json
Route::get('/prova', function() {
   //stampiamo dei dati "manuali"
     //return response()->json([
        //"name" => "Mario",
        //"anno di nascita" => 1980
  // ]);
        //stampiamo un istanza del modello Event (che una collection di tutti gli eventi )
        $events = Event::all();
        return response()->json($events);
});

//spostiamo parte di codice nel controler (attenzione: Api/EventController)
Route::get("/events", [ApiEventController::class, "index"]);
Route::get("/events/{id}", [ApiEventController::class, "show"]);
