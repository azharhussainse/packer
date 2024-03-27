<div class="left-nav-wrapper">
    <ul class="left-nav">
        <li>
            <a href="./home2.html">
                <img src="./assets/images/logo.png"     alt="ShipEarn">
            </a>
        </li>
        <li><a href="{{ route('frontend.user.dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
        <li><a href=""><i class="far fa-bell"></i> Notifications</a></li>
        <li><a href=""><i class="far fa-envelope"></i> Messages</a></li>
        <li><a href="./profile.html"><i class="fas fa-user"></i> Profile</a></li>
        <li><a href=""><i class="fas fa-users"></i> Groups</a></li>
        <li><a href="#" class="btn btn-primary d-block rounded text-light">Speak</a></li>
    </ul>
    <div class="media p-1 border-top border-bottom align-self-bottom position-absolute w-100" style="bottom: 20px;">
        <div class="media-body">
            <img src="{{ $logged_in_user->picture }}" style="width: 50px;float: left;height: 50px;" class="rounded-circle mr-2">
            <h5 class="card-title m-0 small">{{ $logged_in_user->name }}</h5>
            <small class="text-muted small">@SFaboya</small>
        </div>
        <a class="align-self-center ml-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            <span class="dotted-nav">...</span>
        </a>
        <div class="dropdown-menu">
            {{-- <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings and privacy</a>
            <div class="dropdown-divider"></div>--}}
            <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}">Log out</a>
        </div>
    </div>
</div>