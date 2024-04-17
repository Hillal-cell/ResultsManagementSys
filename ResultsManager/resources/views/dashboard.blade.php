@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Performance Graph</h5>
                            <h2 class="card-title">Performance OverView</h2>
                            {{-- <h2 class="card-title">Total STUDENTS</h2>
                            <h3>{{$totalStudents}}</h3> --}}
                        </div>
                      
                    </div>
                </div>
                <div class="card-body" style="max-width: 800px; max-height: 5000px;">
                    <div class="chart-area" >
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Scatter graph to show students Performance</h5>
                    {{-- <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3> --}}
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="performanceChartScatter"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Line Chart Graph</h5>
                    {{-- <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500€</h3> --}}
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="performanceChartLine"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Polar Graph</h5>
                    {{-- <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3> --}}
                </div>
                <div class="card-body">
                    <div class="chart-area" >
                        <canvas id="performanceChartpolar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>

    
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


  <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Data from my  controller
            var subjectNames = @json($subjectNames);
            var subjectMarks = @json($subjectMarks);

            // Log the subject names and marks
            console.log("Subject Names:", subjectNames);
            console.log("Subject Marks:", subjectMarks);


            var ctx = document.getElementById('performanceChart').getContext('2d');
            var performanceChart = new Chart(ctx, {
                type: 'bar',
                data: {

                    labels: subjectNames, // Use subject names as labels
                    datasets: [{
                        label: 'Marks',
                        data: subjectMarks,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Ensure the chart is responsive
                    maintainAspectRatio: true, // Maintain the aspect ratio of the chart
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Marks'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Subjects'
                            }
                            
                        }
                    }
                   
                   
                }
            });
        });
    </script>




<script>
        document.addEventListener("DOMContentLoaded", function () {
            // Data from my  controller
            var subjectNames = @json($subjectNames);
            var subjectMarks = @json($subjectMarks);

            // Log the subject names and marks
            console.log("Subject Names:", subjectNames);
            console.log("Subject Marks:", subjectMarks);


            var ctx = document.getElementById('performanceChartLine').getContext('2d');
            var performanceChart = new Chart(ctx, {
                type: 'line',
                data: {

                    labels: subjectNames, // Use subject names as labels
                    datasets: [{
                        label: 'Marks',
                        data: subjectMarks,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Ensure the chart is responsive
                    maintainAspectRatio: true, // Maintain the aspect ratio of the chart
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Marks'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Subjects'
                            }
                            
                        }
                    }
                   
                   
                }
            });
        });
    </script>







<script>
        document.addEventListener("DOMContentLoaded", function () {
            // Data from my  controller
            var subjectNames = @json($subjectNames);
            var subjectMarks = @json($subjectMarks);

            // Log the subject names and marks
            console.log("Subject Names:", subjectNames);
            console.log("Subject Marks:", subjectMarks);


            var ctx = document.getElementById('performanceChartpolar').getContext('2d');
            var performanceChart = new Chart(ctx, {
                type: 'polarArea',
                data: {

                    labels: subjectNames, // Use subject names as labels
                    datasets: [{
                        label: 'Marks',
                        data: subjectMarks,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Ensure the chart is responsive
                    maintainAspectRatio: true, // Maintain the aspect ratio of the chart
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Marks'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Subjects'
                            }
                            
                        }
                    }
                   
                   
                }
            });
        });
    </script>



<script>
        document.addEventListener("DOMContentLoaded", function () {
            // Data from my  controller
            var subjectNames = @json($subjectNames);
            var subjectMarks = @json($subjectMarks);

            // Log the subject names and marks
            console.log("Subject Names:", subjectNames);
            console.log("Subject Marks:", subjectMarks);


            var ctx = document.getElementById('performanceChartScatter').getContext('2d');
            var performanceChart = new Chart(ctx, {
                type: 'scatter',
                data: {

                    labels: subjectNames, // Use subject names as labels
                    datasets: [{
                        label: 'Marks',
                        data: subjectMarks,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Ensure the chart is responsive
                    maintainAspectRatio: true, // Maintain the aspect ratio of the chart
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Marks'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Subjects'
                            }
                            
                        }
                    }
                   
                   
                }
            });
        });
    </script>







@endpush
