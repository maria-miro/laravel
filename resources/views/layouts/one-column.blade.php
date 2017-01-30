@extends('layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('content')
    <div id="content-wrap">
        @section('center-column')
        @show
    </div>
@endsection

@section('footer')
    @include('parts.footer')
@endsection

