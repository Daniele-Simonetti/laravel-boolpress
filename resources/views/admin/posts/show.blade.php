@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        {{-- <div class="row">
            <div class="col">
                <h1>
                    {{ $post->title }}
                </h1>
                <h2>Category: {{ $post->category()->first()->name }} </h2>
                <h3>Author: {{ $post->user()->first()->name }} </h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $post->content }}
            </div>
            <div class="col">
                <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
        </div> --}}


        <div class="card mb-3">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
            <div class="card-body">
                <h3 class="card-title">Author: {{ $post->user()->first()->name }} </h3>
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-muted">Last updated <u>{{$post->updated_at}}</u></p>
                @foreach ($post->tags()->get() as $tag)
                    <span class="badge rounded-pill bg-secondary">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
