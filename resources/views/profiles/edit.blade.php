@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <h1 class="pb-3 text-center">Edit Profile</h1>
        <div class="row">
            <div class="col-md-6 offset-3">
                <label for="title" class="col-form-label">Title</label>
                <input  id="name" 
                        type="text" 
                        val class="form-control @error('title') is-invalid @enderror" 
                        name="title" 
                        value="{{ old('title') ?? $user->profile->title }}" 
                        required 
                        autocomplete="title" 
                        autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 offset-3">
                <label for="description" class="col-form-label">Description</label>
                <input id="name" 
                       type="text" 
                       val class="form-control @error('description') is-invalid @enderror" 
                       name="description" 
                       value="{{ old('description') ?? $user->profile->description }}" 
                       required 
                       autocomplete="description" 
                       autofocus>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 offset-3">
                <label for="link" class="col-form-label">Link</label>
                <input id="name" 
                       type="text" 
                       val class="form-control @error('link') is-invalid @enderror" 
                       name="link" 
                       value="{{ old('link') ?? $user->profile->link }}" 
                       required 
                       autocomplete="link" 
                       autofocus>

                @error('link')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 offset-3">
                <label for="image" class="col-form-label">Profile Image</label>
                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row p-5">
            <div class="col-4 offset-4">
                <button class="btn btn-primary btn-block">Save Profile</button>
            </div>
        </div>
    </form>
</div>
@endsection
