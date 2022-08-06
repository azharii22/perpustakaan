<!DOCTYPE html>
<html lang="en">

@section ('head')
    @include('layouts.siswa.head')
@show
@stack('css')
<body>

@section ('header')
    @include('layouts.siswa.header')
@show

  <main id="main">

  @yield ('content')

  </main><!-- End #main -->

@section ('footer')
    @include ('layouts.siswa.footer')
@show

@section ('js')
    @include ('layouts.siswa.js')
@show

@stack('js')
</body>
</html>