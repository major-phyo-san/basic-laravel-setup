@extends('layouts.master')

@section('body-content')
    <div class="main-container">
        @include('layouts.sidebar')

        <div class="main-content">
            @include('layouts.header')

            <main class="inner-container">
                @yield('content')
            </main>
        </div>

    </div>
@endsection
