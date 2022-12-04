{{-- 
    <!doctype html>
    <head>
        <link rel="stylesheet" href="/app.css">
    </head>
    <title>My First Post </title>
    <body>
        <article>
            <h1>{!!$post->title!!}</h1>
            {!! $post->body !!}
        </article>
        <a href="/">Go back </a>
    </body> 

    @extends('layout')
    @section('content')
        <article>
            <h1>{!!$post->title!!}</h1>
            {!! $post->body !!}
        </article>
        <a href="/">Go back </a>
    @endsection
--}}
{{-- <x-layout content="Hello World"></x-layout> --}}
<x-layout>
    <article>
        <h1>{!!$post->title!!}</h1>
        <p>By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        {!!$post->body!!}
    </article>
    <a href="/">Go Back</a>
</x-layout>