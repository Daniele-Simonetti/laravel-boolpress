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
        <h1>Modify {{$category->name}}</h1>
      </div>
    </div>
      <div class="row">
        <div class="col">
          <form action="{{route('admin.categories.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="{{ $category->name }}">
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