@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1>
                    {{ $post->title }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $post->content }}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-info my-5" href="{{ route('admin.posts.index') }}">Back to All</a>
            </div>
        </div>
    </div>
@endsection