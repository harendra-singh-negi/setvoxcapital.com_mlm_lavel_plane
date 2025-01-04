@extends('frontend::pages.index')
@section('title')
    {{ $title }}
@endsection
@section('meta_keywords')
    {{ $data['meta_keywords'] }}
@endsection
@section('meta_description')
    {{ $data['meta_description'] }}
@endsection
@section('page-content')

    <!-- page content -->
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
    <!-- page content end -->

    <!-- section  -->
    @if(isset($data->section_id) && $data->section_id)

        @php
            $section = \App\Models\LandingPage::find($data->section_id)
        @endphp

        @include('frontend::home.include.__'.$section->code,['data' => json_decode($section->data, true) ])

    @endif
    <!-- section end-->

@endsection
