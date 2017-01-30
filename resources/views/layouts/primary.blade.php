@extends('layouts.one-column')

@section('center-column')
    @include($page)
@endsection

@section('bottom_scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="/js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>  
   <script src="/js/main.js"></script>
    <script>
        $(function () {
            if (window.BlogSettings.activeMenu) {
                $('ul.navigation').find('.' + window.BlogSettings.activeMenu).addClass('active');
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