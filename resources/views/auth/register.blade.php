@extends('layouts.auth_app')
<title>{{ env('APP_NAME') }} | Register</title>
@section('auth_content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">
        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">{{ env('APP_NAME') }}<span class="tx-info tx-normal"></span></div>
            <div class="tx-center mg-b-60">A Dynamic Restaurent Management System </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your name" name="name">
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your useremail" name="email">
                            </div>
                            <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter your password" name="password">
                            </div>
                            <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter your password again" name="password_confirmation" required autocomplete="new-password">
                            <br>
                            <button type="submit" class="btn btn-info btn-block">{{ __('Register') }}</button>
                        </form>
            <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection













