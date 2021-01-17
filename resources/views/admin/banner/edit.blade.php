@extends('layouts.dashboard_app')

@section('banner')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <a class="breadcrumb-item" href="{{ route('banner.index') }}">banner</a>
        <span class="breadcrumb-item active">{{ $banner_info->banner_name }}</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>banner edit page</h5>
            <p>This is a dynamic banner edit page</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card" style="">
                    <card class="card-header">
                        banner edit
                    </card>
                    <div class="card-body">
                        @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        {{-- {{ print_r($errors->all()) }} --}}

                        <form class="" action="{{ route('banner.update',$banner_info->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label>banner name</label>
                                <input type="text" name="banner_name" class="form-control" value="{{ $banner_info->banner_name }}">
                            </div>
                            <div class="form-group">
                                <label>banner short description</label>
                                <textarea class="form-control" name="banner_short_description" row="4">{{ $banner_info->banner_short_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>banner long description</label>
                                <textarea class="form-control" name="banner_long_description" row="4">{{ $banner_info->banner_long_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>banner photo</label>
                                <input type="file" name="product_photo" class="form-control" value="{{ $banner_info->banner_photo }}">
                            </div>
                            <button type="submit" class="btn btn-primary">edit banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('footer_scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#category_table').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    });
</script>
@endsection
@endsection


