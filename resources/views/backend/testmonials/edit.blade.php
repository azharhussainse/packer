@extends('backend.layouts.app')

@section('title', 'Testimonial Managment' . ' | ' . 'Edit Testimonial')

@section('breadcrumb-links')
    @include('backend.testmonials.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($testmonial, ['route' => ['admin.testmonials.update', $testmonial], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.testmonials.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.testmonials.index', 'id' => $testmonial->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection