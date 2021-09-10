@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5">
            <img src="/storage/{{ $user->profile->image }}" class="rounded-circle w-100">
        </div>
        <div class="col-md-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline pb-3">
                <div class="d-flex align-items-center">
                    <div class="h4">{{ $user->username }}</div>
                    <follow-button user-id = "{{ $user->id }}" follows = "{{ $follows }}"></follow-button> 
                </div>
                @can('update', $user->profile)
                    <div><a href="/p/create">Add New Post</a></div>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="text-align-center">
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followerCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> Following</div>
            </div>
            <div class="pt-2">
                <strong>{{ $user->profile->title }}</strong>
                <strong></strong>
            </div>
            <div>
                <span>{{ $user->profile->description }}</span>
            </div>
            <div><a href="{{ $user->profile->link }}" class="text-dark font-weight-bold" target="_blank">{{ $user->profile->link }}</a></div>
        </div>
    </div>
    <div class="row p-5">
        @foreach($user->posts as $post)
            <div class="col-md-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image; }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>


</div>
@endsection