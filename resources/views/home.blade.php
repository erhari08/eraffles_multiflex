{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.master')
{{-- Customize layout sections --}}
@section('subtitle', 'Dashboard')
@section('content_header_title', 'Dashboard')
@section('content_header_subtitle', 'Welcome')
{{-- Content body: main page content --}}
@section('content_body')



    <!-- Main Content -->
    <div class="container mt-4">
        
                <div class="text-center mb-3">
                    <img src="{{ asset('/storage/images/PPC_council_image.png') }}" alt="PPC Logo" class="img-fluid mb-2"
                        style="height: 80px;">
                   
                </div>

            
    </div>




    {{-- <p>Code Shotcut, Welcome to this beautiful admin panel.</p> --}}
@stop
{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush
{{-- Push extra scripts --}}
@push('js')
    <script></script>
@endpush
