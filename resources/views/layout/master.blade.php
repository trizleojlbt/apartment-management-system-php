<!DOCTYPE html>
@yield('htmlclass')
<head>
    <title>@yield('title')</title>
</head>

{!! HTML::style('assets/css/font-awesome.min.css') !!}
{!! HTML::style('assets/materialize/css/material-icons.css') !!}
{!! HTML::style('assets/materialize/css/materialize.min.css') !!}
{!! HTML::style('assets/css/style.css') !!}

{!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}
{!! HTML::script('assets/materialize/js/materialize.min.js') !!}
{!! HTML::script('assets/js/script.js') !!}

@yield('bodyclass')

<div class="loader-container">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-teal-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>

<!-- <nav class="teal lighten-2">
  <div class="nav-wrapper container ">
  <a href="{{ url('home') }}" class="brand-logo">Logo</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      @yield('nav-desktop')
    </ul>
  </div>
</nav> -->

<!-- <nav style="background-color:#434A54;"> -->
    <nav style="background-color: #0288D1;">
    <div class="nav-wrapper container">
        <a href="{{ url('home') }}" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
            @yield('nav-desktop')
        </ul>
        <ul id="slide-out" class="side-nav">
            @yield('nav-mobile')
        </ul>
        <a href="javascript:void()" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
</nav>

  @yield('body')

<footer>
    <div class="footer">
        Copyright © 2015 Apartriz INC. All Rights Reserved.
        <p><a href="javascript:void()">Terms of Service</a>  |  <a href="javascript:void()">Privacy Policy</a>  |  <a href="javascript:void()">Blog</a></p>
        <p>Logo here</p>
    </div>
</footer>

<script type="text/javascript">
    $(document).ready(function(){
        $('.preloader-wrapper').addClass('stop');
        $('.loader-container').addClass('stop');
        $(".parallax").parallax();
        $(".parallax-content-title p").fadeIn();
        $(".button-collapse").sideNav();
        $("select").material_select();
        $('.tooltipped').tooltip();
        @yield('callback')

    });

    @yield('script')
</script>
</body>
</html>