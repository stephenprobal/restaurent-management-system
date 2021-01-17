<!-- featured-area start -->
<div class="featured-area featured-area2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-active2 owl-carousel next-prev-style">
                    @foreach ($active_categories as $active_category)
                        <div class="featured-wrap">
                            <div class="featured-img">
                                <img src="{{ asset('uploads/category_photos') }}/{{ $active_category->category_photo }}" alt="not found">
                                {{-- <div class="featured-content">
                                    <a href="{{ route('shop')/  }}/{{ $active_category->slug }}/category_id:{{ $active_category->id }}">{{ $active_category->category_name }}</a>
                                </div> --}}
                                <div class = "featured-content">
                                    <form method = "get" action="{{ route('shop') }}">
                                        @csrf
                                            <input type="hidden" name="category_id" value = "{{ $active_category->id }}">
                                            <button type = "submit" >{{ $active_category->category_name }}</button>
                                        </form> 
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <!-- featured-area end/--> --}}
