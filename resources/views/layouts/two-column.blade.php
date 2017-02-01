@extends('layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('content')
<div id="content-wrap">
    <div class="row">

        <div id="main" class="eight columns">

                @if (Session::has('message'))
                <div class="row ">
                    <div id="message">
                        {{Session::get('message')}}     
                    </div> 
                </div> 
                @endif
            @section('left-column')
            @show  
        </div> <!-- end main -->
         <div id="sidebar" class="four columns">
            @section('right-column')
            @show  
        </div> <!-- end sidebar -->
    </div> <!-- end row -->        
</div><!-- end content-wrap -->
@endsection

@section('footer')
    @include('parts.footer')
@endsection
