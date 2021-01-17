@extends('layouts.frontend_app')
<!-- header-area end -->
{{-- class="" --}}
<!-- slider-area start -->
@section('frontend_content')
 <div class="slider-area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($active_banners as $active_banner)
                <div class="swiper-slide overlay">
                    <div class="single-slider slide-inner" style = "background-image: url('{{ asset('uploads/banner_photos') }}/{{ $active_banner->banner_photo }}');">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-lg-9 col-12">
                                    <div class="slider-content">
                                        <div class="slider-shape">
                                            <h2 data-swiper-parallax="-500">{{ $active_banner->banner_short_description }}</h2>
                                            <p data-swiper-parallax="-400">{{ $active_banner->banner_long_description }}</p>
                                            <a href="{{ url('banner/details') }}/{{ $active_banner->slug }}" data-swiper-parallax="-300">About Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                </div>

        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- slider-area end -->
<!-- featured-area start -->
@include('frontend.includes.featuredarea')
<!-- featured-area end -->
<!-- start count-down-section -->

<!-- end count-down-section -->
<!-- product-area start -->

<!-- product-area end -->
<!-- product-area start -->
@include('frontend.includes.product_area')
<!-- product-area end -->
<!-- testmonial-area start -->

<!-- testmonial-area end -->
<!-- start social-newsletter-section -->

@endsection
