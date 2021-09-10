@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf
        <h1 class="pb-3 text-center">Add New Post</h1>
        <div class="row">
            <div class="col-md-6 offset-3">
                <label for="caption" class="col-form-label">Caption</label>
                <input id="name" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            

            <div class="col-md-6 offset-3">
                <label for="image" class="col-form-label">Image</label>
                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" required>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row p-5">
            <div class="col-4 offset-4">
                <button class="btn btn-primary btn-block">Add Post</button>
            </div>
        </div>
    </form>
</div>
@endsection
