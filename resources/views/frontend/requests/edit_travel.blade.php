@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Create Request-Offer-Shipping')

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">ADD {{strtoupper($post->type)}}</h3>
            </div>
        </div>
    </div>
</div>
<div id="section-bloglist1">
    <div class="container">
        <div class="row">
            {{ Form::model($post,['route' => ['frontend.requests.update',$post], 'class' => 'form-horizontal m-auto', 'role' => 'form', 'method' => 'PATCH', 'files' => true]) }}
                    <div class="col">
                        <div class="col-md-12">
                            @include('includes.partials.messages')
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('title', 'Title', ['class' => 'from-control-label required']) }}

                                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.title'), 'required' => 'required']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <h3>Travel Sector</h3>
                        <p>Travel From</p>
                        <div class="form-group row">
                            <div class="col-md-6">
                                {{ Form::label('source', 'Country', ['class' => 'from-control-label required']) }}
                                {{ Form::select('source', $countries, null,['class' => 'form-control', 'placeholder' => 'Travel From Country']) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('source_city', 'City', ['class' => 'from-control-label required']) }}
                                {{ Form::select('source_city', $scities, null,['class' => 'form-control', 'placeholder' => 'Travel From City']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <p>Travel To</p>
                        <div class="form-group row">
                            <div class="col-md-6">
                                {{ Form::label('destination', 'Country', ['class' => 'from-control-label required']) }}
                                {{ Form::select('destination', $countries, null,['class' => 'form-control', 'placeholder' => 'Travel To Country']) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('destination_city', 'City', ['class' => 'from-control-label required']) }}
                                {{ Form::select('destination_city', $dcities, null,['class' => 'form-control', 'placeholder' => 'Travel To City']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <h4>Dates</h4>
                        <div class="form-group row">
                            <div class="col-md-6">
                                {{ Form::label('go_date', 'Go Date', ['class' => 'from-control-label required']) }}

                                {{ Form::date('go_date', null, ['class' => 'form-control', 'required' => 'required', 'min'=>$post->go_date]) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('return_date', 'Return Date', ['class' => 'from-control-label required']) }}

                                {{ Form::date('return_date', null, ['class' => 'form-control', 'required' => 'required', 'min'=>$post->return_date]) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('weight_available', 'Weight Available', ['class' => 'from-control-label required']) }}
                                {{ Form::text('weight_available', null, ['class' => 'form-control', 'placeholder' => 'Weight Available', 'required' => 'required']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('carrying_rate', 'Carrying Rate', ['class' => 'from-control-label required']) }}
                                {{ Form::text('carrying_rate', null, ['class' => 'form-control', 'placeholder' => 'Carrying Rate', 'required' => 'required']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="allow_location" class="from-control-label">Allow to see my Location</label>
                                {{ Form::checkbox('allow_location', 'yes') }}
                                <input type="hidden" id="lat" name="lat" value="{{$post->lat}}">
                                <input type="hidden" id="lng" name="lng" value="{{$post->lng}}">
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->
                        <div class="form-group row hide d-none">
                            <div class="col-md-12">
                                {{ Form::label('type', trans('validation.attributes.backend.access.posts.type'), ['class' => 'from-control-label required']) }}
                                {{ Form::select('type', ['request'=>'I want space','travel'=>'I have space','shipping'=>'I offer Shipping','particular'=>'I offer Particular'], isset($_GET['type']) ? $_GET['type'] : '',['class' => 'form-control', 'placeholder' => 'Select Type']) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->

                        <div class="form-group row">
                            <div class="col-md-12">
                                {{ Form::label('details', trans('validation.attributes.backend.access.posts.description'), ['class' => 'from-control-label required']) }}
                                {{ Form::textarea('details', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.description')]) }}
                            </div>
                            <!--col-->
                        </div>
                        <!--form-group-->

                        <div class="form-group row">
                            {{form_submit('Update','btn-1 shadow1 bgscheme  style3 m-auto')}}
                        </div>
                    </div>
                    <!--col-->
            {{ Form::close() }}
        </div>
        <div class="row">
            <div class="col-md-12 mb-3 mt-3">
                <h1>Related Travels/Requests</h1>
            </div>
            <?php echo $post->getRelatedServices();?>
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    <script>
        var lat = document.getElementById("lat");
        var lng = document.getElementById("lng");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            lat.value = position.coords.latitude;
            lng.value = position.coords.longitude;
        }

        jQuery(document).ready(function($){
            $("#destination, #source").on('change',function(){
                var country = $(this).val();
                var target_input = $(this).attr('id')+"_city";
                $.ajax({
                    url:'<?php echo route('frontend.cities')?>',
                    type:'GET',
                    data:{'country':country},
                    success:function(resp){
                        var html = '<option value="">Select City</option>';
                        for(const i in resp){
                            console.log(`${i}: ${resp[i]}`);
                            html += '<option value="'+i+'">'+resp[i]+'</option>';
                        }
                        $("#"+target_input).html(html);
                    }
                })
            });

            $('input[name="allow_location"]').on('change',function(){
                if($(this).is(":checked")){
                    getLocation();
                }else{
                    lat.value = "";
                    lng.value = "";
                }
            })


            




        });
    </script>
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush