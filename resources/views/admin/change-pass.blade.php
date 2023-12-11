@extends('layouts.app')
@section('title', 'change password')

@section('main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="">Admin</a></li>
                    <li class="breadcrumb-item active">Password</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
            <!-- Le reste de votre contenu -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-warning alert-dismissible">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Modifier mot de Passe</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="{{ route('password.change') }}" method="post">
                            @csrf
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="ancien mot de passe" name="password" required minlength="4">
                                <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="nouveau mot de passe" name="new_password" required minlength="4">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            @error('new_password2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="repeter nouveau mot de passe" name="new_password2" required minlength="4">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                            </div>
                            <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
@endsection
