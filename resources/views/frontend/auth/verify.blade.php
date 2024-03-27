@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<style>
.navbar-1{
    position: relative;
}
.navbar-1 .navbar-nav .nav-item .nav-link {
    color: var(--dark);
}
</style>
<main class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @include('includes.partials.messages')
            {{-- {{dd(\Session::get('inputs'))}} --}}
            {{ html()->form('POST', route('frontend.auth.register.verifycode'))->class('form-signup')->open() }}
                <h4 class="mt-3 mb-3">We sent you a code</h4>
                <p>Enter it below to verify {{\Session::get('inputs')['email']}}</p>

                <div class="form-group">
                    <input type="text" class="form-control" name="verifycode" id="verifycode" required>
                    <label class="form-control-placeholder" for="verifycode">Verification code</label>
                    <small><a href="#">Didn't receive an email?</a></small>
                </div>
                <p  class="text-center">
                    <button type="submit" class="btn-1 shadow1 style3 bgscheme">Signup</button>
                </p>
            {{ html()->form()->close() }}
        </div>
    </div>
</main>
@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif
@endpush
