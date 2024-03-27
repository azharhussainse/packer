@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . $page->title)

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">{{$page->title}}</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">{{$page->title}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="container">
<div class="row">
    <div class="col-md-12 p-5">
        {{$page->description}}
    </div>
</div>
</main>
@endsection

@push('after-scripts')

@endpush