<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PhpParser\Node\Stmt\Static_;

class Post
{
    // use HasFactory;
    public $title;
    public $excerpt;
    public $date;
    public $slug;
    public $body;
    public function __construct($title, $excerpt, $date, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }
    public static function find($slug)
    {
        //$path = resource_path("posts/{$slug}.html");
        //if (!file_exists($path = resource_path("posts/{$slug}.html")))
        // ddd("Path not found"); abort(404);
        // return redirect('/');
        //throw new ModelNotFoundException();
        //$post = cache()->remember("posts.{$slug}", 1200 /* seconds */, function () use ($path) {
        // var_dump("Hey Catch me");
        //return file_get_contents($path);
        // });
        // return $post;

        /* Yo Maile Gareko */
        // return YamlFrontMatter::parseFile(resource_path("posts/{$slug}.html"));
        /* Aba Yo Maile tuotorial herdai Gareko */
        return static::all()->firstWhere('slug', $slug);
    }
    public static function all()
    {
        //$files = File::files(resource_path("posts"));
        // return array_map(function ($file) {
        //     return $file->getContents();
        // }, $files);
        // using array functions
        //return array_map(fn ($file) => $file->getContents(), $files);
        // Using Yaml..

        /* 
            More cleaner approach::: Using array_map()...
            this will reduce the code complexity by removing loops like foreach... 
        */
        $files = File::files(resource_path("posts/"));
        // $posts = array_map(function ($file) {
        //     $doc = YamlFrontMatter::parseFile($file);
        //     return new Post(
        //         $doc->title,
        //         $doc->excerpt,
        //         $doc->date,
        //         $doc->slug,
        //         $doc->body()
        //     );
        // }, $files);

        /* 
            More cleaner approach::: Using collect()...
            laravel's more easier approach:
        */
        $posts = collect($files)
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(
                fn ($doc) => new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->slug,
                    $doc->body()
                )
            );
        return $posts;
    }
}
