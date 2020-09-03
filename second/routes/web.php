<?php

use Illuminate\Support\Facades\Route;


use App\User;
use App\Post;


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


// Route::get('/about', function() {
//     return "This is the about page";
// });

// Route::get('/contact', function() { 
//     return "This is the contact page";
// });

// Route::get('/index/{name}/{id}', function($name, $id) {
//     return "HI! This is ".$name." with id: ".$id;
// });


// Route::get('/posts/{id}', 'PostsController@index');

// Route::get('/insert', function() {
//     DB::insert('INSERT INTO posts(title, content) VALUES(?, ?)', ['Mew', 'Cat says Meow']);
// });


// Route::get('/read', function() {
    
//     $results = DB::select('SELECT * FROM posts WHERE id=?', [1]);

//     foreach($results as $post) {
//         return $post->title;
//     }

// });


// Route::get('/update', function() {
    
//     $results = DB::update('UPDATE posts SET title="Updated Title" WHERE id=?', [1]);

//     return $results;
// });

// Route::get('/delete', function() {

//     $deleted = DB::delete('DELETE FROM posts WHERE id=?', [1]);

//     return $deleted;
// });


// Route::get('/find', function() {
//     $post = Post::find(3);
//     return $post->title;

//     // foreach($posts as $post) {
//     //     return $post->title;
//     // }
// });



// Route::get('/findwhere', function() {
    
//     $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();

//     return $posts;
// });



// Route::get('findmore', function() {
//     // $posts = Post::findOrFail(1);

//     // return $posts;

//     $posts = Post::where('id', '<', 50)->firstOrFail();

//     return $posts;
// });



// Route::get('/basicinsert', function() {
    
//     $post = new Post;
//     //$post = Post->find(4); for particular record

//     $post->title = "Eloquent is really cool";
//     $post->content = "PHP with Laravel is so cool";

//     $post->save();  //or insert()

// });




// //Connects to Post.php
// Route::get('/create', function() {
//     Post::create(['title'=>'the create method', 'content'=>'Wow I am learning a lot here']);
// });



// Route::get('/update', function() {


//     Post::where('id', 2)->update(['title'=>"New PHP Title", 'content'=>'I love my brother']);


// });



// Route::get('/delete', function() {

//     // //First Method
//     // $post = Post::find(1);
//     // $post->delete();


//     // //Second Method
//     // Post::where('id', 2)->delete();


//     // //Third Method: single delte
//     // Post::destroy(5);


//     //Fourth Method
//     Post::destroy([1,3]);



// });




// Route::get('/softdelete', function() {

//     Post::find(2)->delete();


// });



// Route::get('/showsoftdelete', function() {


//     $post = Post::onlyTrashed()->where('id', 2)->get();

//     return $post;

// });



// Route::get('/restore', function() {

//     Post::withTrashed()->where('id', 2)->restore();

// });



/*
|====================================
| ELOQUENT RELATIONSHIPS
|====================================
*/



Route::get('/user/{id}/post', function($id) {


    $user = User::find($id);

    return $user->post->title;

});



Route::get('/post/{id}/user', function($id) {


    return Post::find($id)->user->name;


});




