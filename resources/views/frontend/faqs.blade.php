@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Frequently Asked Questions')

@section('content')
<div id="section-subheader1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="clscheme">Frequently Asked Questions</h3>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>
                    <li class="current"><a href="#">FAQ's</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="container mt-5">
<div class="row">
    <div class="col-md-12">
        <div id="accordion">
            @foreach ($faqs as $key=>$faq)
            <div class="card">
              <div class="card-header" id="heading{{$key}}">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                     {{$faq->question}}
                  </button>
                </h5>
              </div>
              <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                <div class="card-body">
                    {{strip_tags($faq->answer)}}
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</main>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush