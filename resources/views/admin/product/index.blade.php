
@extends('layouts.dashboard_app')

@section('product')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <span class="breadcrumb-item active">product</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>product page</h5>
            <p>This is a dynamic product page</p>
        </div>
    </div>
    <div class="">
        <div class="row">
            <div class="col-md-9">
                <div class="card" class="">
                    <card class="card-header">
                        list product(active)
                    </card>
                    <div class="card-body">
                        @if (session('delete_status'))
                        <div class="alert alert-danger">
                            {{ session('delete_status') }}
                        </div>
                        @endif
                        @if (session('edit_status'))
                        <div class="alert alert-success">
                            {{ session('edit_status') }}
                        </div>
                        @endif
                        @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </div>
                    @endif
                            <table class="table" id="category_table">
                                <thead>
                                    <tr>
                                        <th scope="col">serial no.</th>
                                        <th scope="col">category_name</th>
                                        <th scope="col">product_name</th>
                                        <th scope="col">product_price</th>
                                        <th scope="col">product_quantity</th>
                                        <th scope="col">product_alert_quantity</th>
                                        <th scope="col">photos</th>
                                        <th scope="col" style="width:110px;">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $product->onetoonerelationwithcategorytable->category_name }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->product_quantity }}</td>
                                        <td>{{ $product->product_alert_quantity }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_thumbnail_photo }}" alt="{{ $product->product_thumbnail_photo }}" style="width:50px;">
                                        </td>
                                        {{-- <td>
                                        @isset($category->updated_at)
                                            {{ $category->updated_at->diffForHumans() }}
                                        @endisset
                                        </td>  --}}
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('product.edit',$product->id) }}" type="button" class="btn btn-info btn-sm">edit</a>
                                            </div>
                                            <form method="POST" action="{{ route('product.destroy',$product->id) }}" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="50" class="text-center text-danger">No data available</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card" style="">
                <card class="card-header">
                    add product
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

                    <form class="" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>category name</label>
                            <select class="form-control" name="category_id">
                                <option value="no_value">-select one-</option>
                                @foreach ($active_categories as $active_category )
                                <option value="{{ $active_category->id }}">{{ $active_category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>product name</label>
                            <input type="text" name="product_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>product short description</label>
                            <textarea id="product_short_description"class="form-control" name="product_short_description" row="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>product long description</label>
                            <textarea class="form-control" name="product_long_description" row="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>product price</label>
                            <input type="text" name="product_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>product quantity</label>
                            <input type="text" name="product_quantity" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>alert quantity</label>
                            <input type="text" name="product_alert_quantity" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>product thumbnail photo</label>
                            <input type="file" name="product_thumbnail_photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>product multiple photo</label>
                            <input type="file" name="product_multiple_photo[]" class="form-control" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">add product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('footer_script')
<script>
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
