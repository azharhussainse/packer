@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div id="news-area" class="col-md-4 border-left border-right">
                <div class="row mb-3">
                    <div class="col-md-12 border-bottom">
                        <h4>
                            <span>Messages</span>
                            <a class="float-right text-primary" data-toggle="modal" data-target="#findPeople">
                                <i class="far fa-envelope"></i>
                            </a>
                        </h4>
                    </div>
                    <div class="container mt-2">
                        <form class="d-block">
                            <!-- Actual search box -->
                            <div class="form-group has-search mb-3">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input id="searchPeople" type="text" class="form-control rounded searchPeople" placeholder="Search for people" autocomplete="off">
                            </div>
                        </form>
                        <div class="mt-3 mb-5">
                            @foreach ($chats as $c)
                            <?php
                            if($c->created_by == $user->id){
                            $cc = $c->receiver;
                            }else{
                                $cc = $c->owner;
                            }
                            ?>
                            <a href="{{route('frontend.chats.show',$c->id)}}" class="border-top pt-2 pb-2 post d-block @if($c->user2 == $chat->user2)active-chat border-bottom  @endif">
                                <h6 class="dropleft">
                                    <img src="{{$cc->picture}}" alt="{{$cc->first_name}}"
                                        class="rounded-circle" style="width:50px;height:50px;object-fit:cover;">
                                    <strong>{{$cc->first_name}}</strong>
                                    <span class="text-muted">{{"@".$cc->username}}
                                </h6>
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
            <?php
                if($user1->id == $user->id){
                    $ccc = $user2;
                }else{
                    $ccc = $user1;
                }
            ?>
            <div class="col-md-8">
                <div class="row">
                    <div class="container border-bottom">
                        <img src="{{$ccc->picture}}" class="rounded-circle float-left mr-2" style="width:30px;height:30px;object-fit:cover;">
                        <h6 class="m-0">
                            <strong>{{$ccc->first_name}}</strong><br>
                            <span class="text-muted">{{"@".$ccc->username}}</span>
                        </h6>
                    </div>
                    <div id="messages-list" class="container messages">
                        <ul>
                            @foreach ($messages as $m)
                            <li class="@if ($m->created_by == $user1->id) sent @else replies @endif">
                                <a href="{{url('profile/'.$m->owner->id)}}">
                                <img class="avatar" src="{{$m->owner->picture}}" alt="{{$m->first_name}}"></a>
                                <p>
                                @if ($m->type == 'image')
                                    <img class="w-100" src="{{asset('public/images/'.$m->image)}}">
                                    <br>
                                @endif
                                {{$m->message}}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="container">
                        {{ html()->modelForm($logged_in_user, 'POST', route('frontend.messages.store'))->class('form-horizontal row sendMessageForm')->attribute('enctype', 'multipart/form-data')->open() }}
                            <div class="col-md-1 pr-0">
                                {{ html()->file('image')->class('form-control-file d-none post_image')->attribute('data-nopreview','true') }}
                                <button type="button" class="add_message_image btn text-primary"><i class="far fa-image"></i></button>
                            </div>
                            <div class="col-md-10 mt-1 pr-0 pl-0">
                                {{ html()->text('message')
                                    ->class('form-control text-primary border-primary emoji-up rounded')
                                    ->placeholder('Start a new message')
                                    ->required()
                                }}
                            </div>
                            <div class="col-md-1 pl-0">
                                <button type="button" class="sendMessage btn text-primary"><i class="far fa-paper-plane"></i></button>
                            </div>
                            <input type="hidden" name="chat_id" value="{{$chat->id}}">
                            <input type="hidden" name="created_by" value="{{$user1->id}}">
                        {{ html()->closeModelForm() }}
                        <div id="image_msg" class="alert alert-success" style="display:none;">
                            Image will upload when you hit submit.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <div class="modal fade" id="findPeople" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">New Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="d-block">
                        <!-- Actual search box -->
                        <div class="form-group has-search mb-3">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input id="searchPeople2" type="text" class="form-control rounded searchPeople" placeholder="Search for people" autocomplete="off">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>
        $(function() {
            function getMessages(){
                $.ajax({
                    url:'{{route('frontend.messages.index')}}',
                    data:{chat_id:'{{$chat->id}}'},
                    type:'get',
                    success:function(resp){
                        $('#messages-list').html(resp);
                        var d = $('#messages-list');
                        d.scrollTop(d.prop("scrollHeight"));
                    }
                });
            }
            $(".add_message_image").on('click',function(){
                $(".post_image").trigger('click');
            });

            $(".post_image").on('change',function(){
                $("#image_msg").show();
            });

            $(".sendMessage").on('click',function(){
                $(".sendMessageForm").submit();
                $(".sendMessage").prop('disabled',false);
                $('.emojionearea-editor').html('');
                $("#message").val('');
                $("#image_msg").hide();
            })
            $(".sendMessageForm").on('submit',function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                var route = $(this).attr('action');
                $.ajax({
                    url:route,
                    data:new FormData(this),
                    type:'post',
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(){
                        getMessages();
                    }
                });
            });
            var getMessageInterval = setInterval(function(){
                getMessages();
            },5000);

            // var emojiPicker = $(".emoji-up").emojioneArea({
            // pickerPosition: "top"
            // });
            $(".emoji-up").on('keyup',function(event){
                if (event.which === 13)
                {
                    event.preventDefault();
                    //$(".sendMessageForm").submit();
                    //$(".sendMessage").prop('disabled',false);
                    //$('.emojionearea-editor').html('');
                    $("#message").val('');
                    $("#image_msg").hide();
                }
            });

        });
    </script>
    <script>
        $(function() {
            var site_url = '{{url("/")}}';
            var newsArray = []
            console.log(site_url);
            if($('#searchPeople').length > 0){
                $('#searchPeople').autocomplete({
                    source: "{{route('frontend.autocomplete-user')}}",
                    minLength: 1,
                    select: function(event, ui)
                    {
                        console.log(ui.item);

                        <?php if(Auth::check()){ ?>
                        $.ajax({
                            url:'{{route("frontend.chats.store")}}',
                            type:'POST',
                            data:{user1:'{{Auth::user()->id}}',user2:ui.item.id,"_token": "{{ csrf_token() }}"},
                            success:function(resp){
                                window.location.href=site_url+"/chats/"+resp.id;
                            }
                        });
                        <?php }?>

                    }
                });
                $('#searchPeople').data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li>" )
                    .data( "ui-autocomplete-item", item )
                    .append( item.label)
                    .appendTo( ul );
                };
            }
            if($('#searchPeople2').length > 0){
                var path2 = "{{route('frontend.autocomplete-user')}}";
                $('#searchPeople2').autocomplete({
                    source: "{{route('frontend.autocomplete-user')}}",
                    minLength: 1,
                    select: function(event, ui)
                    {
                        console.log(ui.item);

                        <?php if(Auth::check()){ ?>
                        $.ajax({
                            url:'{{route("frontend.chats.store")}}',
                            type:'POST',
                            data:{user1:'{{Auth::user()->id}}',user2:ui.item.id,"_token": "{{ csrf_token() }}"},
                            success:function(resp){
                                window.location.href=site_url+"/chats/"+resp.id;
                            }
                        });
                        <?php }?>

                    }
                });
                $('#searchPeople2').data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li>" )
                    .data( "ui-autocomplete-item", item )
                    .append( item.label)
                    .appendTo( ul );
                };
            }
        });
    </script>
@endpush
