<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [ListingController::class,'index']);

// Route::get('/listings/{id}', function ($id) {
//     $listing=Listing::find($id);
//     if($listing){
//         return view('listing',['listing'=>$listing]);
//     }else{
//         abort(404);
//     }
// });
Route::get('/listings/create',[ListingController::class,'create']);

Route::get('/listings/{listing}',[ListingController::class,'show']);



