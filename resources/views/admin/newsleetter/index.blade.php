@extends('layouts.dashboard_app')
@section('title')
Newsletter
@endsection
@section('dashboard_content')
@section('newsleetter')
active
@endsection


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">

        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <span class="breadcrumb-item active">newsletter</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Newsletter page</h5>
            <p>This is a dynamic newsletter page</p>
        </div>
    </div>

        <div class="row">
            <div class="col-md-9">
                <div class="card" class="">
                    <card class="card-header">
                    </card>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">serial no.</th>
                                    <th scope="col">newsletter name</th>
                                    <th scope="col">newsletter long description</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($newsleetters as $newsleetter)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $newsleetter->newsleetter_name }}</td>
                                    <td>{{ $newsleetter->newsleetter_long_description }}</td>
                                    <td style="width:130px; height:30px;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('newsleetter.edit',$newsleetter->id) }}" type="button" class="btn btn-info btn-sm">edit</a>
                                        </div>
                                        <form method="POST" action="{{ route('newsleetter.destroy',$newsleetter->id) }}" >
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
                            add newsletter
                        </card>
                        <div class="card-body">
                            @if (session('newsleetter_status'))
                            <div class="alert alert-success">
                                {{ session('newsleetter_status') }}
                            </div>
                            @endif
                            @if ($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error )
                                <li>{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif

                                <form class="" action="{{ route('newsleetter.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>newsleetter name</label>
                                        <input type="text" name="newsleetter_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>newsleetter long description</label>
                                        <textarea class="form-control" name="newsleetter_long_description" row="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">add newsleetter</button>
                                </form>
                        </div>
                    </div>
            </div>
        </div>
</div>
@endsection
