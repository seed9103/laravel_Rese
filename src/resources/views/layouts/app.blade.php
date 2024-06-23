<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css/app.css">
  <title>Rese</title>

  @yield('css')
</head>


<body>
  <div class="app">
    <header class="header">
    <div class="menu">
        <div class="menu-icon">
        <a href="/menu">
          <i class="fas fa-bars"></i>
        </a>
        </div>
      <h1 class="header__heading">Rese</a></h1>
    </div>
      @yield('search-form')
    </header>
    <div class="content">
      @yield('content')
      
    </div>
  </div>
</body>

</html>