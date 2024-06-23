<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>

<body>
  <div class="app">
    <header class="header">
    
      <nav class="header__nav">
        @auth
          <a href="{{ url('/') }}">Home</a>
          <a href="{{ url('/my_page') }}">My Page</a>
          <form action="{{ url('/logout') }}" method="post" style="display:inline;">
            @csrf
            <button type="submit" class="header__link">Logout</button>
          </form>
        @else
          <a href="{{ url('/') }}">Home</a>
          <a href="{{ url('/register') }}">Register</a>
          <a href="{{ url('/login') }}">Login</a>
        @endauth
      </nav>
    </header>
    <div class="content">
      @yield('content')
    </div>
  </div>
</body>
</html>