@extends('auth.template')

@section('title', 'Login Page')

@section('main')

<div class="login-box">
    <div class="login-logo">
      <a href=""><b>Obser</b>V<b>ote</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email"  value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
                <p class="mb-1">
                    <a href="forgot-password.html">Forgot password ?</a>
                  </p>
                  <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register</a>
                  </p>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

@endsection
