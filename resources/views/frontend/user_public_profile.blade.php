@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . $user->name)

@section('content')
<style>
.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    left:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
#section-blogdetail1 .contents .author {
    float: none;
}
#section-blogdetail1 .contents .author .img-author {
    float: none;
    vertical-align: top;
}
</style>
<div id="section-subheader1" class="mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">{{$user->name}}</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="container">
    <div class="row">
        <div class="col-md-9">
            <h1><strong>Hi, I'm {{$user->name}}</strong></h1>
            <h5 class="disabled">Joined {{date("M Y",strtotime($user->created_at))}}</h5>
            <p>{{ $user->bio }}</p>
            <?php echo $user->userRatingHtml();?>
        </div>
        <div class="col-md-3">
            <img src="{{ $user->picture }}" class="rounded-circle avatar user-profile-image" style="width:200px;height:200px;" />
        </div>
        <!-- <div class="col-md-12 pt-5">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>@lang('labels.frontend.user.profile.avatar')</th>
                        <td><img src="{{ $user->picture }}" class="rounded-circle avatar user-profile-image" style="width:200px;height:200px;" /></td>
                    </tr>
                    <tr>
                        <th>@lang('labels.frontend.user.profile.name')</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('labels.frontend.user.profile.email')</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ date("m/d/Y",strtotime($user->dob)) }}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ $user->country }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{ $user->bio }}</td>
                    </tr>
                    <tr>
                        <th>Member Since</th>
                        <td>{{ timezone()->convertToLocal($user->created_at) }} ({{ $user->created_at->diffForHumans() }})</td>
                    </tr>
                    
                </table>
            </div>
        </div> -->
    </div>
    @php
    $requested_items = $user->posts()->where('type','request')->get();
    $upcoming_trips = $user->posts()->where('type','travel')->get();
    @endphp
    <div class="tabbable-responsive">
        <div class="tabbable">
            <ul class="nav nav-tabs border-0 bgscheme" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="requests-tab" data-toggle="tab" href="#requests" role="tab" aria-controls="requests" aria-selected="true">{{$requested_items->count()}} Requested Items</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">{{$user->reviews()->count()}} Reviews</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="travel-tab" data-toggle="tab" href="#travel" role="tab" aria-controls="travel" aria-selected="false">{{$upcoming_trips->count()}} Upcoming Trips</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="requests" role="tabpanel" aria-labelledby="requests-tab">
            
            <div>
            @foreach($requested_items as $ri)
                <a class="p-2 bg-whote border d-block" href="{{route('frontend.requests.show',$ri->slug)}}">
                    <div class="d-flex flex-column w-100">
                        <div class="">
                            <h4>{{$ri->title}}</h4>
                            <h5>{{date("M, d Y",strtotime($ri->required_by_date))}}</h5>
                        </div>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
        <div class="tab-pane fade show" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="col-md-12 p-0 bg-white" id="section-blogdetail1">
                <div class="contents">
                @foreach($user->reviews()->get() as $r)
                    @php
                    $reviewer = App\Models\Auth\User::find($r->user_id);
                    @endphp
                    <div class="author mb-2">
                        <div class="img-author">
                            <a href="{{url('profile/'.$reviewer->id)}}"><img class="img-fluid" src="{{$reviewer->picture}}" alt="{{$reviewer->name}}"></a>
                        </div>
                        <div class="detail">
                            <h3><a href="{{url('profile/'.$reviewer->id)}}">{{$reviewer->name}}</a></h3>
                            <?php echo starsHtml($r->rating);?>
                            <p>{{$r->review}}</p>
                        </div>
                        
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="travel" role="tabpanel" aria-labelledby="travel-tab">
            @php
            
            @endphp
            <div>
            @foreach($upcoming_trips as $ri)
                <a class="p-2 bg-whote border d-block" href="{{route('frontend.requests.show',$ri->slug)}}">
                    <div class="d-flex flex-column w-100">
                        <div class="">
                            <h4>{{$ri->title}}</h4>
                            <h5>{{date("M, d Y",strtotime($ri->go_date))}}</h5>
                        </div>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
    </div>
    
    <div class="clear"></div>
    @auth
    @if(Session::has('bookingConfirmed'))
    <div class="col-md-12 mt-5">
        <h1>Leave a Review</h1>
        <form action="{{url('addreview')}}" method="post">
            @csrf
        <div class="form-group">
            <label for="review">Leave a Review</label>
            <textarea name="review" id="review" cols="30" rows="5" placeholder="Leave a Review" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <input type="hidden" name="logged_in_user_id" value="{{$logged_in_user->id}}">
            <button type="submit" class="btn-1 bgscheme">Submit Review</button>
        </div>
        </form>
    </div>
    @endif
    @endauth
    
</main>
@endsection

@push('after-scripts')

@endpush