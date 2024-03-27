@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Contact</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="container">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        @include('includes.partials.messages')
        <h4>Contact Us</h4>
        {{ html()->form('POST', route('frontend.contact.send'))->open() }}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.name'))->for('name') }}

                        {{ html()->text('name', optional(auth()->user())->name)
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.name'))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                        {{ html()->email('email', optional(auth()->user())->email)
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.email'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.phone'))->for('phone') }}

                        {{ html()->text('phone')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.phone'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label(__('validation.attributes.frontend.message'))->for('message') }}

                        {{ html()->textarea('message')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.message'))
                            ->attribute('rows', 3)
                            ->required() }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            @if(config('access.captcha.contact'))
                <div class="row">
                    <div class="col">
                        @captcha
                        {{ html()->hidden('captcha_status', 'true') }}
                    </div><!--col-->
                </div><!--row-->
            @endif

            <div class="row">
                <div class="col">
                    <div class="form-group mb-0 clearfix">
                        {{ form_submit(__('labels.frontend.contact.button'),'btn-1 shadow1 style3 bgscheme') }}
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        {{ html()->form()->close() }}
    </div>
    <div class="col-md-3"></div>
</div>
</main>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush