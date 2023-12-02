@extends('layouts.app')

@section('title', 'Home')
@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="">Candidats</a></li>
                    <li class="breadcrumb-item active">Nouveau</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Le reste de votre contenu -->
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Modifier Observateur</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('observer.update', $observer->id) }}" method="POST">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                            <label for="name">Noms</label>
                            <input value="{{ $observer->name }}" name="name" type="text" class="form-control" id="name" placeholder="Enter nom complet">
                        </div>
                        <div class="form-group">
                            <label>Genre</label>
                            <select name="sexe" class="form-control">
                              <option value="Masculin">Masculin</option>
                              <option value="Feminin">Feminin</option>
                              <option value="Autre">Autre</option>
                            </select>
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection
