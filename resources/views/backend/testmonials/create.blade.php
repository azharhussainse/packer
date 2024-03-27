@extends('backend.layouts.app')

@section('title', 'Testimonial Managment' . ' | ' . 'Create Testimonial')

@section('breadcrumb-links')
    @include('backend.testmonials.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.testmonials.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.testmonials.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.testmonials.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection