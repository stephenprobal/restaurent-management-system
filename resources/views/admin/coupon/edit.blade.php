@extends('layouts.dashboard_app')

@section('coupon')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <a class="breadcrumb-item" href="{{ url('coupon') }}">coupon</a>
        <span class="breadcrumb-item active">{{ $coupon_info->coupon_name }}</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>coupon edit page</h5>
            <p>This is a dynamic coupon edit page</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card" style="">
                    <card class="card-header">
                        coupon edit
                    </card>
                    <div class="card-body">
                        @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        <form class="" action="{{ route('coupon.update',$coupon_info->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label>coupon name</label>
                                <input type="text" name="coupon_name" class="form-control" value="{{ $coupon_info->coupon_name }}">
                            </div>
                            <div class="form-group">
                                <label>discount_amount</label>
                                <textarea class="form-control" name="discount_amount" row="4">{{ $coupon_info->discount_amount }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>minimum_purchase_amount</label>
                                <textarea class="form-control" name="minimum_purchase_amount" row="4">{{ $coupon_info->minimum_purchase_amount }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>validity_till</label>
                                <textarea class="form-control" name="validity_till" row="4">{{ $coupon_info->validity_till }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">edit coupon</button>
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
