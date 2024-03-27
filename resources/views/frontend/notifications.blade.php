@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Request-Offers')

@section('content')
    <style>
        .post{
            cursor: pointer;
        }
    </style>
    <main role="main" class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-2 text-center-mob">
                <div class="sticky-top">
                </div>
            </div>
            <div id="news-area" class="col-md-7 border-left border-right">
                <div class=" mb-3">
                    <div class="col-md-12 border-bottom">
                        <h4>
                            <span>Notifications</span>
                            @if($notifications->count() > 0)
                            <a class="float-right text-primary" href="javascript:;" data-id="all" data-model="notification" data-action="delete" data-route="">
                                Clear All<i class="far fa-bell"></i>
                            </a>
                            @endif
                            <!-- <a href="javascript:;" data-id="all" data-model="notification" data-action="delete" data-route="" class="float-right mark-delete text-primary mr-5"></a> -->
                        </h4>
                    </div>
                    <div class="container mt-2">
                        <div class="mt-3 mb-5">
                            @if($notifications->count() > 0)
                            @foreach ($notifications as $n)
                            <div class="row border pt-2 pb-2 post">
                                <button data-id="{{$n->id}}" data-model="notification" data-action="delete" data-route="" class="btn btn-outline rounded mark-delete">X</button>
                                <div class="col-md-11">
                                    <h6 class="dropleft">
                                        @if ($n->type == 'App\Notifications\CreateOffer')
                                        @php
                                        $offer = $n->data;
                                        $sentBy= App\Models\Auth\User::find($offer['offer_by']);
                                        @endphp
                                        <a href="{{url('/my-orders')}}" class="btn btn-primary rounded float-right">View Offer</a>
                                        You have new Offer: <strong>{{$offer['status']}}</strong> <br>Sent by : <strong>{{$sentBy->name}}</strong>
                                        @endif

                                        @if ($n->type == 'App\Notifications\CreateChat')
                                        @php
                                        $chat = $n->data;
                                        $sentBy= App\Models\Auth\User::find($chat['created_by']);
                                        @endphp
                                        <a href="{{url('chats/'.$chat['chat_id'])}}" class="btn btn-primary rounded float-right">View Chat</a>
                                        You have new message: <strong>{{$chat['message']}}</strong> <br>Sent by : <strong>{{$sentBy->name}}</strong>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No new notifications</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('after-scripts')
<script>
        jQuery(document).ready(function($){
            $(".mark-delete").on('click',function(){
                $this = $(this);
                var id = $(this).data('id');
                $.ajax({
                    url:'<?php echo route('frontend.delete-notification')?>',
                    type:'GET',
                    data:{'id':id},
                    success:function(resp){
                        if(id == 'all'){
                            window.location.reload();
                        }else{
                            $this.parent('.row').remove();
                        }
                    }
                })
            });
        });
    </script>

    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush
