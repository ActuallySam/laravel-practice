<?php

// use Illuminate\Support\Facades\Route;


use App\User;
use App\Post;
use App\Role;
use App\Country;
use App\Tag;
use App\Taggable;
use App\Video;

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



/*
 |====================================================
 |ELOQUENT RELATIONSHIPS  ---  ONE TO ONE
 |====================================================
*/

Route::get('/user/{id}/post', function($id) {

    $user = User::find($id);

    return $user->post->title;
    
});



Route::get('/post/{id}/user', function($id) {

    $post = Post::find($id);

    return $post->user->name; 

});



/*
 |====================================================
 |ELOQUENT RELATIONSHIPS  ---  MANY TO MANY
 |====================================================
*/

Route::get('/posts', function() {

    $user = User::find(1);

    foreach($user->posts as $post) {

        echo $post->title . "<br/>";

    }

});




Route::get('/user/{id}/role', function($id) {

    $user = User::find($id);

    foreach($user->roles as$role) {

        echo $role->name;

    }

});



//Accessing the intermediate table / pivot
Route::get('/user/pivot', function() {

    $user = User::find(1);

    foreach($user->roles as $role) {

        echo $role->pivot->created_at;

    }

});





/*
 |====================================================
 |ELOQUENT RELATIONSHIPS  ---  HAS MANY THROUGH
 |====================================================
*/

Route::get('/user/country', function() {

    $country = Country::find(4);

    foreach($country->posts as $post) {

        return $post->title;

    }

});





/*
 |=====================================================
 | POLYMORPHIC RELATIONS  
 |=====================================================
*/

Route::get('/user/photos', function() {

    $user = User::find(1);

    foreach ($user->photos as $photo) {

        return $photo->path;

    }

});



Route::get('/post/{id}/photos', function($id) {

    $user = Post::find($id);

    foreach ($user->photos as $photo) {

        echo $photo->path . "<br/>";

    }

});



Route::get('/photo/{id}/post', function($id) {

    $photo = Photo::findOrFail($id);

    return $photo->imagable;
    
});




/*
 |=======================================================
 | POLYMORPHIC RELATIONS - MANY TO MANY
 |=======================================================
*/

Route::get('/post/tag', function() {

    $post = Post::findOrFail(1);

    foreach ($post->tags as $tag) {

        return $tag->name;

    }

});


Route::get('/tag/post', function() {

    $tag = Tag::findOrFail(2);

    foreach ($tag->posts as $post) {

        return $post->title;

    }

});


Route::get('/tag/video', function() {

    $tag = Tag::findOrFail(1);

    foreach ($tag->videos as $video) {

        return $video->name;

    }

});





/*
 |=======================================================
 | FORMS CREATION
 |=======================================================
*/

Route::get('');

