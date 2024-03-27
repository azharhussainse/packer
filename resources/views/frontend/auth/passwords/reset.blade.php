@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Reset Password</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">Reset Password</a></li>
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
            {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-signin')->open() }}
                {{ html()->hidden('token', $token) }}

                <h4 class="mt-3 mb-3">@lang('labels.frontend.passwords.reset_password_box_title')</h4>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                            {{ html()->label(__('validation.attributes.frontend.email'))->for('email')->class('form-control-placeholder') }}
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.password'))
                                ->required() }}
                            {{ html()->label(__('validation.attributes.frontend.password'))->for('password')->class('form-control-placeholder') }}
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group">

                            {{ html()->password('password_confirmation')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                ->required() }}
                            {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation')->class('form-control-placeholder') }}
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-0 clearfix">
                            <button type="submit" class="btn-1 shadow1 style3 bgscheme">Reset Password</button>
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
            {{ html()->form()->close() }}
        </div>
    </div>
</main>
@endsection
