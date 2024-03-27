@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . $post->title)

@section('content')
<style>
    #section-blogdetail1 .contents h4 {
        margin-bottom: 10px;
    }
    .product_image {
        width: 100%;
        height: 250px;
        object-fit: contain;
    }
</style>
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">{{$post->title}}</h3>

            </div>
        </div>
    </div>
</div>

<div id="section-blogdetail1">
    <div class="container">
        <div class="row">
            <!-- Contents -->
            <div class="contents col-sm-12 col-md-12 col-lg-8">
                <h2>{{$post->title}}</h2>
                <h4>{{$post->created_at->diffForHumans()}} | Created By: <a href="{{url('profile/'.$post->owner->id)}}">{{$post->owner->first_name}}</a>
                </h4>
                <h4>Source: {{$post->city($post->source_city)}}, {{$post->country($post->source)}} | Destination: {{$post->city($post->destination_city)}}, {{$post->country($post->destination)}}</h4>
                <h4>
                    @if($post->type == 'travel')
                        Weight Available: {{$post->weight_available}} | Carrying Rate: {{$post->carrying_rate}} | Go Date: {{$post->go_date}} | Return Date: {{$post->return_date}}
                    @endif
                    @if($post->type == 'shipping')
                        Shipping Weight Available: {{$post->weight_available}} | Upcoming Shipment Date: {{$post->upcoming_shipping_date}} | Shipping Rate: {{$post->shipping_rate}}
                    @endif
                    @if($post->type == 'request')
                        @php
                        $links = str_replace(array("[","]"),array("",""),$post->product_link);
                        @endphp
                        Reuired Date: {{$post->required_by_date}} <br><br>
                        Product Links: {{$links}}<br>
                        <div class="row mt-3">
                            @foreach($post->images()->get() as $image)
                                <div class="col-md-4">
                                    <img class="product_image" src="{{asset('storage/app/public/'.$image->path)}}">
                                </div>
                            @endforeach
                        </div>
                    @endif    
                </h4>

                <?php echo $post->details;?>
                <!-- Share -->
                <div class="share row">
                    <div class="social-links col-md-12">
                        <a href="https://twitter.com/intent/tweet?url={{url('requests/'.$post->slug)}}&text=" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url('requests/'.$post->slug)}}" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="https://pinterest.com/pin/create/button/?url={{url('requests/'.$post->slug)}}&media=&description=" target="_blank"><i class="fab fa-pinterest fa-lg"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url('requests/'.$post->slug)}}" target="_blank"><i class="fab fa-linkedin fa-lg"></i></a>
                    </div>
                </div>
                <!-- /.Share -->
                <!-- Author -->
                <div class="author">
                    <div class="img-author">
                        <a href="{{url('profile/'.$post->owner->id)}}"><img class="img-fluid" src="{{$post->owner->picture}}" alt="{{$post->owner->first_name}}"></a>
                    </div>
                    <div class="detail">
                        <h3><a href="{{url('profile/'.$post->owner->id)}}">{{$post->owner->first_name}}</a></h3>
                        <?php echo $post->owner->userRatingHtml();?>
                        <p>{{$post->owner->bio}}</p>
                    </div>
                    
                </div>
                <!-- /.Author -->
            </div>
                <!-- /.Contents -->
            <!-- Siderbar -->
            <div class="sidebar col-sm-12 col-md-12 col-lg-4 text-center">
                
                @if(auth()->check() && auth()->user()->id == $post->owner->id)
                <!-- <div class="alert alert-danger"><p>You can not offer or chat on your own post.</p></div> -->
                @elseif($post->alreadyPostOffer())
                <div class="alert alert-danger"><p>You already post an offer.</p></div>
                @else
                {{html()->form('POST',route('frontend.chats.store'))->open()}}
                    @if(auth()->check())
                    <input type="hidden" name="user1" value="{{auth()->user()->id}}">
                    <input type="hidden" name="user2" value="{{$post->owner->id}}">
                    <input type="hidden" name="isAjax" value="false">
                    {{form_submit("Let's have a chat",'btn-1 shadow1 style3 bgscheme')}}
                    @else
                    <a href="{{route('frontend.auth.login')}}" class="btn-1 shadow1 style3 bgscheme">Let's have a chat</a>
                    @endif
                {{html()->form()->close()}}

                {{-- {{html()->form('POST',route('frontend.offer.new'))->open()}} --}}
                    @if(auth()->check())
                    <a href="javascript:;" class="btn-1 shadow1 style3 bgscheme" data-toggle="modal" data-target="#create_offer">Make an Offer</a>
                    @else
                    <a href="{{route('frontend.auth.login')}}" class="btn-1 shadow1 style3 bgscheme">Login to Make an Offer</a>
                    @endif
                {{-- {{html()->form()->close()}} --}}
                @endif
            </div>
            <!-- /.Siderbar -->
        </div>
    </div>
</div>
@endsection
@if(auth()->check())
<div class="modal fade" id="create_offer" tabindex="-1" role="dialog" aria-labelledby="create_offerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- {{html()->form('POST',route('frontend.payment-paypal'))->open()}} -->
            {{html()->form('POST',route('frontend.offers.store'))->open()}}
            <div class="modal-header">
                <h5 class="modal-title" id="create_offerLabel">Make an Offer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="price" class="col-form-label">Offering Price:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" name="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="shipdate" class="col-form-label">Expected Travel/Ship Date:</label>
                    <input type="date" class="form-control" id="inlineFormInputGroup" name="shipdate" min="<?php echo date("Y-m-d")?>">
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Fee:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control" id="inlineFormInputGroup" name="fee" value="100" disabled>
                    </div>
                </div>
                @if($post->type != 'request')
                <div id="product_details">
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::label('product_link[]', 'Product Link', ['class' => 'from-control-label']) }}
                            {{ Form::text('product_link[]', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.posts.product_link')]) }}
                            <small class="text-muted">Product link where you want to purchase</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ Form::label('product_picture', 'Product Picture', ['class' => 'from-control-label']) }}
                            <input name="product_picture[]" type="file">
                            <br>
                            <small class="text-muted">Product Pictures what you want to purchase.(use ctrl+click to multiple pictures)</small>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button id="more_product" type="button" class="btn btn-primary">Add More Product</button>
                </div>
                @endif
                <div class="form-group">
                    <label for="details" class="col-form-label">Details:</label>
                    <textarea class="form-control" id="details" name="details" required></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="request_to" value="{{$post->owner->id}}">
                <input type="hidden" name="offer_by" value="{{auth()->user()->id}}">
                <input type="hidden" name="request_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            {{html()->form()->close()}}
        </div>
    </div>
</div>
@endif
@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
    <script>
        jQuery(document).ready(function($){
            $("#more_product").on('click',function(){
                $("#product_details").append(`
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="product_link[]" class="from-control-label">Product Link</label>
                            <input class="form-control" placeholder="Product Link" name="product_link[]" type="text" id="product_link[]">
                            <small class="text-muted">Product link where you want to purchase</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="product_picture" class="from-control-label">Product Picture</label>
                            <input name="product_picture[]" type="file">
                            <br>
                            <small class="text-muted">Product Pictures what you want to purchase.(use ctrl+click to multiple pictures)</small>

                        </div>
                    </div>
                `);
            });
        })
    </script>
@endpush