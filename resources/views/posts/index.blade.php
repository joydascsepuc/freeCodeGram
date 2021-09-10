@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-md-6 offset-3">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="/storage/{{ $post->image; }}" alt="postImage" class="w-100">
                    </a>
                </div>
            </div>
            <div class="row pt-2 pb-4">
                <div class="col-md-6 offset-3">
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                {{ $post->user->username }}
                            </a>
                        </span>&nbsp;
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links(); }}
            </div>
        </div>
    </div>
@endsection