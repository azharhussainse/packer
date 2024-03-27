@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . 'Tesmtimonials List')

@section('breadcrumb-links')
@include('backend.testmonials.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ 'Testimonials Management' }} <small class="text-muted">{{ 'Testimonials List' }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="testmonials-table" class="table" data-ajax_url="{{ route("admin.testmonials.get") }}">
                        <thead>
                            <tr>
                                <th>Testimonial</th>
                                <th>Author</th>
                                <th>{{ trans('labels.backend.access.faqs.table.createdat') }}</th>
                                <th>{{ trans('labels.general.actions') }}</th>
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
        FTX.Testmonials.list.init();
    });
</script>

@stop