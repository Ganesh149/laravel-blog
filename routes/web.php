<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Exists;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

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
    // return Post::find("my-third-post"); You can find post from slug from anywhere now.
    // $posts = Post::all();
    // dd($posts);
    // dd($posts[2]->getContents());
    // dd($files);
    // $posts = [];
    // foreach ($files as $file) {
    //     $doc = YamlFrontMatter::parseFile($file);
    //     $posts[] = new Post($doc->title, $doc->excerpt, $doc->date, $doc->slug, $doc->body());
    // }
    // dd($posts);
    // More cleaner approach::: Using array_map()...

    return view('posts', ['posts' => Post::all()]);
    // dd($doc->excerpt);
});

Route::get('posts/{post}', function ($slug) {
    // Find a post by a slug and pass it to the view. The slug here actually was the file name.
    return view('post', ['post' => Post::find($slug)]);
})->where('post', '[A-z_-]+');
