@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Dashboard')

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Dashboard</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{route('frontend.user.account')}}" class="btn-1 shadow1 style3 bgscheme">Profile</a>
            <a href="{{route('frontend.notifications.index')}}" class="btn-1 shadow1 style3 bgscheme">Notifications</a>
            <a href="{{route('frontend.messages.index')}}" class="btn-1 shadow1 style3 bgscheme">Messages</a>
        </div>
    </div>
</main>
@endsection
