@extends('layouts.backend.app')

@section('main')

<div id="content">
    @include('layouts.backend.top-nav')
    @yield('content')
    @include('layouts.backend.footer')
</div>
@endsection
