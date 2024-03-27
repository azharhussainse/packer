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
            {{ html()->form('POST', route('frontend.auth.register.post'))->class('form-signup')->open() }}
                <h4 class="mt-3 mb-3">You'll need a password</h4>
                <p>Make sure it's 8 characters or more.</p>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="setpassword" required>
                    <label class="form-control-placeholder" for="setpassword">Password</label>
                    <small><a href="#">Reveal password</a></small>
                </div>
                @php
                    $inputs = session()->get('inputs');
                    // dd($inputs);
                @endphp
                @foreach ($inputs as $key=>$input)
                @if($key == "_token")@php continue;@endphp @endif
                <input type="hidden" name="{{$key}}" value="{{$input}}">
                @endforeach
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
