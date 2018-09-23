@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales Graph</h3>
                </div>
                <div class="card-body">
                    <canvas class="chart" id="sales-chart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Transaction</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($last_transactions as $k=>$transaction)
                            <tr>
                                <td class="text-center">{{ $k+1 }}</td>
                                <td>{{ $transaction->product['name'] }}</td>
                                <td class="text-center">{{ ucfirst($transaction['trx_date']) }}</td>
                                <td class="text-center">{{ ucfirst($transaction['price']) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <script>
        var chart =  document.getElementById("sales-chart").getContext('2d');
        var areaChart = new Chart(chart, {
            type: 'line',
            data: {
                labels: {!! json_encode($chart['months']) !!},
                datasets: [
                    {
                        label: 'Overall sales',
                        data: {{ json_encode($chart['totals']) }}
                    }
                ]
            }
        }); 
    </script>
@endsection