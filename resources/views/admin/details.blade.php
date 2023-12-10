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
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
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
    }, 60000); // 60 secondes
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const resultData = @json($sums);

    const labels = Object.keys(resultData.data);
    const data = Object.values(resultData.data);

    console.log(data);

    const chartData = {
        labels: labels,
        datasets: [{
            label: 'Election Par Zone',
            data: data.map(item => item.Pourcentage),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(20, 203, 207, 0.2)',
                // Ajoutez plus de couleurs si nécessaire
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(20, 203, 207)',
                // Ajoutez plus de couleurs si nécessaire
            ],
            borderWidth: 1
        }]
    };

    const chartOptions = {
        scales: {
            y: {
                beginAtZero: false,
                min: 1,
                max: 100,
                ticks: {
                    stepSize: 20
                }
            }
        }
        // Ajoutez d'autres options au besoin
    };

    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: chartOptions
        });
    });
</script>






@endsection

