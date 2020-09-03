<?php

use Illuminate\Support\Facades\Route;


use App\Photo;
use App\Staff;
use App\Product;


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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function() {

    $staff = Staff::findOrFail(1);

    $staff->photos()->create(['path'=>'example.jpeg']);

});



Route::get('/read', function() {

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){

        return $photo->path;

    }


});



Route::get('/update', function() {

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->where('id', 2)->first();

    $photo->path = 'updated.jpeg';

    $photo->save();


});




Route::get('/delete', function() {

    $staff = Staff::findOrFail(1);

    $staff->photos()->where('id', 2)->delete();


});