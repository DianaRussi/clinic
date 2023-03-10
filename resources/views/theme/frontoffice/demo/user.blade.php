@extends('theme.frontoffice.layouts.main')
@section('title', '')
@section('head')
@endsection
@section('nav')
@endsection
@section('content')
<div class="container">
    <div class="row">
        {{-- Menu lateral --}}
        <div class="col s12 m4">
            @include('theme.frontoffice.pages.user.includes.nav')
        </div>
        {{-- Seccion principal --}}
        <div class="col s12 m8">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">@yield('title')</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('foot')
@endsection