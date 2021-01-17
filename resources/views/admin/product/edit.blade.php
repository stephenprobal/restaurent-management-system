@extends('layouts.dashboard_app')

@section('product')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <a class="breadcrumb-item" href="{{ route('product.index') }}">product</a>
        <span class="breadcrumb-item active">{{ $product_info->product_name }}</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>product edit page</h5>
            <p>This is a dynamic product edit page</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card" style="">
                    <card class="card-header">
                        product edit
                    </card>
                    <div class="card-body">
                        @if (session('product_status'))
                        <div class="alert alert-success">
                            {{ session('product_status') }}
                        </div>
                        @endif
                        @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        {{-- {{ print_r($errors->all()) }} --}}

                        <form class="" action="{{ route('product.update',$product_info->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>category name</label>
                                <select class="form-control" name="category_id">
                                    <option value="no_value">-select one-</option>
                                    @foreach ($active_categories as $active_category )
                                <option {{ ($active_category->id == $product_info->category_id) ? "selected" : ""}} value="{{ $active_category->id }}">{{ $active_category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>product name</label>
                                <input type="text" name="product_name" class="form-control" value="{{ $product_info->product_name }}">
                            </div>
                            <div class="form-group">
                                <label>product short description</label>
                                <textarea class="form-control" name="product_short_description" row="4">{{ $product_info->product_short_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>product long description</label>
                                <textarea class="form-control" name="product_long_description" row="4">{{ $product_info->product_long_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>product price</label>
                                <input type="text" name="product_price" class="form-control" value="{{ $product_info->product_price }}">
                            </div>
                            <div class="form-group">
                                <label>product quantity</label>
                                <input type="text" name="product_quantity" class="form-control" value="{{ $product_info->product_quantity }}">
                            </div>
                            <div class="form-group">
                                <label>alert quantity</label>
                                <input type="text" name="product_alert_quantity" class="form-control" value="{{ $product_info->product_alert_quantity }}">
                            </div>
                            <div class="form-group">
                                <label>product photo</label>
                                <input type="file" name="product_thumbnail_photo" class="form-control" value="{{ $product_info->product_photo }}">
                            </div>
                            <button type="submit" class="btn btn-primary">edit product</button>
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
