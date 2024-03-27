@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Blog</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="section-bloglist1">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <!-- Item -->
            <div class="item ez-animate col-sm-12 col-md-4 animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 0s; opacity: 1;">
                <a href="{{url("blog/".$blog->slug)}}" class="bghoverscheme">
                    <div class="time">
                        <span class="date">{{$blog->day()}} <br> {{$blog->month()}}</span>
                    </div>
                    <img class="img-fluid" src="{{$blog->getImage()}}" alt="{{$blog->name}}">
                    <h3 class="clscheme">{{$blog->name}}</h3>
                    <p>{{$blog->excerpt()}} </p>
                </a>
            </div>
            @endforeach
            <!-- /.Item -->
            <!-- Load More Button -->
            <div class="col-12 text-center lh0 ez-animate animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 0s; opacity: 1;">
                <a href="#" class="btn-1 shadow1 style3 bgscheme">LOAD MORE</a>
            </div>
            <!-- /.Load More Button -->
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush