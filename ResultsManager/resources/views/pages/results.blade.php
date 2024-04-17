
@extends('layouts.app', ['page' => __('Marks'), 'pageSlug' => 'marks'])

@section('content')


<div class="row">
    <div class="container my-5">
        <h2>Students</h2>

  @if ($errors->any())
        <div id="error-alert" class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <script>
            // Automatically close the error alert after 5 seconds
            setTimeout(function () {
                $('#error-alert').fadeOut('slow');
            }, 2000);
        </script>
        @endif

        @php
        $successMessage = session('success');
        // Remove the success message from the session to prevent it from reappearing on page reload
        session()->forget('success');
        @endphp

        @if ($successMessage)
        <div id="success-alert" class="alert alert-success">
            {{ $successMessage }}
        </div>
        <script>
            // Automatically close the success alert after 5 seconds
            setTimeout(function () {
                $('#success-alert').fadeOut('slow');
            }, 2000);
        </script>
        @endif


       <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary m-3" href="{{ route('pages.create') }}" role="button">Insert New Student With Marks</a>
            </div>

            
                
                     <div class="col-md-6 text-md-right">
                        <form action="{{route('pages.icons')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control d-none" id="csv_file_input" name="upload-file" accept=".csv">
                            <button type="button" class="btn btn-success" id="choose_csv_button">Choose CSV File</button>
                            <button type="submit" class="btn btn-success d-none" id="upload_csv_button">Upload CSV</button>
                        </form>
                    </div>
            
           
        </div>

        <table class="table text-center" id="marks-table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>ENGLISH</th>
                    <th>SST</th>
                    <th>MATHS</th>
                    <th>SCIENCE</th>
                    <th>TOTAL</th>
                    <th>AVERAGE</th>
                    <th>AGGREGATE</th>
                    <th>DIVISION</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                // Get the database connection details from Laravel config
                $dbConnection = config('database.connections.mysql');
                $servername = $dbConnection['host'];
                $username = $dbConnection['username'];
                $password = $dbConnection['password'];
                $dbname = $dbConnection['database'];

                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Connection to the database failed : " . mysqli_connect_error());
                }

                require_once app_path('functions.php');
               
                $sql = "SELECT id,name,english,sst,maths,science FROM students";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Error fetching data from the database : " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_array($result)) {
                    // Calculate total and division
                    $total = calculateTotal($row['english'], $row['sst'], $row['maths'], $row['science']);
                    $average = calculateAverage($row['english'], $row['sst'], $row['maths'], $row['science']);
                    $aggregate = totalAggregate($row['english'], $row['sst'], $row['maths'], $row['science']);
                    $division = returnDivision($row['english'], $row['sst'], $row['maths'], $row['science']);
                    // Output table row with total and division
                    
                      echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[english]</td>
                                <td>$row[sst]</td>
                                <td>$row[maths]</td>
                                <td>$row[science]</td>
                                <td>$total</td>
                                <td>$average</td>
                                <td>$aggregate</td>
                                <td>$division</td>
                                <td>
                                    <div>
                                        <a class=\"btn btn-primary\" href='" . route('pages.edit', ['id' => $row['id']]) . "' role=\"button\">Edit</a>
                                        <a class='btn btn-danger' href='" . route('pages.remove', ['id' => $row['id']]) . "' role='button'>Delete</a>
                                    </div>
                                </td>
                            </tr>";  
                    
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
 <script>
        document.getElementById("choose_csv_button").addEventListener("click", function() {
            document.getElementById("csv_file_input").click();
        });

        document.getElementById("csv_file_input").addEventListener("change", function() {
            const fileName = this.value.split("\\").pop();
            if (fileName) {
                document.getElementById("upload_csv_button").classList.remove("d-none");
                document.getElementById("choose_csv_button").classList.add("d-none");
            }
        });


        
    </script>

@endsection
