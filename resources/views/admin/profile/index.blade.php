@extends('layouts.dashboard_app')
@section('title')
Profile
@endsection
@section('dashboard_content')
@section('profile')
active
@endsection
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
        <span class="breadcrumb-item active">Profile</span>
    </nav>
<div class="sl-pagebody">
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
        </div>
            <div class="col-md-4">
                <div class="card-header">
                <h3>Edit Profile</h3>
                <div class="card-body">
                    @if (session('name_change_status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('name_change_status') }}
                    </div>
                    @endif
                    @if (session('error_status'))
                    <div class="alert alert-info" role="alert">
                        {{ session('error_status') }}
                    </div>
                    @endif
                    @if (session('profile_photo_change_status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('profile_photo_change_status') }}
                    </div>
                    @endif
                    @if (session('password_error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('password_error') }}
                    </div>
                    @endif
                    @if (session('password_changed'))
                    <div class="alert alert-success" role="alert">
                        {{ session('password_changed') }}
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
                    <form action="{{ url('edit/profile/post') }}" method="post">
                        @csrf
                        <div class="form-group">
                        <label>Name</label>
                        <input  type="text" name="name" placeholder="enter your name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Name</button>
                    </form>
                    <br>
                    <form action="{{ url('change/profile/photo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label>Profile Photo</label>
                        <input  type="file" name="profile_photo" class="form-control" onchange="readURL(this);">
                        <img class="hidden" id="tenant_photo_viewer" src="#" alt="your image" />
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
                        <button type="submit" class="btn btn-primary">Change Photo</button>
                    </form>
                </div>
                <div class="card-body">
                    <form action="{{ url('edit/password/post') }}" method="post">
                        @csrf
                        <div class="form-group">
                        <label>old password</label>
                        <input  type="password" name="old_password" placeholder="enter your old password" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>new password</label>
                        <input  type="password" name="password" placeholder="enter your new password" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>confirm password</label>
                        <div>
                            <input type="password" id="myInput" name="password_confirmation" placeholder="enter your new password" class="form-control"><br>
                            <input type="checkbox" onclick="myFunction()">Show Password
                        </div>
                        </div>
                        <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                            x.type = "text";
                            } else {
                            x.type = "password";
                            }
                            }
                            </script>
                        <button type="submit" class="btn btn-primary">change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
