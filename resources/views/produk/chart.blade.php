@extends('layouts.master')
@section('title','Aplikasi Laravel')
@section('content')

    <div class="container">
        <h1 align ="center">Chart Produk</h1>
        <div class="card-body">
            <div id="chartProduk" class="mb-0 mt-0" style="display: block"></div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var labelProduk = {!! json_encode($dataLabel) !!};
        var stockProduk = {!! json_encode($dataStock) !!};

        var options = {
            series: [{
                name: 'Total Produk',
                data: stockProduk
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            legend: {
                show: false
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    distributed: true
                }
            },
            dataLabels:{
                enable: false
            },
            stroke:{
                show:true,
                width: 2,
                colors:['transparent']
            },
            xaxis:{
                title: {
                    text: 'Buku'
                },
                categoriesL labelProduk,
            },
            yaxis: {
                title:{
                    tect: '(pcs)'
                }
            },
            fill:{
                opacity: 1
            },

            tooltip:{
                y: {
                    formatter: function(val){
                        retuen val +"pcs"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector('#chartProduk'), options);
        chart.render();
    </script>
@endsection