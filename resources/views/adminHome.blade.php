<!DOCTYPE html>
<html lang="en">

@section ('head')
    @include ('layouts.admin.head')
@show

<body>

@section ('header')
    @include ('layouts.admin.header')
@show


@section ('sidebar')
    @include ('layouts.admin.sidebar')
@show


  <main id="main" class="main">

@yield ('content')

  </main><!-- End #main -->

 @section ('footer')
    @include ('layouts.admin.footer')
@show


@section ('js')
    @include ('layouts.admin.js')
@show


</body>

</html>