@extends('layouts.dashboard_app')
@section('title')
About
@endsection
@section('dashboard_content')
@section('about')
active
@endsection


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <span class="breadcrumb-item active">about</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>About page</h5>
            <p>This is a dynamic about page</p>
        </div>
    </div>

        <div class="row">
            <div class="col-md-9">
                <div class="card" class="">
                    <card class="card-header">
                    </card>
                    <div class="card-body">
                        <table class="table" id="category_table">
                            <thead>
                                <tr>

                                    <th scope="col">serial no.</th>
                                    <th scope="col">about name</th>
                                    <th scope="col">about long description</th>
                                    <th scope="col">photos</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($abouts as $about)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $about->about_name }}</td>
                                    <td>{{ $about->about_long_description }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/about_photos') }}/{{ $about->about_photo }}" alt="{{ $about->about_photo }}" style="width:70px;">
                                    </td>
                                    <td style="width:130px; height:30px;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('about.edit',$about->id) }}" type="button" class="btn btn-info btn-sm">edit</a>
                                        </div>
                                        <form method="POST" action="{{ route('about.destroy',$about->id) }}" >
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
                    <div class="card">
                        <card class="card-header">
                            add about
                        </card>
                        <div class="card-body">
                            @if (session('about_status'))
                            <div class="alert alert-success">
                                {{ session('about_status') }}
                            </div>
                            @endif
                            @if ($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error )
                                <li>{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif

                                <form class="" action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>about name</label>
                                        <input type="text" name="about_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>about long description</label>
                                        <textarea class="form-control" name="about_long_description" row="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>about photo</label>
                                        <input type="file" name="about_photo" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">add about</button>
                                </form>
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