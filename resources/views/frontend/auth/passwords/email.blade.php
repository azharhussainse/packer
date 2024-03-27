@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Forgot Password</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">Forgot Password</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @include('includes.partials.messages')
            {{ html()->form('POST', route('frontend.auth.password.email.post'))->class('form-signin')->open() }}

                <h4 class="mt-3 mb-3">@lang('labels.frontend.passwords.reset_password_box_title')</h4>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group">
                    {{ html()->email('email')
                        ->class('form-control')
                        ->attribute('maxlength', 191)
                        ->required()
                        ->autofocus() }}
                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email')->class('form-control-placeholder') }}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-1 shadow1 style3 bgscheme">Send Password Reset Link</button>
                </div>
            {{ html()->form()->close() }}
        </div>
        <div class="col-md-3"></div>
    </div>
</main>
@endsection
