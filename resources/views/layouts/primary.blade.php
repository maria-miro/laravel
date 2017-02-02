@extends('layouts.two-column')

@section('left-column')
    @include($page)
@endsection

@section('right-column')
    @include('parts.sidebar')
@endsection

@section('bottom_scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="/js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>  
   <script src="/js/main.js"></script>
    <script>
        $(function () {
            if (window.BlogSettings.activeMenu) {
                $('ul.nav').find('.' + window.BlogSettings.activeMenu).addClass('current');
            }
        });
    </script>
@endsection

@section('head_scripts')
    <script>
        window.BlogSettings = {
            "activeMenu": "{{ $activeMenu or '' }}"
        };
    </script>
@show



