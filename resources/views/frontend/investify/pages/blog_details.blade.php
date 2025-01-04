@extends('frontend::pages.index')
@section('title')
    {{ $blog->title }}
@endsection
@section('page-content')
    <section class="rock-postbox-details-area position-relative fix section-space">
        <div class="container">
           <div class="row g-40">
              <div class="col-xxl-8 col-xl-7 col-lg-7">
                 <div class="postbox-wrapper">
                    <div class="postbox-item mb-20">
                        <h5>{{ $blog->title }}</h5>
                        <div class="postbox-thumb">
                            <img src="{{ asset($blog->cover) }}" alt="image not found">
                         </div>
                       <div class="postbox-text">
                            {!! $blog->details !!}
                       </div>
                    </div>
                 </div>
              </div>
              <div class="col-xxl-4 col-xl-5 col-lg-5">
                 <div class="sidebar-wrapper">
                    <div class="sidebar-widget">
                       <h3 class="sidebar-widget-title">{{ $data['sidebar_widget_title'] }}</h3>
                       <div class="sidebar-widget-content">
                          <div class="sidebar-post">
                            @foreach($blogs as $id => $recent)
                             <div class="rc-post-item">
                                <div class="rc-post-thumb">
                                   <a href="{{ route('blog-details',$recent->id) }}"><img
                                      src="{{ asset($recent->cover) }}" alt="image not found">
                                   </a>
                                </div>
                                <div class="rc-post-content">
                                   <h5 class="rc-post-title">
                                      <a href="{{ route('blog-details',$recent->id) }}">{{ $recent->title }}</a>
                                   </h5>
                                   <div class="rc-meta">
                                        {{ Str::limit(strip_tags($recent->details),35)   }}
                                   </div>
                                </div>
                             </div>
                            @endforeach
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
@endsection
