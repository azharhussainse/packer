@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'My-Offers')

@section('content')

<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">My Offers - Requests - Shippings</h3>
            </div>
        </div>
    </div>
</div>
<div id="section-bloglist1">
    <div class="container">
        <div class="row">
            <div class="container my-3">
                <div class="card">
                    <div class="card-header bgscheme">
                        <!-- START TABS DIV -->
                        <div class="tabbable-responsive">
                            <div class="tabbable">
                                <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="offers-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="offers" aria-selected="true">Travel Space</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="requests-tab" data-toggle="tab" href="#requests" role="tab" aria-controls="requests" aria-selected="false">Requests</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Shipping</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="offers" role="tabpanel" aria-labelledby="offers-tab">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Source</th>
                                        <th>Destination</th>
                                        <th>Weight Available</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($travels as $travel)
                                    <tr>
                                        <td>{{$travel->title}}</td>
                                        <td>{{$travel->country($travel->source)}}</td>
                                        <td>{{$travel->country($travel->destination)}}</td>
                                        <td>{{$travel->weight_available}}</td>
                                        <td>{{$travel->created_at}}</td>
                                        <td>
                                            <a href="{{route('frontend.requests.edit',$travel->id)}}"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="requests" role="tabpanel" aria-labelledby="requests-tab">
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
                                    @foreach ($requests as $request)
                                    @if(!$request->getCompletedOffer())
                                    <tr>
                                        <td>{{$request->title}}</td>
                                        <td>{{$request->country($request->source)}}</td>
                                        <td>{{$request->country($request->destination)}}</td>
                                        <td>{{$request->created_at}}</td>
                                        <td>
                                            <a href="{{route('frontend.requests.edit',$request->id)}}"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
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
                                    @foreach ($shippings as $shipping)
                                    <tr>
                                        <td>{{$shipping->title}}</td>
                                        <td>{{$shipping->country($shipping->source)}}</td>
                                        <td>{{$shipping->country($shipping->destination)}}</td>
                                        <td>{{$shipping->created_at}}</td>
                                        <td>
                                            <a href="{{route('frontend.requests.edit',$shipping->id)}}"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABS DIV -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush