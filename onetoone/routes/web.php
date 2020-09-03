<?php

use Illuminate\Support\Facades\Route;


use App\User;
use App\Address;

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


Route::get('/insert', function() {

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'1703-Buttercup Thane - 400610']);

    $user->address()->save($address);

});



Route::get('/update', function() {

    $address = Address::where('user_id', 1)->first();

    $address->name = 'New Address';

    $address->save();

});



Route::get('/read', function() {

    $user = User::findOrFail(1);

    echo $user->address->name;

});



Route::get('/delete', function() {

    $user = User::findOrFail(1);

    $user->address()->delete(); 
    //If you want to use any method like delete() or save() or anything, you need address method 

});