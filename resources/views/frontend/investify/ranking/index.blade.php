@extends('frontend::layouts.user')
@section('title')
{{ __('All The Badges') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-ranking-badge-area">
                <div class="rock-ranking-badge-grid">
                    @foreach($rankings as $ranking)
                    <div class="rock-ranking-badge-item" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/ranking-badge.png') }}">
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
