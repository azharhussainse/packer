@extends('backend.layouts.app')

@section('title', __('labels.backend.access.posts.management') . ' | ' . __('labels.backend.access.posts.create'))

@section('breadcrumb-links')
    @include('backend.posts.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.posts.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.posts.form')
        @include('backend.components.footer-buttons', ['cancelRoute' => 'admin.posts.index'])
    </div><!--card-->
    {{ Form::close() }}
@endsection