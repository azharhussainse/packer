@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'My-Offers')

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">My Offers</h3>
            </div>
        </div>
    </div>
</div>
<div id="section-bloglist1">
    <div class="container">
        <div class="row">
            <table class="table w-100">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->source}}</td>
                        <td>{{$post->destination}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="{{route('frontend.requests.edit',$post->id)}}"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Item -->

            
            
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush