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
    <div class="row">
      <div class="col">
        <h1>Create New Category</h1>
      </div>
    </div>
      <div class="row">
        <div class="col">
          <form action="{{route('admin.categories.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label for="title" class="form-label">Name</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
              @error('name')
                  <div class="alert alert-danger">
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