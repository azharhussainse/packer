@extends('backend.layouts.app')

@section('title', __('labels.backend.access.posts.management') . ' | ' . __('labels.backend.access.posts.edit'))

@section('breadcrumb-links')
    @include('backend.posts.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::model($post, ['route' => ['admin.posts.update', $post], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.posts.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.posts.index', 'id' => $post->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection