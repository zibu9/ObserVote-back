@extends('layouts.app')

@section('title', 'details elections')
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
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Les Resultats de <b>{{ $candidat->name }}</b></h3>

                    {{-- <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </div> --}}
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <div class="container-fluid">
                        <div class="row p-1">
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mois</span>
                                    </div>
                                        <select class="custom-select" name="mois">
                                        <option>Janvier</option>
                                        <option>Fevrier</option>
                                        <option>Mars</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>{{ auth()->user()->candidat->type->id == 1 ? 'Province' : 'Circonscription' }}</th>
                          {{-- <th>Circonscription</th>
                          <th>Centre de Vote</th>
                          <th>Code Centre</th>
                          <th>Bureau de Vote</th> --}}
                          <th>Votants initial</th>
                          <th>Votants</th>
                          <th>Nos Voix</th>
                          <th>Restant</th>
                          <th>Pourcentage</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($sums as $key => $values)
                        <tr>
                          <td>{{ $values['i'] }}</td>
                          <td>{{ $key }}</td>
                          <td>{{ $values['votantInitial'] }}</td>
                          <td>{{ $values['votant'] }}</td>
                          <td>{{ $values['nosVoix'] }}</td>
                          <td>{{ $values['bulletinRestant'] }}</td>
                          <td>{{ round($values['Pourcentage'], 2) }}%</td>
                        </tr>
                        @endforeach
                        <tr class="bg-info">
                            <td>Total</td>
                            {{-- <td></td>
                            <td></td>
                            <td></td>
                            <td></td> --}}
                            <td></td>
                            <td>{{  $total['votantInitial'] }}</td>
                            <td>{{ $total['votant'] }}</td>
                            <td>{{ $total['nosVoix'] }}</td>
                            <td>{{ $total['bulletinRestant'] }}</td>
                            <td><b>{{ $total['percent'] }}</b>%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    {{ $sums->links() }}
                  </div>
                </div>
                <!-- /.card -->
              </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Graphique d'election</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    setTimeout(function(){
        location.reload();
    }, 45000); // 60 secondes
</script>
<!-- Étape 1: Inclure Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Étape 2: Préparer vos données -->
<script>
    const data = {
        labels: ['Label 1', 'Label 2', 'Label 3'],
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80],
            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 205, 86, 0.2)'],
            borderColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)'],
            borderWidth: 1
        }]
    };
</script>

<!-- Étape 3: Créer un conteneur pour le graphique -->

<!-- Étape 4: Initialiser le graphique -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                // Ajoutez des options supplémentaires si nécessaire
            }
        });
    });
</script>



@endsection

