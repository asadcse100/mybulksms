
<!DOCTYPE html>
<html>
  <head>
  @include('layouts.back.meta')
  @include('layouts.back.css')
  @yield('css')
</head>
  <body>
  @include('layouts.back.header')
    <div class="d-flex align-items-stretch">
    @include('layouts.back.sidebar')
      <div class="page-content">
        @yield('content')        
        @include('layouts.back.footer')        
      </div>
    </div>
    @include('layouts.back.js') 
    @yield('js')
  </body>
</html>