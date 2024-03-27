@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Request-Offers')

@section('content')
<style>
    .row nav {
        margin: 0 auto;
    }
</style>
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Search</h3>
            </div>
            <div class="col-12">
                <form class="form-inline" action="" method="GET">
                    <div class="row m-auto">
                        <div class="col">
                            {{ Form::select('source', $countries, null,['id'=>'source','class' => 'form-control w-100', 'placeholder' => 'Travel From Country']) }}
                            {{ Form::select('source_city', [], null,['id'=>'source_city','class' => 'form-control w-100', 'placeholder' => 'Travel From City']) }}
                        </div>
                        <!--form-group-->
                        <div class="col">
                                {{ Form::select('destination', $countries, null,['id'=>'destination','class' => 'form-control w-100', 'placeholder' => 'Travel To Country']) }}
                                {{ Form::select('destination_city', [], null,['id'=>'destination_city','class' => 'form-control w-100', 'placeholder' => 'Travel To City']) }}
                        </div>
                        <div class="col">
                            {{ Form::select('type', ['request'=>'Request Space','travel'=>'Travel','shipping'=>'offer Shipping'], isset($_GET['type']) ? $_GET['type'] : '',['class' => 'form-control w-100', 'placeholder' => 'Select Type']) }}

                            {{Form::date('date',isset($_GET['date']) ? $_GET['date'] : '',['class'=>'form-control w-100','placeholder'=>'by Date'])}}
                        </div>
                        <div class="col">
                            <input type="hidden" name="search">
                            <button class="btn-1 shadow1 style3 bgscheme mt-3" type="submit" style="height: 38px;line-height: inherit;">Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div id="section-bloglist1">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <!-- Item -->
            <div class="offer-item item ez-animate col-sm-12 col-md-6 animated fadeInUp " data-animation="fadeInUp" style="animation-delay: 0s; opacity: 1;">
                <div class="shadow border p-3 w-100 h-100">
                    <span class="badge badge-success text-capitalize">{{$post->type }}</span>
                    <a href="{{route('frontend.requests.show',$post->slug)}}" class="bghoverscheme">
                        <h3 class="clscheme">{{$post->title}}</h3>
                        <small class="text-muted">{{$post->created_at->diffForHumans()}} | Created By: {{$post->owner->first_name}}
                        Source: {{$post->city($post->source_city)}}, {{$post->country($post->source)}} | Destination: {{$post->city($post->destination_city)}}, {{$post->country($post->destination)}}
                        @if($post->type == 'travel')
                        | Weight Available: {{$post->weight_available}} | Carrying Rate: {{$post->carrying_rate}}
                        @endif
                        @if($post->type == 'shipping')
                        | Shipping Weight Available: {{$post->weight_available}} | Upcoming Shipment Date: {{$post->upcoming_shipping_date}} | Shipping Rate: {{$post->shipping_rate}}
                        @endif    
                        </small>
                        <p>{{$post->excerpt()}} </p>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- /.Item -->
            </div>
            <div class="row">
            {{ $posts->appends($_GET)->links() }}
            </div>
            {{-- <!-- Load More Button -->
            <div class="col-12 text-center lh0 ez-animate animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 0s; opacity: 1;">
                <a href="#" class="btn-1 shadow1 style3 bgscheme">LOAD MORE</a>
            </div>
            <!-- /.Load More Button --> --}}
        </div>
    </div>
</div>
@endsection

@push('after-scripts')


    <script>
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
        });
    </script>

    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush