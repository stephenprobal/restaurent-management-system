@extends('layouts.dashboard_app')

@section('newsleetter')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <a class="breadcrumb-item" href="{{ route('newsleetter.index') }}">newsleetter</a>
        <span class="breadcrumb-item active">{{ $newsleetter_info->newsleetter_name }}</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>newsletter edit page</h5>
            <p>This is a dynamic newsletter edit page</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card" style="">
                    <card class="card-header">
                        newsletter edit
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

                        <form class="" action="{{ route('newsleetter.update',$newsleetter_info->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label>newsletter name</label>
                                <input type="text" name="newsleetter_name" class="form-control" value="{{ $newsleetter_info->newsleetter_name }}">
                            </div>
                            <div class="form-group">
                                <label>newsletter long description</label>
                                <textarea class="form-control" name="newsleetter_long_description" row="4">{{ $newsleetter_info->newsleetter_long_description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">edit newsletter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection