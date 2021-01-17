@extends('layouts.dashboard_app')

@section('dashboard_content')
@section('banner')
active
@endsection


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <span class="breadcrumb-item active">banner</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>banner page</h5>
            <p>This is a dynamic banner page</p>
        </div>
    </div>

        <div class="row">
            <div class="col-md-9">
                <div class="card" class="">
                    <card class="card-header">
                        list banner(active)
                    </card>
                    <div class="card-body">
                        @if (session('banner_status'))
                        <div class="alert alert-success">
                            {{ session('banner_status') }}
                        </div>
                        @endif
                        <table class="table" id="category_table">
                            <thead>
                                <tr>

                                    <th scope="col">serial no.</th>
                                    <th scope="col">banner name</th>
                                    <th scope="col">banner_short_description</th>
                                    <th scope="col">banner_long_description</th>
                                    <th scope="col">photos</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($banners as $banner)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $banner->banner_name }}</td>
                                    <td>{{ $banner->banner_short_description }}</td>
                                    <td>{{ $banner->banner_long_description }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/banner_photos') }}/{{ $banner->banner_photo }}" alt="{{ $banner->banner_photo }}" style="width:70px;">
                                    </td>
                                    <td style="width:130px; height:30px;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('banner.edit',$banner->id) }}" type="button" class="btn btn-info btn-sm">edit</a>
                                        </div>
                                        <form method="POST" action="{{ route('banner.destroy',$banner->id) }}" >
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
                            add banner
                        </card>
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
                            
                                <form class="" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>banner name</label>
                                        <input type="text" name="banner_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>banner short description</label>
                                        <textarea class="form-control" name="banner_short_description" row="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>banner long description</label>
                                        <textarea class="form-control" name="banner_long_description" row="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>banner photo</label>
                                        <input type="file" name="banner_photo" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">add banner</button>
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