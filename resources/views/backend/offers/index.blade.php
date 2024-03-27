@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . 'Offers')

@section('breadcrumb-links')
@include('backend.offers.includes.breadcrumb-links')
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
                    <table id="offers-table" class="table" data-ajax_url="{{ route("admin.offers.get") }}">
                        <thead>
                            <tr>
                                <th>Title</th>    
                                <th>Request To</th>
                                <th>Offer By</th>
                                <th>Price</th>
                                <th>Fee</th>
                                <th>Created at</th>
                                <!-- <th>Actions</th> -->
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
        FTX.Offers.list.init();
    });
</script>
@endsection