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
<section class="rock-postbox-details-area position-relative fix section-space">
    <div class="container">
       <div class="row g-40">
          <div class="col-xxl-8 col-xl-7 col-lg-7">
             <div class="postbox-wrapper">
                <div class="postbox-item mb-20">
                   <div class="postbox-text">
                      <p>
                        {!! $data->content !!}
                      </p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
