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
                    <li class="breadcrumb-item active">Formulaires</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Listes des Candidats</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
            </div>
            <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Nom
                        </th>
                        <th style="width: 20%">
                            Candidat
                        </th>
                        <th style="width: 20%">
                            Parti
                        </th>
                        <th style="width: 8%" class="text-center">
                            Type
                        </th>
                        <th style="width: 30%">
                        </th>
                    </tr>

                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($candidats as $candidat)
                    <tr>
                        <td>
                            #{{ $i }}
                        </td>
                        <td>
                            <a>
                                {!! $candidat->name !!}
                            </a>
                            <br/>
                            <small>
                               {{ $candidat->created_at->format('d-m-Y')}}
                            </small>
                        </td>
                        <td>
                            {!! $candidat->candidat !!}
                        </td>
                        <td>
                            {!! $candidat->parti !!}
                        </td>
                        <td class="project-state">
                            <span class="badge badge-{{ ($candidat->type->id == 1) ? 'success' : 'info' }}">{{ $candidat->type->name }}</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('candidat.edit', $candidat->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Bloquer
                            </a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
