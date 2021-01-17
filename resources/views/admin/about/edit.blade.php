@extends('layouts.dashboard_app')

@section('about')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <a class="breadcrumb-item" href="{{ route('about.index') }}">about</a>
        <span class="breadcrumb-item active">{{ $about_info->about_name }}</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>about edit page</h5>
            <p>This is a dynamic about edit page</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card" style="">
                    <card class="card-header">
                        about edit
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

                        <form class="" action="{{ route('about.update',$about_info->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label>about name</label>
                                <input type="text" name="about_name" class="form-control" value="{{ $about_info->about_name }}">
                            </div>
                            <div class="form-group">
                                <label>about long description</label>
                                <textarea class="form-control" name="about_long_description" row="4">{{ $about_info->about_long_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>banner photo</label>
                                <input type="file" name="product_photo" class="form-control" value="{{ $about_info->about_photo }}">
                            </div>
                            <button type="submit" class="btn btn-primary">edit about</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection