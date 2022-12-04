{{-- @extends('layout')
@section('banner')
    <h1>My Blog</h1>
@endsection
@section('content')
    @foreach ($posts as $post)
            ```loop kaa variable haru check gareko matra::```
            ``@dd($loop) 
            <article class="{{$loop->even?'foobuz':''}}"> ``
        <article>
            <h1><a href ="posts/{{$post->slug}}">{{$post->title}}</a></h1>
            {{ $post->excerpt }}
        </article>
    @endforeach
@endsection --}}
<x-layout {{--banner="Hello World" content="Hello There"--}}>
    {{-- <x-slot name="content">Hello </x-slot>
    <x-slot name="banner">World</x-slot> --}}
    @foreach($posts as $post)
    <article>
        <h1><a href="/posts/{{$post->slug}}">{!!$post->title!!}</a></h1>
        <p>By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        {{$post->excerpt}}
    </article>
    @endforeach
</x-layout>