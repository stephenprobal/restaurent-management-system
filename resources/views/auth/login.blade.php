@extends('layouts.auth_app')
<title>{{ env('APP_NAME') }} | Login</title>
@section('auth_content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">{{ env('APP_NAME') }}</span></div>
      <div class="tx-center mg-b-60">A Dynamic Restaurent Management System </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
      @endif
<form action="{{ route('login') }}" method="POST">
    @csrf
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter your useremail" name="email">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Enter your password" name="password">
        <br>
        <label class="checkbox">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span>Remember me</span>
        </label>
        <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
      </div><!-- form-group -->
      <button type="submit" class="btn btn-info btn-block">Sign In</button>
    </form>
    {{-- <br>
    <a href="{{ url('login/github') }}" type="button" class="btn btn-secondary btn-block"> <i class="fa fa-github"></i> login with github</a>
    <br> --}}
    <a href="{{ url('login/google') }}" type="button" class="btn btn-info btn-block"> <i class="fa fa-google"></i> login with google</a>
      <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
@endsection
