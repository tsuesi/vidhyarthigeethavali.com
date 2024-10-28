@extends('frontend.layouts.app', ['class' => 'bg-white'])

@section('content')
<!--	START BANNER  -->
    <div class="header bg-default py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Welcome to Otrixcommerce.') }}</h1>
                        <a href="{{url('/admin/login')}}">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
