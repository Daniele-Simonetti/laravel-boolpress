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
        <h1>Create New Post</h1>
      </div>
    </div>
      <div class="row">
        <div class="col">
          <form action="{{route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-3">
              <select name="category_id" class="form-select">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option @if (old('category_id') == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category_id')
                  <div class="alert alert-danger mt-3">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            @error('tags.*')
              <div class="alert alert-danger mt-3">
                {{ $message }}
              </div>
            @enderror
            <fieldset class="mb-3">
              <legend>Tags</legend>
              @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $tag->name }}
                    </label>
                </div>
              @endforeach
            </fieldset>
            
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
              @error('title')
                  <div class="alert alert-danger">
                      {{ $message }}
                  </div>
              @enderror
              <label for="content" class="form-label">Content</label>
              <textarea class="form-control" id="content" rows="3"
                  name="content">{{ old('content') }}</textarea>
              @error('content')
                  <div class="alert alert-danger">
                      {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="created_at" class="form-label">Created</label>
              <input type="date" class="form-control" id="created_at" name="created_at" value="{{ old('created_at') }}">
              @error('created_at')
                  <div class="alert alert-danger">
                      {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="image">Image</label>
              <input type="file" class="form-control" id="image" name="image">
              @error('image')
                <div class="alert alert-danger mt-3">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <input class="btn btn-primary" type="submit" value="Save">
          </form>
        </div>
      </div>
    </div>
@endsection