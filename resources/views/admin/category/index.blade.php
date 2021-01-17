

@extends('layouts.dashboard_app')
@section('title')
Category
@endsection

@section('dashboard_content')
@section('category')
active
@endsection
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
        <span class="breadcrumb-item active">Category</span>
    </nav>
<div class="sl-pagebody">
<br>
<div class="">   
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header">
                    <div class="card-body">
                        @if (session('delete_status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete_status') }}
                        </div>
                        @endif
                        @if (session('edit_status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('edit_status') }}
                        </div>
                        @endif
                        <form action="{{ url('mark/delete') }}" method="post">
                            @csrf
                            <table class="table" id="category_table">
                                    <h3>Category</h3>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Mark</th>
                                            <th scope="col">SL no</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Category Description</th>
                                            <th scope="col">Created by</th>
                                            <th scope="col">Category Photo</th>
                                            <th scope="col">Created at</th>
                                            <th scope="col">Updated at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                        <tr>
                                            <td class="btn btn-danger">
                                                <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                                            </td>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_description }}</td>
                                            <td>{{ App\User::find($category->user_id)->name }}</td>
                                            <td>
                                                <img width="30" src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}" alt="Not found">
                                            </td>
                                            <td>
                                                @isset($category->created_at)
                                                    {{ $category->created_at->diffForHumans() }}
                                                @endisset
                                            </td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td style="width:110px; height:30px;">
                                                <a href="{{ url('edit/category') }}/{{ $category->id }}" type="button" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ url('delete/category') }}/{{ $category->id }}" type="button" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="50" class="text-center text-danger">no category available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                            </table>
                            <button type="submit" class="btn btn-danger btn-sm">mark delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-header">
                <h3>Add Category</h3>
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
                    <form action="{{ url('add/category/post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input  type="text" name="category_name" placeholder="enter category name" class="form-control" value="{{ old('category_name') }}">
                            {{-- @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                            <label>Category Description</label>
                            <br>
                            <textarea name="category_description" id="" cols="30" rows="5">{{ old('category_description') }}</textarea>
                            {{-- @error('category_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                        </div>
                        <div>
                        <label>Category Photo</label>
                        <input  style="width:92%;padding: 0.50rem 0.65rem;margin-left:20px;" type="file" name="category_photo" class="form-control" onchange="readURL(this);">
                        <img class="hidden" id="tenant_photo_viewer" src="#" alt="" />
                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(195);
                                };
                                $('#tenant_photo_viewer').removeClass('hidden');
                                reader.readAsDataURL(input.files[0]);
                                }
                            }
                            </script>
                            </div>
                            <br>


                        <button type="submit" class="btn btn-primary">Add Category</button>
                      </form>
                </div>
            </div>
            </div>
            <br>
            <div class="col-md-8">
                <div class="card-header">
                    <div class="card-body">
                        @if (session('restore_status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('restore_status') }}
                        </div>
                        @endif
                        @if (session('forcedelete_status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('forcedelete_status') }}
                        </div>
                        @endif
                        <table class="table">
                            <h3>Deleted Category</h3>
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">SL no</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Deleted at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($deleted_categories as $deleted_category)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $deleted_category->category_name }}</td>
                                <td>{{ $deleted_category->category_description }}</td>
                                <td>{{ App\User::find($deleted_category->user_id)->name }}</td>
                                <td>{{ $deleted_category->created_at }}</td>
                                <td>{{ $deleted_category->deleted_at }}</td>
                                <td>
                                    <a href="{{ url('restore/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-sm btn-success">Restore</a>
                                    <a href="{{ url('force/delete/category') }}/{{ $deleted_category->id }}" type="button" class="btn btn-sm btn-danger">Force delete</a>
                                </td>
                            </tr>
                                @empty
                                    <tr>
                                        <td colspan="50" class="text-center text-info">no deleted category available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
