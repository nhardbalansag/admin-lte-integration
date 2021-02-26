@extends('layouts.app')
@section('content')
    {{-- nav bar --}}
    @include('includes.navbar')
    {{-- sidebar  --}}
    @include('includes.sidebar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Home Page</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @yield('mainDashboard')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
