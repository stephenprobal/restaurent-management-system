@extends('layouts.frontend_app')
@section('frontend_content')
        <!-- .breadcumb-area start -->
        @forelse ($abouts as $about)
        <div class="breadcumb-area bg-img-4 ptb-100" style = "background-image: url('{{ asset('uploads/about_photos') }}/{{ $about->about_photo }}');"> 
            
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>About Us</h2>
                            <ul>
                                <li><a href="{{ url('') }}">Home</a></li>
                                <li><span>About</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .breadcumb-area end -->
    <!-- about-area start -->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-wrap text-center">
                            <h3>{{ $about->about_name }}</h3>
                            <br><br>
                            <p>{{ $about->about_long_description }}</p>
                        @empty
                            <td>nothing right now.</td>
        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br><br>
    <!-- about-area end -->
    
@endsection