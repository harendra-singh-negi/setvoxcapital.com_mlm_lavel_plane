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
    @php
        $rankings = \App\Models\Ranking::where('status',true)->get()
    @endphp

    <div class="rock-ranking-area section-space">
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-xxl-6 col-xl-6 col-lg-8">
                 <div class="section-title-wrapper-four text-center section-title-space">
                 <span class="subtitle-four">{{ $data['title_small'] }}</span>
                    <h2 class="section-title-four"><span class="text-highlight">
                        {{ $data['title_big'] }}
                    </h2>
                 </div>
              </div>
           </div>
           <div class="row gy-30">
                @foreach($rankings as $ranking)
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                        <div class="rock-ranking-badge-item" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/ranking-badge.png') }}">
                            <div class="inner">
                            <div class="icon">
                                <div class="thumb">
                                    <img src="{{ asset($ranking->icon) }}" alt="ranking-badge">
                                </div>
                                <div class="content">
                                    <h3 class="title">{{ $ranking->ranking_name }}</h3>
                                    <p class="description">{{ $ranking->description }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
@endsection
