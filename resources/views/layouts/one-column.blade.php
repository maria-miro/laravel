@extends('layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('content')
<div id="content-wrap">
    <div class="row">
        @if (Session::has('message'))
          <div id="message" class="twelve columns add-bottom">
            {{Session::get('message')}}     
          </div> 
        @endif
   
        <div id="main" class="twelve columns">

            @section('center-column')
            @show     
        </div> <!-- end main -->
    </div> <!-- end row -->
</div><!-- end content-wrap -->
@endsection

@section('footer')
    @include('parts.footer')
@endsection

