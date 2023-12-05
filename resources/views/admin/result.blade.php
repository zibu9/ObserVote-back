@extends('layouts.app')

@section('title', 'Listes des Candidats')
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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Mes Resultats</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('warning'))
            <div class="alert alert-warning alert-dismissible">
                {{ session('warning') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Les Resultats</h3>

                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Centre de Vote</th>
                          <th>Code Centre</th>
                          <th>Bureau de Vote</th>
                          <th>Votants initial</th>
                          <th>Votants</th>
                          <th>Nos Voix</th>
                          <th>Bulletins restant</th>
                          <th>Observateur</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($results as $result)
                        @php
                            $disableButton = $result->created_at != $result->updated_at;
                        @endphp
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $result->centre }}</td>
                          <td>{{ $result->centreCode }}</td>
                          <td>{{ $result->bureau }}</td>
                          <td>{{ $result->votantInitial }}</td>
                          <td>{{ $result->votant }}</td>
                          <td>{{ $result->nosVoix }}</td>
                          <td>{{ $result->bulletinRestant }}</td>
                          <td>{{ $result->observer->name }}</td>

                          <td class="">
                          </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                            <tr class="bg-success">
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $result->votantInitial }}</td>
                                <td>{{ $result->votant }}</td>
                                <td>{{ $result->nosVoix }}</td>
                                <td>{{ $result->bulletinRestant }}</td>
                                <td>{{ $result->observer->candidat->candidat }}</td>

                                <td class="">
                                </td>
                            </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
        </div>
    </section>
@endsection
