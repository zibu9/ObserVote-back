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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Resultats</a></li>
                    <li class="breadcrumb-item active">Détails</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

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

@endsection
