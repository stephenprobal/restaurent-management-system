
@extends('layouts.dashboard_app')

@section('coupon')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <span class="breadcrumb-item active">coupon</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>coupon page</h5>
            <p>This is a dynamic coupon page</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card" class="">
                    <card class="card-header">
                        list coupon(active)
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
                        <form action="{{ url('mark/delete') }}" method="post">
                            @csrf
                            <table class="table" id="category_table">
                                <thead>
                                    <tr>
                                        <th scope="col">serial no.</th>
                                        <th scope="col">coupon name</th>
                                        <th scope="col">created by</th>
                                        <th scope="col">discount amount</th>
                                        <th scope="col">minimum purchase amount</th>
                                        <th scope="col">validity till</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ App\User::find($coupon->added_by)->name }}</td>
                                        <td>{{ $coupon->discount_amount }}%</td>
                                        <td>{{ $coupon->minimum_purchase_amount }}</td>
                                        <td>{{ $coupon->validity_till }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('coupon.edit',$coupon->id) }}" type="button" class="btn btn-info btn-sm">edit</a>
                                            </div>
                                            <form method="POST" action="{{ route('coupon.destroy',$coupon->id) }}" >
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
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-auto">
            <div class="card" style="">
                <card class="card-header">
                    add coupon
                </card>
                <div class="card-body">
                    @if (session('add_status'))
                    <div class="alert alert-success">
                        {{ session('add_status') }}
                    </div>
                    @endif
                    @if ($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form class="" action="{{ route('coupon.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>coupon name</label>
                            <input type="text" name="coupon_name" class="form-control">
                        </div>
                        @csrf
                        <div class="form-group">
                            <label>discount amount</label>
                            <input type="text" name="discount_amount" class="form-control">
                        </div>
                        @csrf
                        <div class="form-group">
                            <label>minimum purchase amount</label>
                            <input type="text" name="minimum_purchase_amount" class="form-control">
                        </div>
                        @csrf
                        <div class="form-group">
                            <label>validity till</label>
                            <input type="date" name="validity_till" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">add coupon</button>
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
        $('#category_table').DataTable();
            ClassicEditor
            .create( document.querySelector( '#product_short_description' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );

    });

</script>
@endsection
@endsection
