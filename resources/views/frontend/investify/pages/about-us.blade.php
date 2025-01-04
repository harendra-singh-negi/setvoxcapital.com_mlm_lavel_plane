@extends('frontend::pages.index')
@section('title')
    {{ $data['title'] }}
@endsection
@section('meta_keywords')
    {{ $data['meta_keywords'] }}
@endsection
@section('meta_description')
    {{ $data['meta_description'] }}
@endsection

@section('page-content')

    <div class="rock-about-srcion section-space fix">
        <div class="container">
           <div class="row gy-50">
              <div class="col-xxl-6 col-xl-6 col-lg-6">
                 <div class="rock-about-thumb-wrap">
                    <div class="rock-about-thumb">
                       <img src="{{ asset($data['aboutusLeftImg']) }}" alt="about">
                    </div>
                    <div class="card-text">
                       <p>{{ $data['left_img_badge'] }}</p>
                    </div>
                    <div class="shape-one">
                       <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/newsletter-shape-01.png') }}" alt="rock">
                    </div>
                 </div>
              </div>
              <div class="col-xxl-6 col-xl-6 col-lg-6">
                 <div class="rock-about-content">
                    <div class="section-title-wrapper-four ">
                       <span class="subtitle-four">{{ $data['title_small'] }}</span>
                       <h2 class="section-title-four mb-30"><span class="text-highlight">{{ $data['title_big'] }}</span></h2>
                       <p class="description">
                        {!! $data['content'] !!}
                    </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
@endsection
