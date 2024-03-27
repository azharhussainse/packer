@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'My-Orders')

@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">My Orders</h3>
            </div>
        </div>
    </div>
</div>

<div id="section-bloglist1">
    <div class="container-fluid">
        <div class="rows">
            <div class="col-md-12">
                @include('includes.partials.messages')
            </div>
            <div class="col-md-12">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Request To</th>
                        <th>Offer By</th>
                        <th>Price</th>
                        <th>Fee</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->post->title}}</td>
                        <td>{{$order->post->country($order->post->source)}}</td>
                        <td>{{$order->post->country($order->post->destination)}}</td>
                        <td>{{$order->requestTo->first_name}}</td>
                        <td>{{$order->offerBy->first_name}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->fee}}</td>
                        <td>{{date("m/d/Y",strtotime($order->created_at))}}</td>
                        <td>{{ucfirst($order->status)}}</td>
                        <td>{{$order->details}}</td>
                        <td>
                            {{html()->form('POST',route('frontend.chats.store'))->open()}}
                                <input type="hidden" name="user1" value="{{$order->request_to}}">
                                <input type="hidden" name="user2" value="{{$order->offer_by}}">
                                <input type="hidden" name="isAjax" value="false">
                                <button class="btn btn-primary" type="submit" title="Let's Chat"><i class="fas fa-comments"></i></button>
                            {{html()->form()->close()}}
                            
                            @if($order->status == 'pending' && auth()->user()->id == $order->request_to)
                                {{html()->form('PUT',route('frontend.offers.update',$order->id))->open()}}
                                    <input type="hidden" name="status" value="payment_pending">
                                    <button class="btn btn-success" type="submit" title="Accept Offer"><i class="fas fa-check"></i></button>
                                {{html()->form()->close()}}
                            @endif

                            @if($order->status == 'pending' && auth()->user()->id == $order->offer_by)
                                <a href="javascript:;" class="btn btn-success"  data-toggle="modal" data-target="#update_offer_{{$order->id}}"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="/offers/{{$order->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger delete-user"><i class="fas fa-trash"></i></button>
                                </form>
                                <div class="modal fade" id="update_offer_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="update_offerLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            
                                            {{ Form::model($order,['route' => ['frontend.offers.update',$order], 'role' => 'form', 'method' => 'PATCH']) }}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="update_offerLabel">Make an Offer</h5>
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
                                                        <input type="number" class="form-control" id="inlineFormInputGroup" name="price" value="{{$order->price}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="col-form-label">Fee:</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                        </div>
                                                        <input type="number" class="form-control" id="inlineFormInputGroup" name="fee" value="{{$order->fee}}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="details" class="col-form-label">Details:</label>
                                                    <textarea class="form-control" id="details" name="details">{{$order->details}}</textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="request_to" value="{{$order->request_to}}">
                                                <input type="hidden" name="offer_by" value="{{$order->offer_by}}">
                                                <input type="hidden" name="request_id" value="{{$order->request_id}}">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                if($order->post->type == 'request'){
                                    $payer = $order->request_to;    
                                }else{
                                    $payer = $order->offer_by;
                                }
                            @endphp
                            @if($order->status == 'payment_pending' && $payer == auth()->user()->id)
                                {{html()->form('POST',route('frontend.payment-paypal'))->open()}}
                                    <input type="hidden" name="status" value="payment_pending">
                                    <input type="hidden" name="price" value="{{$order->price}}">
                                    <input type="hidden" name="fee" value="{{$order->fee}}">
                                    <input type="hidden" name="id" value="{{$order->id}}">
                                    <input type="hidden" name="request_id" value="{{$order->request_id}}">
                                    <button class="btn btn-info" type="submit" title="Make Payment"><i class="fas fa-dollar-sign"></i></button>
                                {{html()->form()->close()}}
                            @endif
                            
                            @if($order->offer_by == auth()->user()->id)
                                @if($order->status == 'completed')
                                <button class="btn btn-secondary text-dark" disabled data-offer="{{$order->id}}" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Mark Complete when you received your package.">Completed</button>
                                @endif
                                @if($order->status == 'approved')
                                <button class="btn btn-primary mark-complete" data-offer="{{$order->id}}" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Mark Complete when you received your package.">Complete</button>
                                @endif
                            @endif
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <!-- Item -->

            
            
        </div>
    </div>
</div>
@endsection





@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        jQuery(document).ready(function($){
           $('.table').DataTable();
            $(document).on('click',".mark-complete",function(){
                var offer_id = $(this).data('offer');
                var conf = confirm("Do you realy want to complete mark this order. Only mark complete when you received your package.");
                if(conf){
                    $.ajax({
                        url:'{{route("frontend.order.complete")}}',
                        type:'post',
                        data:{id:offer_id,"_token": "{{ csrf_token() }}"},
                        success:function(resp){
                            console.log(resp);
                            window.location.href = resp.redirect;
                        }
                    })
                }
            })
        })
    </script>


@endpush