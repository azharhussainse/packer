@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">{{$blog->name}}</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="{{url('blog')}}">Blog</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="section-blogdetail1">
    <div class="container">
        <div class="row">
            <!-- Contents -->
            <div class="contents col-sm-12 col-md-12 col-lg-8">
                <div class="post-thumbnail">
                    <div class="time">
                        <span class="date">{{$blog->day()}} <br> {{$blog->month()}}</span>
                    </div>
                    @if ($blog->featured_image != '')
                    <img src="{{$blog->getImage()}}" class="img-fluid shadow" alt="{{$blog->name}}">
                    @endif

                </div>
                <h2>{{$blog->name}}e</h2>
                <h4>by {{$blog->owner->first_name}}</h4>
                <?php echo $blog->content;?>
                <!-- Share -->
                <div class="share row">
                    {{-- <div class="tags col-md-6">
                        <ul>
                            <li>Tags: </li>
                            <li><a href="#">application,</a> </li>
                            <li><a href="#">software,</a> </li>
                            <li><a href="#">download</a> </li>
                        </ul>
                    </div> --}}
                    <div class="social-links col-md-12">
                        <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#"><i class="fab fa-google-plus fa-lg"></i></a>
                    </div>
                </div>
                <!-- /.Share -->
                <!-- Author -->
                <div class="author">
                    <div class="img-author">
                        <img src="{{$blog->owner->picture}}" alt="{{$blog->owner->first_name}}">
                    </div>
                    <div class="detail">
                        <h3>{{$blog->owner->first_name}}</h3>
                        <p>{{$blog->owner->bio}}</p>
                    </div>
                </div>
                <!-- /.Author -->
            </div>
            <!-- /.Contents -->
            <!-- Siderbar -->
            <div class="sidebar col-sm-12 col-md-12 col-lg-4">
                <!-- Searchbar -->
                <div class="searchbar">
                    <form action="#" method="post">
                        <input type="text" name="search" placeholder="Search here...">
                        <i class="fa fa-search"></i>
                    </form>
                </div>
                <!-- /.Searchbar -->
                <!-- Recent Posts -->
                <div class="recent-posts">
                    <h3>Recent Posts</h3>
                    @foreach ($latest_news as $post)
                    <!-- Item -->
                    <div class="item">
                        <a href="{{url('blog').'/'.$post->slug}}">
                            @if ($post->featured_image != '')
                            <img src="{{$post->getImage()}}" class="img-fluid" alt="{{$post->name}}">
                            @endif
                            <h4>{{$post->name}}</h4>
                            <h5>{{date("d M, Y",strtotime($post->created_at))}}</h5>
                            <p>{{$post->excerpt()}}</p>
                        </a>
                    </div>
                    <!-- /.Item -->
                    @endforeach
                </div>
                <!-- /.Recent Posts -->
                <!-- Tags -->
                {{-- <div class="tags">
                    <h3>Tags</h3>
                    <ul>
                        <li><a href="#">application,</a></li>
                        <li><a href="#">software</a></li>
                    </ul>
                </div> --}}
                <!-- /.Tags -->
            </div>
            <!-- /.Siderbar -->
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush