<nav class="navbar navbar-expand-lg @guest navbar-light light-dark @endguest @auth navbar-dark bg-dark @endauth">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('guest.index') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
              @guest
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  @if (Route::has('register'))
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endif
              @else
              <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Add Post</a>
                    <a class="btn btn-info" href="{{ route('admin.posts.index') }}">Posts</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                      <input type="submit" class="btn btn-danger" value="Logout">
                    </form>
                @endguest
          </div>
      </div>



  </div>
</nav>