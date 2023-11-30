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

        <livewire:login />
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

@endsection
