@extends('layouts.layout')

@section('content')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @include('posts.post-card',["postCard" =>$postCard])

    @foreach ($normalPosts->chunk(2) as $chunkPosts)    
        <div class="lg:grid lg:grid-cols-2">
            @foreach ($chunkPosts as $post)
                @include('posts.post-card2',["postCard"=>$post])
            @endforeach
        </div>
    @endforeach

    </main>

    {{-- <h1 class="text-center">Posts</h1>
    @foreach ($posts as $post)
        <div class="container">
            <div class="mt-2">
                <h3>
                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                </h3>
            </div>

            <p class="mt-5">
                Posted By <a href="/authors/{{ $post->author->username }} "> {{ $post->author->name }} </a> in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
            </p>

            <div class="pt-3 mb-5 text-justify">
                {{ $post->excerpt }}
            </div>
        </div>
    @endforeach --}}

@endsection