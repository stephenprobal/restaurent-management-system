
@extends('layouts.dashboard_app')

@section('title')
Home
@endsection

@section('home')
active
@endsection

@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Home</span>
    </nav>

    <div class="sl-pagebody">
        <!-- ########## dashboard pannel start ########## -->
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-2">
                <div class="card pd-20 bg-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <a href="{{ route('addcategory') }}">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">Drinks Menu</h6>
                        </a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                        <div>
                        {{-- <a href="{{ route('addbreakfastproduct') }}"> --}}
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"> Product</h3>
                        </a>
                        </div>
                    </div><!-- -->
                </div><!-- card -->
                   
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-2 mg-t-20 mg-sm-t-0">
                <div class="card pd-20 bg-info">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">Starter Menu</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0 tx-white tx-lato tx-bold">Items</h6>
                    </div><!-- card-body -->
                    <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                        <div>
                            <span class="tx-11 tx-white-6">this week sale</span>
                            <h6 class="tx-white mg-b-0">$3000</h6>
                        </div>
                        <div>
                            <span class="tx-11 tx-white-6">total sale</span>
                            <h6 class="tx-white mg-b-0">$320000</h6>
                        </div>
                    </div><!-- -->
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-2 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-purple">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">Side dish Menu</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0 tx-white tx-lato tx-bold">Items</h6>
                    </div><!-- card-body -->
                    <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                        <div>
                            <span class="tx-11 tx-white-6">this week sale</span>
                            <h6 class="tx-white mg-b-0">$3000</h6>
                        </div>
                        <div>
                            <span class="tx-11 tx-white-6">total sale</span>
                            <h6 class="tx-white mg-b-0">$320000</h6>
                        </div>
                    </div><!-- -->
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-2 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-sl-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">main dish Menu</h3>
                        <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0 tx-white tx-lato tx-bold">Items</h6>
                    </div><!-- card-body -->
                    <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                        <div>
                            <span class="tx-11 tx-white-6">this week sale</span>
                            <h6 class="tx-white mg-b-0">$3000</h6>
                        </div>
                        <div>
                            <span class="tx-11 tx-white-6">total sale</span>
                            <h6 class="tx-white mg-b-0">$320000</h6>
                        </div>
                    </div><!-- -->
                </div><!-- card -->
            </div><!-- col-2 -->
            <div class="col-sm-6 col-xl-2 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-warning">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">Desert</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0 tx-white tx-lato tx-bold">Items</h6>
                    </div><!-- card-body -->
                    <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                        <div>
                            <span class="tx-11 tx-white-6">this week sale</span>
                            <h6 class="tx-white mg-b-0">$3000</h6>
                        </div>
                        <div>
                            <span class="tx-11 tx-white-6">total sale</span>
                            <h6 class="tx-white mg-b-0">$320000</h6>
                        </div>
                    </div><!-- -->
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-2 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-danger">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">Take Away</h6>
                            <a href="" class="tx-white-8 hover-white"><i
                                    class="icon ion-android-more-horizontal"></i></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mg-b-0 tx-white tx-lato tx-bold">Items</h6>
                    </div><!-- card-body -->
                    <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                        <div>
                            <span class="tx-11 tx-white-6">8am - 10am</span>
                            <h6 class="tx-white mg-b-0">10% Discount on all items</h6>
                        </div>
                    </div><!-- -->
                </div><!-- card -->
            </div><!-- col-3 -->
        </div><!-- row -->

        <!-- ########## dashboard pannel end ########## -->
        <br>
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <h6 style="margin-left:20px; ">Total user:{{ $total_users }} <span style="margin-left:50px;"><a
                                    href="{{ url('send/newsletter') }}" class="btn btn-info btn-sm">Send Newsletter to
                                    All Users</a></span></h6>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="" action="{{ url('marked/delete') }}" method="post">
                                @csrf
                                <table class="table" id="home_table">
                                    <thead>
                                        <tr>
                                            <th>Mark></th>
                                            <th>Sl no</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                            <tr>
                                                <td class="btn btn-danger">
                                                    <input type="checkbox" name="user_id[]" value="{{ $user->id }}">
                                                </td>
                                                <td>{{ $users->firstItem()+$loop->index }}</td>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ Str::title($user->name) }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('d/m/y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{ $users ->links() }}
                                    {{ __('You are logged in!') }}
                                </table>
                            @if ($users->count() > 0)
                            <button class="btn btn-sm btn-danger" type="submit">mark deleted</button>
                            @endif
                            <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')

    <script>
        <script>
            $("#checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        </script>
    </script>

    <script>
        $(document).ready(function() {
            $('#home_table').DataTable({
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









