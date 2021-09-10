@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="/storage/{{ $post->image; }}" alt="postImage" class="w-100">
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="/storage/{{ $post->user->profile->image }}" 
                                 alt="" 
                                 class="w-100 rounded-circle mr-4" 
                                 style="max-width: 40px;">
                        </div>
                        <div>
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="font-weight-bold">{{ $post->user->username }}</span>
                            </a>
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>
                <hr>
                <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a></span>&nbsp;{{ $post->caption }}</p>
            </div>
        </div>
    </div>
@endsection