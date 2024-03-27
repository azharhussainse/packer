<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.posts.management') }}
                <small class="text-muted">{{ (isset($post)) ? __('labels.backend.access.posts.edit') : __('labels.backend.access.posts.create') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('title', trans('validation.attributes.backend.access.posts.title'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.title'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('slug', trans('validation.attributes.backend.access.posts.slug'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.slug'), 'disabled' => 'disabled']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('requester_id', trans('validation.attributes.backend.access.posts.sender'), ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::select('requester_id', $users, isset($post) ? $post->requester_id : '',['class' => 'form-control', 'placeholder' => 'Select Sender']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('receiver_id', trans('validation.attributes.backend.access.posts.receiver'), ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::select('receiver_id', $users, isset($post) ? $post->receiver_id : '',['class' => 'form-control', 'placeholder' => 'Select Receiver']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('source', trans('validation.attributes.backend.access.posts.source'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('source', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.source'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('destination', trans('validation.attributes.backend.access.posts.destination'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('destination', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.destination'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('product_link', trans('validation.attributes.backend.access.posts.product_link'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('product_link', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.product_link'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('type', trans('validation.attributes.backend.access.posts.type'), ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-10">
                    {{ Form::select('type', ['request'=>'I want space','travel'=>'I have space','shipping'=>'I offer Shipping','particular'=>'I offer Particular'], isset($post) ? $post->type : '',['class' => 'form-control', 'placeholder' => 'Select Type']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('description', trans('validation.attributes.backend.access.posts.description'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.description')]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->




            <div class="form-group row">
                {{ Form::label('status', trans('validation.attributes.backend.access.posts.status'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    <div class="checkbox d-flex align-items-center">
                        @php
                        $status = isset($post) ? '' : 'checked';
                        @endphp
                        <label class="switch switch-label switch-pill switch-primary mr-2" for="role-1"><input class="switch-input" type="checkbox" name="status" id="role-1" value="1" checked><span class="switch-slider" data-checked="on" data-unchecked="off"></span></label>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--form-group-->
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--card-body-->

@section('pagescript')
<script type="text/javascript">
    FTX.Utils.documentReady(function() {
        FTX.Pages.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop