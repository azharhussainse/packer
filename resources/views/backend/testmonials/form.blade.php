<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ 'Testmonial Management' }}
                <small class="text-muted">{{ 'Testimonial Create' }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('author', 'Author', ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('author', null, ['class' => 'form-control', 'placeholder' => 'Author']) }}
                </div>
                <!--col-->
            </div>
            <div class="form-group row">
                {{ Form::label('image', 'Author Image', ['class' => 'col-md-2 from-control-label required']) }}

                @if(!empty($testmonial->image))
                <div class="col-lg-1">
                    <img src="{{ asset('images/'.$testmonial->image) }}" height="80" width="80">
                </div>
                <div class="col-lg-5">
                    {{ Form::file('image', ['id' => 'image']) }}
                </div>
                @else
                <div class="col-lg-5">
                    {{ Form::file('image', ['id' => 'image']) }}
                </div>
                @endif
            </div>
            <div class="form-group row">
                {{ Form::label('testimonial', 'Testimonial', ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('testmonial', null, ['class' => 'form-control', 'placeholder' => 'Testimonial']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            
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
        FTX.Testmonial.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop