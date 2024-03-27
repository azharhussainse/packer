@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <style>
        .post{
            cursor: pointer;
        }
    </style>
    <main role="main" class="container mt-3">
        <div class="row">
            <div id="news-area" class="col-md-4 border-left border-right">
                <div class="row mb-3">
                    <div class="col-md-12 border-bottom">
                        <h4>
                            <span>Messages</span>
                            <a class="float-right text-primary" data-toggle="modal" data-target="#findPeople">
                                <i class="fa fa-envelope"></i>
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
                        @if ($chats->count() < 1)

                        <div class="mt-5 text-center mb-5">
                            <h4>Send a message, get a message</h4>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary rounded" data-toggle="modal" data-target="#findPeople">Start a conversation</button>
                        </div>
                        @else
                        <div class="mt-3 mb-5">
                            @foreach ($chats as $c)
                            <?php
                            if($c->created_by == $user1->id){
                            $cc = $c->receiver;
                            }else{
                                $cc = $c->owner;
                            }
                            ?>
                            <a href="{{route('frontend.chats.show',$c->id)}}" class="border-top pt-2 pb-2 post d-block">
                                <h6 class="dropleft">
                                    <img src="{{$cc->picture}}" alt="{{$cc->first_name}}"
                                        class="rounded-circle" style="width:50px;height:50px;object-fit:cover;">
                                    <strong>{{$cc->first_name}}</strong>
                                    <span class="text-muted">{{"@".$cc->username}}
                                </h6>
                            </a>
                            @endforeach
                        </div>
                        @endif

                    </div>

                </div>

            </div>
            <div class="col-md-6">

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

    @push('after-scripts')
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

@endsection
