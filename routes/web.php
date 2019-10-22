<?php

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
use App\Post;
use App\User;
use App\Address;
use App\Course;
use App\Image;
use App\Tag;

Route::get('/', function () {
    return view('welcome');
});

//One to One

Route::get('one_to_one/user/{id}/address',function ($id){

    $address = User::find($id)->address;
    dd($address->address);
});

//inverse relationship.belongs to one
Route::get('belongs_to_one/address/{id}/user',function ($id){


    $user = Address::find($id)->user;
    dd($user->name);
});


//one to many
Route::get('/one_to_many/user/{id}/posts',function ($id){

    $posts = User::find($id)->posts;
    foreach ($posts as $post){
        echo $post->content;
    }

});

//many to many

Route::get('/many_to_many/user/{id}/courses',function ($id){

    $courses = User::find($id)->courses;
    foreach ($courses as $course){
        echo $course->name;
    }
});

Route::get('/many_to_many/course/{id}/users',function ($id){

    $users = Course::find($id)->users;
    foreach ($users as $user){
        echo $user->name;
    }
});

//polimorphic one to one

Route::get('/polimorphic_one_to_one/user/{id}/image',function ($id){

    $image = User::find($id)->image->name;

    dd($image);
});

Route::get('/polimorphic_one_to_one/post/{id}/image',function ($id){

    $image = Post::find($id)->image->name;

    dd($image);
});

//polymorphic one to many
Route::get('/polymorphic_one_to_many/post/{id}/comments',function ($id){

    $comments = Post::find($id)->comments;

    foreach ($comments as $comment){

        echo $comment->comment;
    }
});

Route::get('/polymorphic_one_to_many/image/{id}/comments',function ($id){

    $comments = Image::find($id)->comments;


    foreach ($comments as $comment){

        echo $comment->comment;
    }
});

//polymorphic many to many

Route::get('/polymorphic_many_to_many/image/{id}/tags',function ($id){

    $tags = Image::find($id)->tags;

    foreach ($tags as $tag){
        echo $tag->name;
    }
});

route::get('/polymorphic_many_to_many/tag/{id}/images',function ($id){

    $images = tag::find($id)->images;



    foreach ($images as $image){
        echo $image->name;
    }
});

Route::get('polymorphic_many_to_many/post/{id}/tags',function ($id){

    $tags = Post::find($id)->tags;
    foreach ($tags as $tag){
        echo $tag->name;
    }
});

Route::get('polymorphic_many_to_many/tag/{id}/posts',function ($id){

    $posts = Tag::find($id)->posts;
    foreach ($posts as $post){
        echo $post->title;
    }
});