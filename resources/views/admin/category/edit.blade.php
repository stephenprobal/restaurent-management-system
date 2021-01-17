

@extends('layouts.dashboard_app')

@section('dashboard_content')
@section('category')
active
@endsection
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ url('add/category') }}">Category</a>
    <span class="breadcrumb-item active">Edit Category</span>
    </nav>
<div class="sl-pagebody">
<br>
<div class="container"></div>
    <div class="row">
        <div class="col-md-8"> 

        </div>
            <div class="col-md-4">
                <div class="card-header">
                <h3>Edit Category</h3>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ url('add/category') }}">Add category</a>
                    <span class="breadcrumb-item active">Edit category</span>
                </nav>
                <div class="card-body">
                    @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success_status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success_status') }}
                    </div>
                    @endif
                    <form action="{{ url('edit/category/post') }}" method="post" enctype = "multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input  type="hidden" name="category_id" class="form-control" value="{{ $category_info->id }}">
                            <label>Category Name</label>
                            <input  type="text" name="category_name" placeholder="enter category name" class="form-control" value="{{ $category_info->category_name }}">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label>Category Description</label>
                            <br>
                            <textarea name="category_description" id="" cols="30" rows="5">{{ $category_info->category_description }}</textarea>
                            @error('category_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label>category photo</label>
                            <input type="file" class="form-control" name="category_photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

