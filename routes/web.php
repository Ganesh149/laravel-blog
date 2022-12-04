<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Exists;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\DB;

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
    return view('posts', ['posts' => Post::latest()->get()]);
    // dd($doc->excerpt);
});

Route::get('posts/{post}', function (Post $post) { //Post::where('slug', $post)->firstOrFail();
    // Find a post by a slug and pass it to the view. The slug here actually was the file name.
    return view('post', ['post' => $post]);
}); //->where('post', '[A-z_-]+');
Route::get('categories/{category}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', ['posts' => $author->posts]);
});
