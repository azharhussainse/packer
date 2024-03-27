@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.posts.management'))

@section('breadcrumb-links')
@include('backend.posts.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Requests/Offers List
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="posts-table" class="table" data-ajax_url="{{ route("admin.posts.get") }}">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Sender</th>
                                <th>Receive</th>
                                <th>Offers</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->

    </div>
    <!--card-body-->
</div>
<!--card-->
@endsection

@section('pagescript')
<script>

    FTX.Utils.documentReady(function() {
        FTX.Posts.list.init();
    });
</script>
@endsection